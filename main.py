#fastapi
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
#from fastapi.responses import FileResponse
from pydantic import BaseModel

#pandas,numpy
import pandas as pd
import numpy as np

#graph
import base64
import shap
import matplotlib.pyplot as plt
#import os

#sklearn
from sklearn.tree import DecisionTreeClassifier,export_graphviz
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import cross_val_score
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.metrics import f1_score
from sklearn.metrics import precision_score
from imblearn.metrics import sensitivity_score
from imblearn.metrics import specificity_score
from sklearn.metrics import recall_score
from sklearn.metrics import confusion_matrix
from joblib import dump, load

#os
import os.path as path
import os

app = FastAPI()

origins = [
    "http://localhost",
    "http://localhost:8000",
    "http://localhost:8080",
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class request_body(BaseModel):
    AGE :int=0
    Edu :int=0
    Memory  :float=0
    Orientation:float=0
    Judgment_and_Problem_Solving : float=0
    Community_Affairsl : float=0
    Home_and_Hobbies  : float=0
    Personal_Care:float=0
    MMSE_Orientation : float=0
    MMSE_time   : float=0
    MMSE_place : float=0
    MMSE_Registration : float=0
    MMSE_Attention_and_calculation : float=0
    MMSE_Recall   :float=0
    MMSE_Language :float=0
    HSEX_F:str="0"
    HSEX_M:str="0"

df = pd.read_csv("C:/xampp/htdocs/subject/php/upload/dementia_clean.csv")

x=df.drop(['CDR_scoreChange_normal_0','CDR_scoreChange_normal_1'],axis=1).copy()
y=df['CDR_scoreChange_normal_1'].copy()

x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=0.3,random_state=4)


clf = DecisionTreeClassifier(criterion='gini',
                        max_depth=5,
                        max_leaf_nodes=5,
                        min_samples_leaf=5)

clf.fit(x_train, y_train)

CV3F_old_acc=cross_val_score(clf,x_train,y_train,cv=3,scoring='accuracy')

dump(clf, 'dementia_model.joblib')


@app.post("/predict")
def predict(data: request_body):
    test_data = [[
            data.AGE,
            data.Edu,
            data.Memory,
            data.Orientation,
            data.Judgment_and_Problem_Solving,
            data.Community_Affairsl,
            data.Home_and_Hobbies,
            data.Personal_Care,
            data.MMSE_Orientation,
            data.MMSE_time,
            data.MMSE_place,
            data.MMSE_Registration,
            data.MMSE_Attention_and_calculation,
            data.MMSE_Recall,
            data.MMSE_Language,
            data.HSEX_F,
            data.HSEX_M
    ]]

    
    loaded = load('dementia_model.joblib')
    
    result = int(loaded.predict(test_data))
    

    test_df = pd.DataFrame(data=test_data, columns=x_test.columns)
    #shap
    explainer = shap.TreeExplainer(clf)
    
    shap_values = explainer.shap_values(test_df)

    shap_value = shap_values[0]
    
    shap.waterfall_plot(shap.Explanation(
                            values=shap_value[0], 
                            base_values=explainer.expected_value[0],
                            data=test_df.iloc[0], 
                            feature_names=test_df.columns.tolist()),
                            max_display=20,
                            show=False)
    
    #save waterfall_plot
    filename = "waterfall_plot.png"
    filepath="C:/xampp/htdocs/subject/php/waterfall_plot.png"

    if path.exists(filename):
        os.remove(filepath) 
        plt.savefig("waterfall_plot.png", bbox_inches="tight", dpi=80)

    plt.savefig(filename, bbox_inches="tight", dpi=80)

    with open('waterfall_plot.png', 'rb') as f:
        image_bytes = f.read()

    image_base64 = base64.b64encode(image_bytes).decode('utf-8')
    plt.clf()

    return {"result": result, "shap_image": image_base64}

