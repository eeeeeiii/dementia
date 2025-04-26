<html>
    <head>
    <title>修改</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start();
    $revise = $_GET['revise'];
    $id = $_GET['id'];
 
    //基本資料
    $name = $_GET['name'];
    $birth = $_GET['birth'];//出生年月日
    $birth_age = strtotime($birth);//用來記錄病人年齡
    $hsex = $_GET['hsex'];
    $person_id = $_GET['person_id'];
    $education = $_GET['education'];
    $living = $_GET['living'];
    $social_walfare = $_GET['social_walfare']; 
    $marriage = $_GET['marriage'];
    $medi_history_YN = $_GET['medi_history_YN'];
    $medi_history = $_GET['medi_history'];

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

    $link = mysqli_connect("localhost", "root", "", "subject");
    if($revise == "patient_basic"){
        $sql = "UPDATE patient_basic SET name='$name',birth='$birth',age='$age',hsex='$hsex',person_id='$person_id',education='$education',living='$living',social_walfare='$social_walfare',marriage='$marriage',medi_history_YN='$medi_history_YN',medi_history='$medi_history' where id = '$id'";
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'修改成功',
                    icon: 'success',
                })
                .then(function(){
                    location.href="basic_look.php?id=<?php echo $id ?>"
                });
            </script>
            <?php
        }else{ ?> 
            <script>
                swal({
                    title: '修改失敗',
                    icon: 'error',
                })
                .then(function(){
                    history.go(-1);
                })
            </script>
            <?php
        }
    }

    //照顧者資料
    $carer_name=$_GET['carer_name'];
    $carer_gender=$_GET['carer_gender'];
    $carer_phone=$_GET['carer_phone'];
    $carer_job=$_GET['carer_job'];
    $carer_relation=$_GET['carer_relation'];
    $carer_education=$_GET['carer_education'];
    $caretaker=$_GET['caretaker'];

    if($revise == "carer"){
        $sql = "UPDATE carer SET name='$carer_name', education='$carer_education', gender='$carer_gender', job='$carer_job', caretaker='$caretaker', relation='$carer_relation', phone='$carer_phone' where id = '$id' ";
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'修改成功',
                    icon: 'success',
                })
                .then(function(){
                    location.href="carer_look.php";
                });
            </script>
            <?php
        }else{ ?> 
            <script>
               swal({
                    title: '修改失敗',
                    icon: 'error',
                })
                .then(function(){
                    history.go(-1);
                })
            </script>
            <?php
        }
    }
    
    //CDR
    $cdr_num_index = $_SESSION['cdr_num_index'];
    $cdr_memory=$_GET['cdr_memory'];
    $cdr_orientation=$_GET['cdr_orientation'];
    $cdr_judgment_and_problem_solving=$_GET['cdr_judgment_and_problem_solving'];
    $cdr_community_affairs=$_GET['cdr_community_affairs'];
    $cdr_home_and_hobbies=$_GET['cdr_home_and_hobbies'];
    $cdr_personal_care=$_GET['cdr_personal_care'];

    $cdr_memory_text=$_GET['cdr_memory_text'];
    $cdr_orientation_text=$_GET['cdr_orientation_text'];
    $cdr_judgment_and_problem_solving_text=$_GET['cdr_judgment_and_problem_solving_text'];
    $cdr_community_affairs_text=$_GET['cdr_community_affairs_text'];
    $cdr_home_and_hobbies_text=$_GET['cdr_home_and_hobbies_text'];
    $cdr_personal_care_text=$_GET['cdr_personal_care_text'];
    $cdr_record_time=$_GET['cdr_record_time'];
    //總結總分判分
    $cdr_freetyping=$_GET["cdr_freetyping"];
    $sum_of_box=$_GET["sum_of_box"];
    $cdr_cdr=$_GET["cdr_cdr"];

    //找各表最新資料
    $sql = "SELECT * FROM cdr where id='$id' and num='$cdr_num_index'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result);

    if($revise == "cdr"){
        $sql = "UPDATE cdr SET sum_of_box='$sum_of_box',cdr='$cdr_cdr',freetyping='$cdr_freetyping',record_time='$cdr_record_time' where id = '$id' and date='$record[date]'";
        $sql_memory="UPDATE cdr_memory SET content='$cdr_memory',freetyping='$cdr_memory_text' where id = '$id' and date='$record[date]'";
        $sql_ori="UPDATE cdr_orientation SET content='$cdr_orientation',freetyping='$cdr_orientation_text' where id = '$id' and date='$record[date]'";
        $sql_jug="UPDATE cdr_judgment_and_problem_solving SET content='$cdr_judgment_and_problem_solving',freetyping='$cdr_judgment_and_problem_solving_text' where id = '$id' and date='$record[date]'";
        $sql_com="UPDATE cdr_community_affairs SET content='$cdr_community_affairs',freetyping='$cdr_community_affairs_text' where id = '$id' and date='$record[date]'";
        $sql_home="UPDATE cdr_home_and_hobbies SET content='$cdr_home_and_hobbies',freetyping='$cdr_home_and_hobbies_text' where id = '$id' and date='$record[date]'";
        $sql_per="UPDATE cdr_personal_care SET content='$cdr_personal_care',freetyping='$cdr_personal_care_text' where id = '$id' and date='$record[date]'";

        if(mysqli_query($link,$sql) && mysqli_query($link,$sql_memory) && mysqli_query($link,$sql_ori) && mysqli_query($link,$sql_jug) && mysqli_query($link,$sql_com) && mysqli_query($link,$sql_home) && mysqli_query($link,$sql_per)){ ?>
             <script>
                swal({
                    title:'修改成功',
                    icon: 'success',
                })
                .then(function(){
                    history.go(-2);
                })
            </script>
             <?php
        }else{ ?> 
             <script>
                swal({
                    title: '修改失敗',
                    icon: 'error',
                })
                .then(function(){
                    history.go(-1);
                })
            </script>
             <?php
        }
    }
    //MMSE
    $mmse_num_index = $_SESSION['mmse_num_index'];
    $mmse_reading=$_GET['mmse_reading'];
    $mmse_hand=$_GET['mmse_hand'];
    $mmse_action=$_GET['mmse_action'];
    $mmse_action_text=$_GET['mmse_action_text'];
    $mmse_build=$_GET['mmse_build'];
    $mmse_build_text=$_GET['mmse_build_text'];
    $mmse_time=$_GET['mmse_time'];
    $mmse_time_text=$_GET['mmse_time_text'];
    $mmse_place=$_GET['mmse_place'];
    $mmse_place_text=$_GET['mmse_place_text'];
    $mmse_reg=$_GET['mmse_reg'];
    $mmse_reg_text=$_GET['mmse_reg_text'];
    $mmse_7=$_GET['mmse_7'];
    $mmse_7_text=$_GET['mmse_7_text'];
    $mmse_recall=$_GET['mmse_recall'];
    $mmse_recall_text=$_GET['mmse_recall_text'];
    $mmse_lan_name=$_GET['mmse_lan_name'];
    $mmse_lan_name_text=$_GET['mmse_lan_name_text'];
    $mmse_lan_repeat=$_GET['mmse_lan_repeat'];
    $mmse_lan_repeat_text=$_GET['mmse_lan_repeat_text'];
    $mmse_lan_read=$_GET['mmse_lan_read'];
    $mmse_lan_read_text=$_GET['mmse_lan_read_text'];
    $mmse_lan_write=$_GET['mmse_lan_write'];
    $mmse_lan_write_text=$_GET['mmse_lan_write_text'];
    $mmse_record_time=$_GET['mmse_record_time'];

    $mmse_freetyping=$_GET["mmse_freetyping"];
    $mmse_total=$_GET['mmse_total'];
    $mmse_num=$_GET['mmse_num'];
    
    $sql_m = "SELECT * FROM mmse where id='$id' and num='$mmse_num_index'";
    $result_m = mysqli_query($link, $sql_m);
    $record_m = mysqli_fetch_assoc($result_m);

    if($revise == "mmse"){
        $sql =          "UPDATE mmse SET total='$mmse_total',freetyping='$mmse_freetyping',reading='$mmse_reading',hand='$mmse_hand',record_time='$mmse_record_time' where id = '$id' and date='$record_m[date]'";
        $sql_act=       "UPDATE mmse_action SET content='$mmse_action',freetyping='$mmse_action_text'  where id = '$id' and date='$record_m[date]'";
        $sql_build=     "UPDATE mmse_build SET content='$mmse_build',freetyping='$mmse_build_text'  where id = '$id' and date='$record_m[date]'";
        $sql_place=     "UPDATE mmse_place SET content='$mmse_place',freetyping='$mmse_place_text'  where id = '$id' and date='$record_m[date]'";
        $sql_time=      "UPDATE mmse_time SET content='$mmse_time',freetyping='$mmse_time_text'  where id = '$id' and date='$record_m[date]'";
        $sql_recall=    "UPDATE mmse_recall SET content='$mmse_recall',freetyping='$mmse_recall_text'  where id = '$id' and date='$record_m[date]'";
        $sql_reg=       "UPDATE mmse_registration SET content='$mmse_reg',freetyping='$mmse_reg_text'  where id = '$id' and date='$record_m[date]'";
        $sql_7=         "UPDATE mmse_attention_and_calculation SET content='$mmse_7',freetyping='$mmse_7_text'  where id = '$id' and date='$record_m[date]'";
        $sql_lan_name=  "UPDATE mmse_lan_name SET content='$mmse_lan_name',freetyping='$mmse_lan_name_text'  where id = '$id' and date='$record_m[date]'";
        $sql_lan_repeat="UPDATE mmse_lan_repeat SET content='$mmse_lan_repeat',freetyping='$mmse_lan_repeat_text' where id = '$id' and date='$record_m[date]'";
        $sql_lan_read=  "UPDATE mmse_lan_read SET content='$mmse_lan_read',freetyping='$mmse_lan_read_text'  where id = '$id' and date='$record_m[date]'";
        $sql_lan_write= "UPDATE mmse_lan_write SET content='$mmse_lan_write',freetyping='$mmse_lan_write_text' where id = '$id' and date='$record_m[date]'";
        

        if(mysqli_query($link,$sql) && mysqli_query($link,$sql_act) && mysqli_query($link,$sql_build) && mysqli_query($link,$sql_place) && mysqli_query($link,$sql_time) && mysqli_query($link,$sql_recall) && mysqli_query($link,$sql_reg)&& mysqli_query($link,$sql_7)&& mysqli_query($link,$sql_lan_name)&& mysqli_query($link,$sql_lan_repeat)&& mysqli_query($link,$sql_lan_read)&& mysqli_query($link,$sql_lan_write)){ ?>
            <script>
                swal({
                    title:'修改成功',
                    icon: 'success',
                })
                .then(function(){
                    history.go(-2);
                });
                
            </script>
            <?php
        }else{ ?> 
            <script>
                swal({
                    title: '修改失敗',
                    icon: 'error',
                })
                .then(function(){
                    history.go(-1);
                })
            </script>
            <?php
        }
    }

    //血液資料
    $blood_num_index = $_SESSION['blood_num_index'];
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
    $blood_num=$_GET['blood_num'];
    $blood_record_time=$_GET['blood_record_time'];

    if($revise == "blood"){
        $sql = "UPDATE blood SET BILIRUBIN_TOTAL='$BILIRUBIN_TOTAL', URIC='$URIC',  Glucose_AC='$Glucose_AC', BUN='$BUN',GOT='$GOT',GPT='$GPT',Na='$Na',K='$K',Ca='$Ca',ALBUMIN='$ALBUMIN',Folic_acid='$Folic_acid',Vit_B12='$Vit_B12',CHOLESTEROL='$CHOLESTEROL',LDL='$LDL',HDL='$HDL',Blood_ammonia='$Blood_ammonia',HGB='$HGB',WBC='$WBC',SEG='$SEG',RBC='$RBC',Platelet='$Platelet',eGFR='$eGFR',Free_T4='$Free_T4',T4='$T4',T3='$T3',TRIGLYCERIDE='$TRIGLYCERIDE',HbA1c='$HbA1c',Creatinine='$Creatinine',RPR_VDRL_test='$RPR_VDRL_test' ,TSH='$TSH',record_time='$blood_record_time' where id = '$id' AND num='$blood_num_index' ";
        if(mysqli_query($link,$sql)){ ?>
            <script>
                swal({
                    title:'修改成功',
                    icon: 'success',
                })
                .then(function(){
                    history.go(-2);
                });
            </script>
            <?php
        }else{ ?> 
            <script>
                swal({
                    title: '修改失敗',
                    icon: 'error',
                })
                .then(function(){
                    history.go(-1);
                })
            </script>
            <?php
        }
    }

    //使用者
    $revise_POST = $_POST['revise'];
    $account = $_POST['modalValue'];
    $doctor = $_POST['doctor_update'];
    $personal_manager = $_POST['personal_manager_update'];
    $psychologist = $_POST['psychologist_update'];
    $nurse = $_POST['nurse_update'];
    if($doctor == ""){$doctor = 0;}
    if($personal_manager == ""){$personal_manager = 0;}
    if($psychologist == ""){$psychologist = 0;}
    if($nurse == ""){$nurse = 0;}

    if($revise_POST == "user"){ 
        $sql = "UPDATE user SET doctor='$doctor', personal_manager='$personal_manager', psychologist='$psychologist', nurse='$nurse' where account = '$account'";
            if(mysqli_query($link,$sql)){ ?>
                <script>
                    swal({
                        title:'修改成功',
                        icon: 'success',
                    })
                    .then(function(){
                        document.location.href="manage.php";
                    });
                </script>
                <?php
            }else{ ?> 
                <script>
                    swal({
                        title: '修改失敗',
                        icon: 'error',
                    })
                    .then(function(){
                        document.location.href="manage.php";
                    })
                </script>
                <?php
            }
        }
    

        //個人
        $revise=$_GET['revise'];
        $pass=$_GET['pass'];
        $num=$_GET['num'];
        if($revise == "self" and $num == 1){
        $name=$_GET['name'];
        $gender=$_GET['gender'];
        $phone=$_GET['phone'];
        $birth=$_GET['birth'];
        $email=$_GET['email'];
        $service=$_GET['service'];
        
        // if($pass == 0){$pass = 1;}
        
            $account = $_SESSION['account'];
            $sql = "UPDATE user SET name='$name', gender='$gender', phone='$phone', birth='$birth',email='$email',service='$service' where account = '$account'";
            if(mysqli_query($link, $sql)){ ?>
                <script>
                    swal({
                        title:'修改成功',
                        icon:'success',
                    }).then(function(){
                        document.location.href="self.php";
                    });
                </script>
                <?php 
            }else{ ?>
                <script>
                    swal({
                        title:'修改失敗',
                        icon:'error',
                    }).then(function(){
                        history.go(-1);
                    });
                </script>
                <?php
            }
        }


        if($revise == "self" and $num == 0 and $pass==1){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];
        $birth=$_POST['birth'];
        $email=$_POST['email'];
        $service=$_POST['service'];
                
            $account = $_SESSION['account'];
            $sql = "UPDATE user SET name='$name', gender='$gender', phone='$phone', birth='$birth',email='$email',service='$service' where account = '$account'";
            if(mysqli_query($link, $sql)){ ?>
                <script>
                    swal({
                        title:'更新成功',
                        icon:'success',
                        buttons: {
                            confirm: {
                            text: '確認',
                            className: 'btn btn-info'
                        }
                    },
                }).then(function (isConfirmed) { 
                    if (isConfirmed) {
                    swal({
                        title: '請重新登入',
                        icon: 'info',
                        buttons: {
                        confirm: {
                            text: '確認',
                            className: 'btn btn-info'
                        }
                        },
                    }).then(function (isConfirmed) {
                        if (isConfirmed) {
                        window.location.href = 'index.php';   
                    }
                });
                }
            });
            </script>
                <?php 
            }else{ ?>
                <script>
                    swal({
                        title:'更新失敗',
                        icon:'error',
                    }).then(function(){
                        history.go(-1);
                    });
                </script>
                <?php
            }
        }

        if($revise == "self" and $num == 0 and $pass==0){
            $name=$_POST['name'];
            $gender=$_POST['gender'];
            $phone=$_POST['phone'];
            $birth=$_POST['birth'];
            $email=$_POST['email'];
            $service=$_POST['service'];
                    
                $account = $_SESSION['account'];
                $sql = "UPDATE user SET name='$name', gender='$gender', phone='$phone', birth='$birth',email='$email',service='$service' where account = '$account'";
                if(mysqli_query($link, $sql)){ ?>
                    <script>
                        swal({
                            title:'更新成功',
                            icon:'success',
                            buttons: {
                                confirm: {
                                text: '確認',
                                className: 'btn btn-info'
                            }
                        },
                    }).then(function (isConfirmed) { 
                        if (isConfirmed) {
                        swal({
                            title: '請記得更改密碼',
                            text:'更改密碼後才能使用系統其他功能',
                            icon: 'info',
                            buttons: {
                            confirm: {
                                text: '確認',
                                className: 'btn btn-info'
                            }
                            },
                        }).then(function (isConfirmed) {
                            if (isConfirmed) {
                            window.location.href = 'self.php';   
                        }
                    });
                    }
                });
                </script>
                    <?php 
                }else{ ?>
                    <script>
                        swal({
                            title:'更新失敗',
                            icon:'error',
                        }).then(function(){
                            history.go(-1);
                        });
                    </script>
                    <?php
                }
            }
    
        
?>