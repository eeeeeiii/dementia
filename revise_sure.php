<html>
    <head>
    <title>修改確認</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start();
    $revise = $_POST['revise'];
    $link = mysqli_connect("localhost", "root", "", "subject");

    // 基本資料
    $id = $_SESSION['id'];
    $name = $_POST['name']; 
    $birth = $_POST['birth']; 
    $hsex = $_POST['hsex'];
    $person_id = $_POST['person_id']; 
    $education = $_POST['education'];
    $living = $_POST['living'];
    $social_walfare = $_POST['social_walfare'];
    $marriage = $_POST['marriage'];
    $medi_history_YN = $_POST['medi_history_YN'];
    $medi_history = $_POST['medi_history'];

    if($revise == "patient_basic"){ ?>
        <script> 
            swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise_insert_basic.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>'
                    }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });

        </script>
    <?php } 


    // 照顧者資料
    $carer_name=$_POST['carer_name'];
    $carer_gender=$_POST['carer_gender'];
    $carer_phone=$_POST['carer_phone'];
    $carer_job=$_POST['carer_job'];
    $carer_relation=$_POST['carer_relation'];
    $carer_education=$_POST['carer_education'];
    $caretaker=$_POST['caretaker'];

    if($revise == "carer"){ ?>
        <script> 
            swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise_insert_carer.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
                    }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });
        </script> 
        <?php
        }
        
    // CDR
    $cdr_num_index = $_SESSION['cdr_num_index'];
    $cdr_memory=trim($_POST['cdr_memory']);
    $cdr_orientation=trim($_POST['cdr_orientation']);
    $cdr_judgment_and_problem_solving=trim($_POST['cdr_judgment_and_problem_solving']);
    $cdr_community_affairs=trim($_POST['cdr_community_affairs']);
    $cdr_home_and_hobbies=trim($_POST['cdr_home_and_hobbies']);
    $cdr_personal_care=trim($_POST['cdr_personal_care']);
    $cdr_memory_text=trim($_POST['cdr_memory_text']);
    $cdr_orientation_text=trim($_POST['cdr_orientation_text']);
    $cdr_judgment_and_problem_solving_text=trim($_POST['cdr_judgment_and_problem_solving_text']);
    $cdr_community_affairs_text=trim($_POST['cdr_community_affairs_text']);
    $cdr_home_and_hobbies_text=trim($_POST['cdr_home_and_hobbies_text']);
    $cdr_personal_care_text=trim($_POST['cdr_personal_care_text']);
    $cdr_record_time=$_POST['cdr_record_time'];
    //總結總分判分
    $cdr_freetyping=$_POST["cdr_freetyping"];
    $sum_of_box=floatval($cdr_memory)+floatval($cdr_orientation)+floatval($cdr_judgment_and_problem_solving)+floatval($cdr_community_affairs)+floatval($cdr_home_and_hobbies)+floatval($cdr_personal_care);
    $cdr_cdr=$_POST["cdr_rating"];
   
    if($revise == "cdr"){ ?>
        <script> 
            swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise_insert_cdr.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory ?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving ?>&cdr_community_affairs=<?php echo $cdr_community_affairs ?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies ?>&cdr_personal_care=<?php echo $cdr_personal_care ?>&cdr_memory_text=<?php echo $cdr_memory_text ?>&cdr_orientation_text=<?php echo $cdr_orientation_text ?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text ?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text ?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text ?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text ?>&cdr_freetyping=<?php echo $cdr_freetyping ?>&sum_of_box=<?php echo $sum_of_box ?>&cdr_cdr=<?php echo $cdr_cdr ?>&cdr_record_time=<?php echo $cdr_record_time ?>&cdr_num=<?php echo $cdr_num_index ?> ';
                }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });
            
        </script>
        <?php
    }
    // MMSE
    $mmse_num_index = $_SESSION['mmse_num_index'];
    $mmse_reading=trim($_POST['mmse_reading']);
    $mmse_hand=trim($_POST['mmse_hand']);
    $mmse_action=trim($_POST['mmse_action']); 
    $mmse_action_text=trim($_POST['mmse_action_text']);
    $mmse_build=trim($_POST['mmse_build']);
    $mmse_build_text=trim($_POST['mmse_build_text']);
    $mmse_time=trim($_POST['mmse_time']);
    $mmse_time_text=trim($_POST['mmse_time_text']);
    $mmse_place=trim($_POST['mmse_place']);
    $mmse_place_text=trim($_POST['mmse_place_text']);
    $mmse_reg=trim($_POST['mmse_reg']);
    $mmse_reg_text=trim($_POST['mmse_reg_text']);
    $mmse_7=trim($_POST['mmse_7']);
    $mmse_7_text=trim($_POST['mmse_7_text']);
    $mmse_recall=trim($_POST['mmse_recall']);
    $mmse_recall_text=trim($_POST['mmse_recall_text']);
    $mmse_lan_name=trim($_POST['mmse_lan_name']);
    $mmse_lan_name_text=trim($_POST['mmse_lan_name_text']);
    $mmse_lan_repeat=trim($_POST['mmse_lan_repeat']);
    $mmse_lan_repeat_text=trim($_POST['mmse_lan_repeat_text']);
    $mmse_lan_read=trim($_POST['mmse_lan_read']);
    $mmse_lan_read_text=trim($_POST['mmse_lan_read_text']);
    $mmse_lan_write=trim($_POST['mmse_lan_write']);
    $mmse_lan_write_text=trim($_POST['mmse_lan_write_text']);
    $mmse_record_time=$_POST['mmse_record_time'];
    //總結總分計數
    $mmse_freetyping=$_POST["mmse_freetyping"];
    $mmse_total=intval($mmse_action)+intval($mmse_build)+intval($mmse_time)+intval($mmse_place)+intval($mmse_reg)+intval($mmse_7)+intval($mmse_recall)+intval($mmse_lan_name)+intval($mmse_lan_repeat)+intval($mmse_lan_read)+intval($mmse_lan_write);

    if($revise == "mmse"){ ?>
        <script> 
           swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise_insert_mmse.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_record_time=<?php echo $mmse_record_time ?>&mmse_num=<?php echo $mmse_num_index ?> ';
                }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });
            
            
        </script>
        <?php
    }

    // 血液資料
    $blood_num_index = $_SESSION['blood_num_index'];
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
    $blood_record_time=$_POST['blood_record_time'];

    if($revise == "blood"){ ?>
        <script> 
            swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise_insert_blood.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&BILIRUBIN_TOTAL=<?php echo $BILIRUBIN_TOTAL ?>&URIC=<?php echo $URIC ?>&Glucose_AC=<?php echo  $Glucose_AC?>&BUN=<?php echo $BUN?>&GOT=<?php echo $GOT?>&GPT=<?php echo $GPT ?>&Na=<?php echo $Na ?>&K=<?php echo $K ?>&Ca=<?php echo $Ca  ?>&ALBUMIN=<?php echo $ALBUMIN ?>&Folic_acid=<?php echo $Folic_acid?>&Vit_B12=<?php echo $Vit_B12?>&CHOLESTEROL=<?php echo $CHOLESTEROL?>&LDL=<?php echo $LDL?>&HDL=<?php echo $HDL?>&Blood_ammonia=<?php echo $Blood_ammonia?>&HGB=<?php echo $HGB?>&WBC=<?php echo $WBC?>&SEG=<?php echo $SEG?>&RBC=<?php echo $RBC?>&Platelet=<?php echo $Platelet?>&eGFR=<?php echo $eGFR?>&Free_T4=<?php echo $Free_T4?>&T4=<?php echo $T4?>&T3=<?php echo $T3?>&TRIGLYCERIDE=<?php echo $TRIGLYCERIDE?>&HbA1c=<?php echo $HbA1c?>&Creatinine=<?php echo $Creatinine?>&RPR_VDRL_test=<?php echo $RPR_VDRL_test?>&TSH=<?php echo $TSH?>&blood_record_time=<?php echo $blood_record_time ?>&blood_num=<?php echo $blood_num_index ?>';
                }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });
            
        </script>
        <?php
    }

    //使用者
    $name=$_POST['name'];
    $birth=$_POST['birth'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $service=$_POST['service'];
    $pass=$_GET['pass'];
    $num=$_GET['num'];
    if($revise == "self"){ ?>
        <script> 
            swal({
                title: '確認修改?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href='revise.php?revise=<?php echo $revise ?>&name=<?php echo $name ?>&birth=<?php echo $birth ?>&gender=<?php echo $gender ?>&phone=<?php echo  $phone?>&email=<?php echo $email?>&service=<?php echo $service?>&pass=<?php echo $pass?>&num=<?php echo $num?>';
                }
                else {
                    swal({
                        title: '已取消動作',
                        icon: 'error',
                    })
                    .then(function(){
                        history.go(-1);
                    })
                }
                });
            
        </script>
        <?php
    }

    
?>