@app.post("/evaluate")
def evaluate():
    #upload data
    df_up = pd.read_csv('C:/xampp/htdocs/subject/php/upload/upload_data.csv')
    de_up_nums=df_up.shape[0]
  #  df_up['CDR_scoreChange_normal']=df_up['CDR_scoreChange_normal'].astype(str)
  #  dummied_df_up=pd.get_dummies(df_up,columns=['HSEX','CDR_scoreChange_normal']).copy()

    #statistics
    columns = {
    'AGE': 'age',
    'Memory':'memory',
    'Orientation': 'orientation',
    'Judgment_and_Problem_Solving': 'judgment',
    'Community_Affairsl': 'community',
    'Home_and_Hobbies': 'hobbies',
    'Personal_Care': 'personal_care',
    'MMSE_Orientation':'mmse_ori',
    'MMSE_time': 'mmse_time',
    'MMSE_place': 'mmse_place',
    'MMSE_Registration': 'mmse_reg',
    'MMSE_Attention_and_calculation': 'mmse_att',
    'MMSE_Recall': 'mmse_recall',
    'MMSE_Language':'mmse_lang'
    }

    results = {}
    for col, name in columns.items():
        data = df_up[col].copy()
        avg = round(np.average(data), 3)
        max_value = max(data)
        min_value = min(data)
        std = round(np.std(data), 3)
        var = round(pow(std, 2), 3)
        median = round(np.median(data), 3)
        results[f'avg_{name}'] = avg
        results[f'max_{name}'] = max_value
        results[f'min_{name}'] = min_value
        results[f'std_{name}'] = std
        results[f'var_{name}'] = var
        results[f'median_{name}'] = median
    #statistics--

    #x,y
    x_up=df_up.drop(['CDR_scoreChange_normal_0','CDR_scoreChange_normal_1'],axis=1).copy()
    y_up=df_up['CDR_scoreChange_normal_1'].copy()
    x_train_up,x_test_up,y_train_up,y_test_up=train_test_split(x_up,y_up,test_size=0.3,random_state=4)
    
    #cart
    cart = DecisionTreeClassifier(criterion='gini',
                             max_depth=5,
                             max_leaf_nodes=5,
                             min_samples_leaf=5)
    cart.fit(x_train_up, y_train_up)
    CV3F_cart_acc=cross_val_score(cart,x_train_up,y_train_up,cv=3,scoring='accuracy')
    
    Avg_cart_acc=round((np.mean(CV3F_cart_acc))*100,2)
    
    cart_prediction=cart.predict(x_test_up)
    cart_acc=accuracy_score(y_test_up,cart_prediction)
    cart_f1s=f1_score(y_test_up,cart_prediction,pos_label=1)
    cart_pre=precision_score(y_test_up,cart_prediction,pos_label=1)
    cart_sen=recall_score(y_test_up,cart_prediction,pos_label=1)
    cart_spe=recall_score(y_test_up,cart_prediction,pos_label=0)
    
    
    #logistic
    log=LogisticRegression(max_iter=10000)
    log.fit(x_train_up,y_train_up)
    CV3F_log_acc=cross_val_score(log,x_train_up,y_train_up,cv=3,scoring='accuracy')

    Avg_log_acc=round((np.mean(CV3F_log_acc))*100,2)
    
    log_prediction=log.predict(x_test_up)
    log_acc=accuracy_score(y_test_up,log_prediction)
    log_f1s=f1_score(y_test_up,log_prediction,pos_label=1)
    log_pre=precision_score(y_test_up,log_prediction,pos_label=1)
    log_sen=sensitivity_score(y_test_up,log_prediction,pos_label=1)
    log_spe=specificity_score(y_test_up,log_prediction,pos_label=1)
    
    #old
    load_old = load('dementia_model.joblib')

    y_pred = load_old.predict(x_test)

    Avg_old_acc=round((np.mean(CV3F_old_acc))*100,2)
    old_acc=accuracy_score(y_test,y_pred)
    old_f1s=f1_score(y_test,y_pred,pos_label=1)
    old_pre=precision_score(y_test,y_pred,pos_label=1)
    old_sen=recall_score(y_test,y_pred,pos_label=1)
    old_spe=recall_score(y_test,y_pred,pos_label=0)
    
    
    return {"Avg_cart_acc":Avg_cart_acc,"cart_acc":round(cart_acc*100,2),"cart_f1s":round(cart_f1s*100,2),"cart_pre":round(cart_pre*100,2),"cart_sen":round(cart_sen*100,2),"cart_spe":round(cart_spe*100,2),
            "Avg_log_acc":Avg_log_acc,"log_acc":round(log_acc*100,2),"log_f1s":round(log_f1s*100,2),"log_pre":round(log_pre*100,2),"log_sen":round(log_sen*100,2),"log_spe":round(log_spe*100,2),
            "Avg_old_acc":Avg_old_acc,"old_acc":round(old_acc*100,2),"old_f1s":round(old_f1s*100,2),"old_pre":round(old_pre*100,2),"old_sen":round(old_sen*100,2),"old_spe":round(old_spe*100,2),"de_up_nums":de_up_nums,
            "avg_age":results['avg_age'],"max_age":results['max_age'],"min_age":results['min_age'],"std_age":results['std_age'],"var_age":results['var_age'],"median_age":results['median_age'],
            "avg_memory":results['avg_memory'],"max_memory":results['max_memory'],"min_memory":results['min_memory'],"std_memory":results['std_memory'],"var_memory":results['var_memory'],"median_memory":results['median_memory'],
            "avg_orientation":results['avg_orientation'],"max_orientation":results['max_orientation'],"min_orientation":results['min_orientation'],"std_orientation":results['std_orientation'],"var_orientation":results['var_orientation'],"median_orientation":results['median_orientation'],
            "avg_judgment":results['avg_judgment'],"max_judgment":results['max_judgment'],"min_judgment":results['min_judgment'],"std_judgment":results['std_judgment'],"var_judgment":results['var_judgment'],"median_judgment":results['median_judgment'],
            "avg_community":results['avg_community'],"max_community":results['max_community'],"min_community":results['min_community'],"std_community":results['std_community'],"var_community":results['var_community'],"median_community":results['median_community'],
            "avg_hobbies":results['avg_hobbies'],"max_hobbies":results['max_hobbies'],"min_hobbies":results['min_hobbies'],"std_hobbies":results['std_hobbies'],"var_hobbies":results['var_hobbies'],"median_hobbies":results['median_hobbies'],
            "avg_personal_care":results['avg_personal_care'],"max_personal_care":results['max_personal_care'],"min_personal_care":results['min_personal_care'],"std_personal_care":results['std_personal_care'],"var_personal_care":results['var_personal_care'],"median_personal_care":results['median_personal_care'],
            "avg_mmse_ori":results['avg_mmse_ori'],"max_mmse_ori":results['max_mmse_ori'],"min_mmse_ori":results['min_mmse_ori'],"std_mmse_ori":results['std_mmse_ori'],"var_mmse_ori":results['var_mmse_ori'],"median_mmse_ori":results['median_mmse_ori'],
            "avg_mmse_time":results['avg_mmse_time'],"max_mmse_time":results['max_mmse_time'],"min_mmse_time":results['min_mmse_time'],"std_mmse_time":results['std_mmse_time'],"var_mmse_time":results['var_mmse_time'],"median_mmse_time":results['median_mmse_time'],
            "avg_mmse_place":results['avg_mmse_place'],"max_mmse_place":results['max_mmse_place'],"min_mmse_place":results['min_mmse_place'],"std_mmse_place":results['std_mmse_place'],"var_mmse_place":results['var_mmse_place'],"median_mmse_place":results['median_mmse_place'],
            "avg_mmse_reg":results['avg_mmse_reg'],"max_mmse_reg":results['max_mmse_reg'],"min_mmse_reg":results['min_mmse_reg'],"std_mmse_reg":results['std_mmse_reg'],"var_mmse_reg":results['var_mmse_reg'],"median_mmse_reg":results['median_mmse_reg'],
            "avg_mmse_att":results['avg_mmse_att'],"max_mmse_att":results['max_mmse_att'],"min_mmse_att":results['min_mmse_att'],"std_mmse_att":results['std_mmse_att'],"var_mmse_att":results['var_mmse_att'],"median_mmse_att":results['median_mmse_att'],
            "avg_mmse_recall":results['avg_mmse_recall'],"max_mmse_recall":results['max_mmse_recall'],"min_mmse_recall":results['min_mmse_recall'],"std_mmse_recall":results['std_mmse_recall'],"var_mmse_recall":results['var_mmse_recall'],"median_mmse_recall":results['median_mmse_recall'],
            "avg_mmse_lang":results['avg_mmse_lang'],"max_mmse_lang":results['max_mmse_lang'],"min_mmse_lang":results['min_mmse_lang'],"std_mmse_lang":results['std_mmse_lang'],"var_mmse_lang":results['var_mmse_lang'],"median_mmse_lang":results['median_mmse_lang'],          

            }

