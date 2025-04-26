<html>
    <head>
    <title>新增</title> 
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>

<?php
    session_start();
    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d H:i:s");
    $insert = $_POST['insert'];

    $link = mysqli_connect("localhost", "root","", "subject");

     // 基本資料
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];//出生年月日
    $birth_age = strtotime($birth);//用來記錄病人年齡
    $hsex = $_POST['hsex'];
    $person_id = $_POST['person_id'];
    $education = $_POST['education'];
    $living = $_POST['living'];
    $social_walfare = $_POST['social_walfare'];
    $marriage = $_POST['marriage'];
    $medi_history_YN = $_POST['medi_history_YN']; 
    $medi_history = $_POST['medi_history'];

    //隨機生成final_id
    $existing_numbers = array();
    $sql_final_id="select final_id from patient_basic";  
    $result_final_id=mysqli_query($link,$sql_final_id);  
    while($record_final_id = mysqli_fetch_assoc($result_final_id)){
        $existing_numbers[] = $record_final_id['final_id'];
    }    
    do {
        $new_number = sprintf("%04d", mt_rand(1, 9999));
    } while (in_array($new_number, $existing_numbers)); 

    function getAge($birth_age){
        //格式化出生時間的年月日
        $birth_year = date('Y',$birth_age);
        $birth_month = date('m',$birth_age);
        $birth_day = date('d',$birth_age);
        //格式化當前時間的年月日
        $now_year = date('Y');
        $now_month = date('m');
        $now_day = date('d');
        //計算年齡
        $age = $now_year-$birth_year;
        if($birth_year>$now_year || $birth_month==$now_month && $birth_day>$now_day){
            $age--;
        }
        return $age;
    }
    
    //判斷有輸入出生年月日才執行函式
    if(!empty($birth_age)){
        $age = getAge($birth_age);
    } 
     
    //照顧者資料
    $carer_name=$_POST['carer_name'];
    $carer_gender=$_POST['carer_gender'];
    $carer_phone=$_POST['carer_phone'];
    $carer_job=$_POST['carer_job'];
    $carer_relation=$_POST['carer_relation'];
    $carer_education=$_POST['carer_education'];
    $caretaker=$_POST['caretaker'];

    //血液資料
    $BILIRUBIN_TOTAL=$_POST['BILIRUBIN_TOTAL'];
    $URIC=$_POST['URIC'];
    $Glucose_AC=$_POST['Glucose_AC'];
    $BUN=$_POST['BUN'];
    $GOT=$_POST['GOT'];
    $GPT=$_POST['GPT'];
    $Na=$_POST['Na'];
    $K=$_POST['K'];
    $Ca=$_POST['Ca'];
    $ALBUMIN=$_POST['ALBUMIN'];
    $Folic_acid=$_POST['Folic_acid'];
    $Vit_B12=$_POST['Vit_B12'];
    $CHOLESTEROL=$_POST['CHOLESTEROL'];
    $LDL=$_POST['LDL'];
    $HDL=$_POST['HDL'];
    $Blood_ammonia=$_POST['Blood_ammonia'];
    $HGB=$_POST['HGB'];
    $WBC=$_POST['WBC'];
    $SEG=$_POST['SEG'];
    $RBC=$_POST['RBC'];
    $Platelet=$_POST['Platelet'];
    $eGFR=$_POST['eGFR'];
    $Free_T4=$_POST['Free_T4'];
    $T4=$_POST['T4'];
    $T3=$_POST['T3'];
    $TRIGLYCERIDE=$_POST['TRIGLYCERIDE'];
    $HbA1c=$_POST['HbA1c'];
    $Creatinine=$_POST['Creatinine'];
    $RPR_VDRL_test=$_POST['RPR_VDRL_test'];
    $TSH=$_POST['TSH'];
    $blood_num=$_GET['blood_num']+1;
    $blood_record_time=$_POST['blood_record_time'];
    $blood_account=$_SESSION['account']; 
    $blood_name=$_SESSION['name'];

    //CDR資料
    $cdr_account=$_SESSION['account'];
    $cdr_name=$_SESSION['name'];
    $cdr_memory=$_POST['cdr_memory'];
    $cdr_orientation=$_POST['cdr_orientation'];
    $cdr_judgment_and_problem_solving=$_POST['cdr_judgment_and_problem_solving'];
    $cdr_community_affairs=$_POST['cdr_community_affairs'];
    $cdr_home_and_hobbies=$_POST['cdr_home_and_hobbies'];
    $cdr_personal_care=$_POST['cdr_personal_care'];

    $cdr_memory_text=$_POST['cdr_memory_text'];
    $cdr_orientation_text=$_POST['cdr_orientation_text'];
    $cdr_judgment_and_problem_solving_text=$_POST['cdr_judgment_and_problem_solving_text'];
    $cdr_community_affairs_text=$_POST['cdr_community_affairs_text'];
    $cdr_home_and_hobbies_text=$_POST['cdr_home_and_hobbies_text'];
    $cdr_personal_care_text=$_POST['cdr_personal_care_text'];
    $cdr_record_time=$_POST['cdr_record_time'];
    //總結
    $cdr_freetyping=$_POST["cdr_freetyping"];
    //總分
    $sum_of_box=floatval($cdr_memory)+floatval($cdr_orientation)+floatval($cdr_judgment_and_problem_solving)+floatval($cdr_community_affairs)+floatval($cdr_home_and_hobbies)+floatval($cdr_personal_care);
    //判分
    $cdr_cdr=$_POST["cdr_rating"];
    //計次
    $sql_cdr = "SELECT * FROM cdr where id='$id' order by date desc";
    $result_cdr = mysqli_query($link, $sql_cdr);
    $record_cdr = mysqli_fetch_assoc($result_cdr);
    if(empty($record_cdr)){
        $cdr_num=1;
    }else{
        $cdr_num=intval($record_cdr['num'])+1;
    }

    //MMSE資料
    $mmse_account=$_SESSION['account'];
    $mmse_name=$_SESSION['name'];
    $mmse_reading=$_POST['mmse_reading'];
    $mmse_hand=$_POST['mmse_hand'];
    $mmse_action=$_POST['mmse_action'];
    $mmse_action_text=$_POST['mmse_action_text'];
    $mmse_build=$_POST['mmse_build'];
    $mmse_build_text=$_POST['mmse_build_text'];
    $mmse_time=$_POST['mmse_time'];
    $mmse_time_text=$_POST['mmse_time_text'];
    $mmse_place=$_POST['mmse_place'];
    $mmse_place_text=$_POST['mmse_place_text'];
    $mmse_reg=$_POST['mmse_reg'];
    $mmse_reg_text=$_POST['mmse_reg_text'];
    $mmse_7=$_POST['mmse_7'];
    $mmse_7_text=$_POST['mmse_7_text'];
    $mmse_recall=$_POST['mmse_recall'];
    $mmse_recall_text=$_POST['mmse_recall_text'];
    $mmse_lan_name=$_POST['mmse_lan_name'];
    $mmse_lan_name_text=$_POST['mmse_lan_name_text'];
    $mmse_lan_repeat=$_POST['mmse_lan_repeat'];
    $mmse_lan_repeat_text=$_POST['mmse_lan_repeat_text'];
    $mmse_lan_read=$_POST['mmse_lan_read'];
    $mmse_lan_read_text=$_POST['mmse_lan_read_text'];
    $mmse_lan_write=$_POST['mmse_lan_write'];
    $mmse_lan_write_text=$_POST['mmse_lan_write_text'];
    $mmse_record_time=$_POST['mmse_record_time'];

    //總結
    $mmse_freetyping=$_POST["mmse_freetyping"];
    //總分
    $mmse_total=intval($mmse_action)+intval($mmse_build)+intval($mmse_time)+intval($mmse_place)+intval($mmse_reg)+intval($mmse_7)+intval($mmse_recall)+intval($mmse_lan_name)+intval($mmse_lan_repeat)+intval($mmse_lan_read)+intval($mmse_lan_write);
    //計次
    $sql_mmse = "SELECT * FROM mmse where id='$id' order by date desc";
    $result_mmse = mysqli_query($link, $sql_mmse);
    $record_mmse = mysqli_fetch_assoc($result_mmse);
    if(empty($record_mmse)){
        $mmse_num=1;
    }else{
        $mmse_num=intval($record_mmse['num'])+1;
    }

    //使用者
    $email = $_POST['email'];
    $account = $_POST['account'];
    $doctor = $_POST['doctor_insert'];
    $personal_manager = $_POST['personal_manager_insert'];
    $psychologist = $_POST['psychologist_insert'];
    $nurse = $_POST['nurse_insert'];
    if($doctor == ""){$doctor = 0;}
    if($personal_manager == ""){$personal_manager = 0;}
    if($psychologist == ""){$psychologist = 0;}
    if($nurse == ""){$nurse = 0;}

    //隨機生成使用者的亂數密碼
    $randomPassword = sprintf("%06d", rand(0, 999999));

    //寄信用資訊
    $_SESSION["user_randompassword"] = $randomPassword;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_account'] = $account;

   // 基本資料
    if($insert == "patient_basic"){
        $sql = "INSERT INTO patient_basic (id, name, birth, age, hsex, person_id, education, living, social_walfare, marriage, medi_history_YN, medi_history, final_id, date) VALUES ('$id', '$name', '$birth', '$age', '$hsex', '$person_id', '$education', '$living', '$social_walfare', '$marriage', '$medi_history_YN', '$medi_history', '$new_number', '$date')";        
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'新增成功',
                    icon:'success',
                }).then(function(){
                    document.location.href="basic_look.php?id=<?php echo $id ?>";
                });
                
            </script>
            <?php
        }else{ ?> 
            <script>
                 swal({
                    title:'新增失敗',
                    icon:'error',
                }).then(function(){
                    history.go(-1);
                });
            </script>
            <?php
        }
    }
 
    // 照顧者資料
    else if($insert == "carer"){
        $sql = "INSERT INTO carer (id, name, education, gender, job, caretaker, relation, phone, date) VALUES ('$id', '$carer_name', '$carer_education', '$carer_gender', '$carer_job', '$caretaker', '$carer_relation', '$carer_phone','$date')";
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'新增成功',
                    icon:'success',
                }).then(function(){
                    document.location.href="carer_look.php";
                });
            </script>
            <?php
        }else{ ?> 
            <script>
                 swal({
                    title:'新增失敗',
                    icon:'error',
                }).then(function(){
                    history.go(-1);
                });
            </script>
            <?php
        }
    } 

    // CDR
    else if($insert == "cdr"){
        $sql = " INSERT INTO cdr (id, date , num, sum_of_box , freetyping ,cdr,record_time,account,name) VALUES ('$id','$date','$cdr_num','$sum_of_box','$cdr_freetyping','$cdr_cdr','$cdr_record_time','$cdr_account','$cdr_name')";
        $sql_memory="INSERT INTO cdr_memory (id,date,content,freetyping) VALUES ('$id','$date','$cdr_memory','$cdr_memory_text')";
        $sql_ori="INSERT INTO cdr_orientation (id,date,content,freetyping) VALUES ('$id','$date','$cdr_orientation','$cdr_orientation_text')";
        $sql_jug="INSERT INTO cdr_judgment_and_problem_solving (id,date,content,freetyping) VALUES ('$id','$date','$cdr_judgment_and_problem_solving','$cdr_judgment_and_problem_solving_text')";
        $sql_com="INSERT INTO cdr_community_affairs (id,date,content,freetyping) VALUES ('$id','$date','$cdr_community_affairs','$cdr_community_affairs_text')";
        $sql_home="INSERT INTO cdr_home_and_hobbies (id,date,content,freetyping) VALUES ('$id','$date','$cdr_home_and_hobbies','$cdr_home_and_hobbies_text')";
        $sql_per="INSERT INTO cdr_personal_care (id,date,content,freetyping) VALUES ('$id','$date','$cdr_personal_care','$cdr_personal_care_text')";

        if(mysqli_query($link,$sql) && mysqli_query($link,$sql_memory)&& mysqli_query($link,$sql_ori)&& mysqli_query($link,$sql_jug)&& mysqli_query($link,$sql_com)&& mysqli_query($link,$sql_home)&& mysqli_query($link,$sql_per)){ ?>
            <script>
                swal({
                    title:'新增成功',
                    icon:'success',
                }).then(function(){
                    document.location.href="CDR_look.php";
                });
            </script>
            <?php
        }else{ ?> 
            <script>
                swal({
                    title:'新增失敗',
                    icon:'error',
                }).then(function(){
                    history.go(-1);
                });
            </script>
            <?php
        }
    }

    // MMSE
    else if($insert == "mmse"){
        $sql = " INSERT INTO mmse (id, date , num , reading , hand , total , freetyping ,record_time,account,name) VALUES ('$id','$date','$mmse_num','$mmse_reading','$mmse_hand','$mmse_total','$mmse_freetyping','$mmse_record_time','$mmse_account','$mmse_name')";
        $sql_action="INSERT INTO mmse_action (id,date,content,freetyping) VALUES ('$id','$date','$mmse_action','$mmse_action_text')";
        $sql_7="INSERT INTO mmse_attention_and_calculation (id,date,content,freetyping) VALUES ('$id','$date','$mmse_7','$mmse_7_text')";
        $sql_build="INSERT INTO mmse_build (id,date,content,freetyping) VALUES ('$id','$date','$mmse_build','$mmse_build_text')";
        $sql_place="INSERT INTO mmse_place (id,date,content,freetyping) VALUES ('$id','$date','$mmse_place','$mmse_place_text')";
        $sql_time="INSERT INTO mmse_time (id,date,content,freetyping) VALUES ('$id','$date','$mmse_time','$mmse_time_text')";
        $sql_recall="INSERT INTO mmse_recall (id,date,content,freetyping) VALUES ('$id','$date','$mmse_recall','$mmse_recall_text')";
        $sql_reg="INSERT INTO mmse_registration (id,date,content,freetyping) VALUES ('$id','$date','$mmse_reg','$mmse_reg_text')";
        $sql_lan_name ="INSERT INTO mmse_lan_name (id,date,content,freetyping) VALUES ('$id','$date','$mmse_lan_name','$mmse_lan_name_text')";
        $sql_lan_repeat="INSERT INTO mmse_lan_repeat (id,date,content,freetyping) VALUES ('$id','$date','$mmse_lan_repeat','$mmse_lan_repeat_text')";
        $sql_lan_read="INSERT INTO mmse_lan_read (id,date,content,freetyping) VALUES ('$id','$date','$mmse_lan_read','$mmse_lan_read_text')";
        $sql_lan_write="INSERT INTO mmse_lan_write (id,date,content,freetyping) VALUES ('$id','$date','$mmse_lan_write','$mmse_lan_write_text')";
        
        if(mysqli_query($link,$sql) && mysqli_query($link,$sql_action)&& mysqli_query($link,$sql_7)&& mysqli_query($link,$sql_build)&& mysqli_query($link,$sql_place)&& mysqli_query($link,$sql_time)&& mysqli_query($link,$sql_recall)&& mysqli_query($link,$sql_reg)&& mysqli_query($link,$sql_lan_name)&& mysqli_query($link,$sql_lan_repeat)&& mysqli_query($link,$sql_lan_read)&& mysqli_query($link,$sql_lan_write)){ ?>
            <script>
                swal({
                    title:'新增成功',
                    icon:'success',
                }).then(function(){
                    document.location.href="MMSE_look.php";
                });
            </script>
            <?php
        }else{   
            ?>
            <script>
                 swal({
                    title:'新增失敗',
                    icon:'error',
                }).then(function(){
                    history.go(-1);
                });
            </script>
            <?php
        }
    }

    // 血液資料
    else if($insert == "blood"){
        $sql = "INSERT INTO blood (id,date,BILIRUBIN_TOTAL,URIC,Glucose_AC,BUN,GOT,GPT,Na,K,Ca,ALBUMIN,Folic_acid,Vit_B12,CHOLESTEROL,LDL,HDL,Blood_ammonia,HGB,WBC,SEG,RBC,Platelet,eGFR,Free_T4,T4,T3,TRIGLYCERIDE,HbA1c,Creatinine,TSH,RPR_VDRL_test,num,record_time,account,name) VALUES ('$id','$date','$BILIRUBIN_TOTAL', '$URIC', '$Glucose_AC', '$BUN', '$GOT', '$GPT', '$Na', '$K', '$Ca', '$ALBUMIN', '$Folic_acid', '$Vit_B12','$CHOLESTEROL', '$LDL', '$HDL','$Blood_ammonia', '$HGB' ,'$WBC', '$SEG' , '$RBC','$Platelet', '$eGFR', '$Free_T4','$T4','$T3','$TRIGLYCERIDE', '$HbA1c','$Creatinine','$TSH','$RPR_VDRL_test','$blood_num','$blood_record_time','$blood_account','$blood_name')";
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'新增成功',
                    icon:'success',
                }).then(function(){
                    document.location.href="blood_look.php";
                });
            </script>
            <?php
        }else{ ?>
            <script>
                swal({
                    title:'新增失敗',
                    icon:'error',
                }).then(function(){
                    history.go(-1);
                });
            </script>
            <?php
        }
    }

    //使用者
    else if($insert == "user"){
        $sql_email = "SELECT email FROM user where email='$email'";
        $result_email=mysqli_query($link,$sql_email);
        $sql_account = "SELECT account FROM user where account='$account'";
        $result_account=mysqli_query($link,$sql_account);
        if(mysqli_fetch_assoc($result_email)){ ?>
            <script>
                swal({
                    title: '新增失敗',
                    text: '該信箱已存在，請使用其他信箱',
                    icon: 'error',
                }).then(function () {
                    history.go(-1);
                });
            </script>
            <?php
        }elseif(mysqli_fetch_assoc($result_account)){ ?>
            <script>
                swal({
                    title: '新增失敗',
                    text: '該帳號已存在，請使用其他帳號',
                    icon: 'error',
                }).then(function () {
                    history.go(-1);
                });
            </script>
            <?php
        }else{
            $sql_user = "INSERT INTO user(account, password, doctor, personal_manager, nurse, psychologist, name, gender, phone, birth, email, service, pass) VALUES ('$account', '$randomPassword', '$doctor', '$personal_manager', '$nurse', '$psychologist', null, null, null, null, '$email', null, '0')";
            if(mysqli_query($link, $sql_user)){ ?>
                <script>
                    swal({
                        title:'新增成功',
                        icon:'success',
                    }).then(function(){
                        document.location.href="send_email.php?";
                    });
                </script>
                <?php
            }else{ ?>
                <script>
                    swal({
                        title:'新增失敗',
                        icon:'error',
                    }).then(function(){
                        history.go(-1); 
                    });
                </script>
                <?php
            }
        }
    }
?>