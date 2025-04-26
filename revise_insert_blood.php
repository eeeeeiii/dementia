<html>
    <head>
        <title>修改</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start(); 
    $blood_num_index = $_SESSION['blood_num_index'];
    $id = $_SESSION['id'];
    $account = $_SESSION['account'];
    $revise_name = $_SESSION['name']; 

    $link = mysqli_connect("localhost", "root", "", "subject");
    $sql = "SELECT * FROM blood where id='$id' and num='$blood_num_index'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result);

    if($record['BILIRUBIN_TOTAL'] == '0'){
        $record['BILIRUBIN_TOTAL'] = '';
    }

    if($record['URIC'] == '0'){
        $record['URIC'] = '';
    }

    if($record['Glucose_AC'] == '0'){
        $record['Glucose_AC'] = '';
    }

    if($record['BUN'] == '0'){
        $record['BUN'] = '';
    }

    if($record['GOT'] == '0'){
        $record['GOT'] = '';
    }

    if($record['GPT'] == '0'){
        $record['GPT'] = '';
    }

    if($record['Na'] == '0'){
        $record['Na'] = '';
    }

    if($record['K'] == '0'){
        $record['K'] = '';
    }

    if($record['Ca'] == '0'){
        $record['Ca'] = '';
    }

    if($record['ALBUMIN'] == '0'){
        $record['ALBUMIN'] = '';
    }

    if($record['Folic_acid'] == '0'){
        $record['Folic_acid'] = '';
    }

    if($record['Vit_B12'] == '0'){
        $record['Vit_B12'] = '';
    }

    if($record['CHOLESTEROL'] == '0'){
        $record['CHOLESTEROL'] = '';
    }

    if($record['LDL'] == '0'){
        $record['LDL'] = '';
    }

    if($record['HDL'] == '0'){
        $record['HDL'] = '';
    }

    if($record['Blood_ammonia'] == '0'){
        $record['Blood_ammonia'] = '';
    }

    if($record['HGB'] == '0'){
        $record['HGB'] = '';
    }

    if($record['WBC'] == '0'){
        $record['WBC'] = '';
    }

    if($record['SEG'] == '0'){
        $record['SEG'] = '';
    }

    if($record['RBC'] == '0'){
        $record['RBC'] = '';
    }

    if($record['Platelet'] == '0'){
        $record['Platelet'] = '';
    }

    if($record['eGFR'] == '0'){
        $record['eGFR'] = '';
    }

    if($record['Free_T4'] == '0'){
        $record['Free_T4'] = '';
    }

    if($record['T4'] == '0'){
        $record['T4'] = '';
    }

    if($record['T3'] == '0'){
        $record['T3'] = '';
    }

    if($record['TRIGLYCERIDE'] == '0'){
        $record['TRIGLYCERIDE'] = '';
    }

    if($record['HbA1c'] == '0'){
        $record['HbA1c'] = '';
    }

    if($record['Creatinine'] == '0'){
        $record['Creatinine'] = '';
    }

    if($record['TSH'] == '0'){
        $record['TSH'] = '';
    }

    if($record['record_time'] == '0000-00-00'){
        $record['record_time'] = '';
    }

    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d H:i:s");

    $revise = $_GET['revise'];
    $BILIRUBIN_TOTAL=$_GET['BILIRUBIN_TOTAL'];
    $URIC=$_GET['URIC'];
    $Glucose_AC=$_GET['Glucose_AC'];
    $BUN=$_GET['BUN'];
    $GOT=$_GET['GOT'];
    $GPT=$_GET['GPT'];
    $Na=$_GET['Na'];
    $K=$_GET['K'];
    $Ca=$_GET['Ca'];
    $ALBUMIN=$_GET['ALBUMIN'];
    $Folic_acid=$_GET['Folic_acid'];
    $Vit_B12=$_GET['Vit_B12'];
    $CHOLESTEROL=$_GET['CHOLESTEROL'];
    $LDL=$_GET['LDL'];
    $HDL=$_GET['HDL'];
    $Blood_ammonia=$_GET['Blood_ammonia'];
    $HGB=$_GET['HGB'];
    $WBC=$_GET['WBC'];
    $SEG=$_GET['SEG'];
    $RBC=$_GET['RBC'];
    $Platelet=$_GET['Platelet'];
    $eGFR=$_GET['eGFR'];
    $Free_T4=$_GET['Free_T4'];
    $T4=$_GET['T4'];
    $T3=$_GET['T3'];
    $TRIGLYCERIDE=$_GET['TRIGLYCERIDE'];
    $HbA1c=$_GET['HbA1c'];
    $Creatinine=$_GET['Creatinine'];
    $RPR_VDRL_test=$_GET['RPR_VDRL_test'];
    $TSH=$_GET['TSH'];
    $blood_record_time=$_GET['blood_record_time'];
    
    if ($record['record_time'] !== $blood_record_time){
        $sql_record_time = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', '受測日期', '$record[record_time]', '$blood_record_time', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_record_time)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['WBC'] !== $WBC){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'WBC', '$record[WBC]', '$WBC', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['SEG'] !== $SEG){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Seg', '$record[SEG]', '$SEG', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['RBC'] !== $RBC){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'RBC', '$record[RBC]', '$RBC', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['HGB'] !== $HGB){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Hgb', '$record[HGB]', '$HGB', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Platelet'] !== $Platelet){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Platelet', '$record[Platelet]', '$Platelet', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['BUN'] !== $BUN){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'BUN', '$record[BUN]', '$BUN', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Creatinine'] !== $Creatinine){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Creatinine', '$record[Creatinine]', '$Creatinine', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['eGFR'] !== $eGFR){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'eGFR', '$record[eGFR]', '$eGFR', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Na'] !== $Na){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Na', '$record[Na]', '$Na', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['K'] !== $K){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'K', '$record[K]', '$K', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Ca'] !== $Ca){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Ca', '$record[Ca]', '$Ca', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['GOT'] !== $GOT){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'GOT', '$record[GOT]', '$GOT', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['GPT'] !== $GPT){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'GPT', '$record[GPT]', '$GPT', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['BILIRUBIN_TOTAL'] !== $BILIRUBIN_TOTAL){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'BILIRUBIN_TOTAL', '$record[BILIRUBIN_TOTAL]', '$BILIRUBIN_TOTAL', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Blood_ammonia'] !== $Blood_ammonia){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Blood_ammonia', '$record[Blood_ammonia]', '$Blood_ammonia', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['ALBUMIN'] !== $ALBUMIN){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', '血液資料', 'Albumin', '$record[ALBUMIN]', '$ALBUMIN', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Folic_acid'] !== $Folic_acid){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Folic_acid', '$record[Folic_acid]', '$Folic_acid', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Vit_B12'] !== $Vit_B12){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Vit.B12', '$record[Vit_B12]', '$Vit_B12', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Glucose_AC'] !== $Glucose_AC){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Glucose_AC', '$record[Glucose_AC]', '$Glucose_AC', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['HbA1c'] !== $HbA1c){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'HbA1c', '$record[HbA1c]', '$HbA1c', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['CHOLESTEROL'] !== $CHOLESTEROL){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', '血液資料', 'Cholesterol', '$record[CHOLESTEROL]', '$CHOLESTEROL', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['TRIGLYCERIDE'] !== $TRIGLYCERIDE){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Triglyceride', '$record[TRIGLYCERIDE]', '$TRIGLYCERIDE', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['LDL'] !== $LDL){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', '血液資料', 'LDL', '$record[LDL]', '$LDL', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['HDL'] !== $HDL){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'HDL', '$record[HDL]', '$HDL', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['URIC'] !== $URIC){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Uric', '$record[URIC]', '$URIC', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['TSH'] !== $TSH){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'TSH', '$record[TSH]', '$TSH', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['T3'] !== $T3){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'T3', '$record[T3]', '$T3', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['T4'] !== $T4){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'T4', '$record[T4]', '$T4', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['Free_T4'] !== $Free_T4){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'Free_T4', '$record[Free_T4]', '$Free_T4', '$date', '','','$blood_num_index','$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['RPR_VDRL_test'] !== $RPR_VDRL_test){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', '血液資料', 'RPR_VDRL_test', '$record[RPR_VDRL_test]', '$RPR_VDRL_test', '$date','','','$blood_num_index', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if($record['BILIRUBIN_TOTAL'] == $BILIRUBIN_TOTAL && $record['URIC'] == $URIC && $record['Glucose_AC'] == $Glucose_AC && $record['BUN'] == $BUN && $record['GOT'] == $GOT && $record['GPT'] == $GPT && $record['Na'] == $Na && $record['K'] == $K && $record['Ca'] == $Ca && $record['ALBUMIN'] == $ALBUMIN && $record['Folic_acid'] == $Folic_acid && $record['Vit_B12'] == $Vit_B12 && $record['CHOLESTEROL'] == $CHOLESTEROL && $record['LDL'] == $LDL && $record['HDL'] == $HDL && $record['Blood_ammonia'] == $Blood_ammonia && $record['HGB'] == $HGB && $record['WBC'] == $WBC && $record['SEG'] == $SEG && $record['RBC'] == $RBC && $record['Platelet'] == $Platelet && $record['eGFR'] == $eGFR && $record['Free_T4'] == $Free_T4 && $record['T4'] == $T4 && $record['T3'] == $T3 && $record['TRIGLYCERIDE'] == $TRIGLYCERIDE && $record['HbA1c'] == $HbA1c && $record['Creatinine'] == $Creatinine && $record['RPR_VDRL_test'] == $RPR_VDRL_test && $record['TSH'] == $TSH && $record['record_time'] == $blood_record_time){ ?>
        <script>
            swal({
                title:'未修改資料',
                icon: 'error',
            })
            .then(function(){
                history.go(-2);
            });
        </script>
    <?php } ?>