@app.post("/verify")
def verify():
    #external data 
    df_ex = pd.read_csv('C:/xampp/htdocs/subject/php/upload/external_data.csv')
    de_ex_nums=df_ex.shape[0]
    
    df_ex['CDR_scoreChange_normal']=df_ex['CDR_scoreChange_normal'].astype(str)
    dummied_df_ex=pd.get_dummies(df_ex,columns=['HSEX','CDR_scoreChange_normal']).copy()
   
   #statistics
    columns = {
    'AGE': 'age',
    'Memory':'memory',
    'Orientation': 'orientation',
    'Judgment_and_Problem_Solving': 'judgment',
    'Community_Affairsl': 'community',
    'Home_and_Hobbies': 'hobbies',
    'Personal_Care': 'personal_care',
    'MMSE_Orientation':'mmse_ori',
    'MMSE_time': 'mmse_time',
    'MMSE_place': 'mmse_place',
    'MMSE_Registration': 'mmse_reg',
    'MMSE_Attention_and_calculation': 'mmse_att',
    'MMSE_Recall': 'mmse_recall',
    'MMSE_Language':'mmse_lang'
    }
    
    results = {}
    for col, name in columns.items():
        data = df_ex[col].copy()
        avg = round(np.average(data), 3)
        max_value = max(data)
        min_value = min(data)
        std = round(np.std(data), 3)
        var = round(pow(std, 2), 3)
        median = round(np.median(data), 3)
        results[f'avg_{name}'] = avg
        results[f'max_{name}'] = max_value
        results[f'min_{name}'] = min_value
        results[f'std_{name}'] = std
        results[f'var_{name}'] = var
        results[f'median_{name}'] = median
    #statistics--

    #x,y
    new_x=dummied_df_ex.drop(['CDR_scoreChange_normal_0','CDR_scoreChange_normal_1'],axis=1).copy()
    new_y_true=dummied_df_ex['CDR_scoreChange_normal_1'].copy()

    #load
    loaded_old = load('dementia_model.joblib')

    new_y_pred = loaded_old.predict(new_x)

    acc_verify = accuracy_score(new_y_true, new_y_pred)
    f1s_verify = f1_score(new_y_true, new_y_pred,pos_label=1)
    pre_verify = precision_score(new_y_true, new_y_pred,pos_label=1)
    sen_verify = recall_score(new_y_true, new_y_pred,pos_label=1)
    spe_verify = recall_score(new_y_true, new_y_pred,pos_label=0)

    #old
    y_pred = loaded_old.predict(x_test)

    Avg_old_acc=round((np.mean(CV3F_old_acc))*100,2)
    old_acc=accuracy_score(y_test,y_pred)
    old_f1s=f1_score(y_test,y_pred,pos_label=1)
    old_pre=precision_score(y_test,y_pred,pos_label=1)
    old_sen=recall_score(y_test,y_pred,pos_label=1)
    old_spe=recall_score(y_test,y_pred,pos_label=0)


    return {"acc_verify":round(acc_verify*100,2),"f1s_verify":round(f1s_verify*100,2),"pre_verify":round(pre_verify*100,2),"sen_verify":round(sen_verify*100,2),"spe_verify":round(spe_verify*100,2),"de_ex_nums":de_ex_nums,
            "Avg_old_acc":round(Avg_old_acc*100,2),"old_acc":round(old_acc*100,2),"old_f1s":round(old_f1s*100,2),"old_pre":round(old_pre*100,2),"old_sen":round(old_sen*100,2),"old_spe":round(old_spe*100,2),
            "avg_age":results['avg_age'],"max_age":results['max_age'],"min_age":results['min_age'],"std_age":results['std_age'],"var_age":results['var_age'],"median_age":results['median_age'],
            "avg_memory":results['avg_memory'],"max_memory":results['max_memory'],"min_memory":results['min_memory'],"std_memory":results['std_memory'],"var_memory":results['var_memory'],"median_memory":results['median_memory'],
            "avg_orientation":results['avg_orientation'],"max_orientation":results['max_orientation'],"min_orientation":results['min_orientation'],"std_orientation":results['std_orientation'],"var_orientation":results['var_orientation'],"median_orientation":results['median_orientation'],
            "avg_judgment":results['avg_judgment'],"max_judgment":results['max_judgment'],"min_judgment":results['min_judgment'],"std_judgment":results['std_judgment'],"var_judgment":results['var_judgment'],"median_judgment":results['median_judgment'],
            "avg_community":results['avg_community'],"max_community":results['max_community'],"min_community":results['min_community'],"std_community":results['std_community'],"var_community":results['var_community'],"median_community":results['median_community'],
            "avg_hobbies":results['avg_hobbies'],"max_hobbies":results['max_hobbies'],"min_hobbies":results['min_hobbies'],"std_hobbies":results['std_hobbies'],"var_hobbies":results['var_hobbies'],"median_hobbies":results['median_hobbies'],
            "avg_personal_care":results['avg_personal_care'],"max_personal_care":results['max_personal_care'],"min_personal_care":results['min_personal_care'],"std_personal_care":results['std_personal_care'],"var_personal_care":results['var_personal_care'],"median_personal_care":results['median_personal_care'],
            "avg_mmse_ori":results['avg_mmse_ori'],"max_mmse_ori":results['max_mmse_ori'],"min_mmse_ori":results['min_mmse_ori'],"std_mmse_ori":results['std_mmse_ori'],"var_mmse_ori":results['var_mmse_ori'],"median_mmse_ori":results['median_mmse_ori'],
            "avg_mmse_time":results['avg_mmse_time'],"max_mmse_time":results['max_mmse_time'],"min_mmse_time":results['min_mmse_time'],"std_mmse_time":results['std_mmse_time'],"var_mmse_time":results['var_mmse_time'],"median_mmse_time":results['median_mmse_time'],
            "avg_mmse_place":results['avg_mmse_place'],"max_mmse_place":results['max_mmse_place'],"min_mmse_place":results['min_mmse_place'],"std_mmse_place":results['std_mmse_place'],"var_mmse_place":results['var_mmse_place'],"median_mmse_place":results['median_mmse_place'],
            "avg_mmse_reg":results['avg_mmse_reg'],"max_mmse_reg":results['max_mmse_reg'],"min_mmse_reg":results['min_mmse_reg'],"std_mmse_reg":results['std_mmse_reg'],"var_mmse_reg":results['var_mmse_reg'],"median_mmse_reg":results['median_mmse_reg'],
            "avg_mmse_att":results['avg_mmse_att'],"max_mmse_att":results['max_mmse_att'],"min_mmse_att":results['min_mmse_att'],"std_mmse_att":results['std_mmse_att'],"var_mmse_att":results['var_mmse_att'],"median_mmse_att":results['median_mmse_att'],
            "avg_mmse_recall":results['avg_mmse_recall'],"max_mmse_recall":results['max_mmse_recall'],"min_mmse_recall":results['min_mmse_recall'],"std_mmse_recall":results['std_mmse_recall'],"var_mmse_recall":results['var_mmse_recall'],"median_mmse_recall":results['median_mmse_recall'],
            "avg_mmse_lang":results['avg_mmse_lang'],"max_mmse_lang":results['max_mmse_lang'],"min_mmse_lang":results['min_mmse_lang'],"std_mmse_lang":results['std_mmse_lang'],"var_mmse_lang":results['var_mmse_lang'],"median_mmse_lang":results['median_mmse_lang'],          
    }

@app.post("/rebuild")
def rebuild():
    df = pd.read_csv('C:/xampp/htdocs/subject/php/upload/upload_data.csv')


    x=df.drop(['CDR_scoreChange_normal_0','CDR_scoreChange_normal_1'],axis=1).copy()
    y=df['CDR_scoreChange_normal_1'].copy()

    x_train_re,x_test_re,y_train_re,y_test_re=train_test_split(x,y,test_size=0.3,random_state=4)

    log=LogisticRegression(max_iter=10000)
    log.fit(x_train_re,y_train_re)


    dump(log, 'dementia_model.joblib')


    return{
        'rebuild':'success',
    }