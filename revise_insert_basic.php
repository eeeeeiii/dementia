<html>
    <head>
        <title>修改</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start(); 
    $sessionid = $_SESSION['id'];
    $account = $_SESSION['account'];
    $revise_name = $_SESSION['name'];
    $link = mysqli_connect("localhost", "root", "", "subject");
    $sql = "SELECT * FROM patient_basic where id='$sessionid'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result);

    if($record['birth'] == '0000-00-00'){ 
        $record['birth'] = '';
    }

    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d H:i:s");
    $revise = $_GET['revise'];
    // 基本資料 
    $id = $_GET['id'];
    $name = $_GET['name'];
    $birth = $_GET['birth'];
    $hsex = $_GET['hsex'];
    $person_id = $_GET['person_id'];
    $education = $_GET['education'];
    $living = $_GET['living'];
    $social_walfare = $_GET['social_walfare'];
    $marriage = $_GET['marriage'];
    $medi_history_YN = $_GET['medi_history_YN'];
    $medi_history = $_GET['medi_history'];

    if ($record['name'] !== $name){
        $sql_name = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '姓名', '$record[name]', '$name', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_name)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    } 
    if ($record['birth'] !== $birth){
        $sql_birth = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '出生日期', '$record[birth]', '$birth', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_birth)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>            
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['hsex'] !== $hsex){
        $sql_hsex = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '性別', '$record[hsex]', '$hsex', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_hsex)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>            
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['person_id'] !== $person_id){
        $sql_person_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '身分證字號', '$record[person_id]', '$person_id', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_person_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>             
                history.go(-1);
            </script> 
            <?php
        }
    }
    if ($record['education'] !== $education){
        $sql_education = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '教育程度', '$record[education]', '$education', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_education)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['living'] !== $living){
        $sql_living = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '居住狀況', '$record[living]', '$living', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_living)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>               
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['social_walfare'] !== $social_walfare){
        $sql_social_walfare = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '社會福利身分別', '$record[social_walfare]', '$social_walfare', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_social_walfare)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['marriage'] !== $marriage){
        $sql_marriage = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '婚姻狀況', '$record[marriage]', '$marriage', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_marriage)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['medi_history_YN'] !== $medi_history_YN){
        $sql_medi_history_YN = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '有無失智或精神類病史', '$record[medi_history_YN]', '$medi_history_YN', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_medi_history_YN)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        } 
    }
    if ($record['medi_history'] !== $medi_history){
        $sql_medi_history = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '基本資料', '病史', '$record[medi_history]', '$medi_history', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_medi_history)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&name=<?php echo $name?>&birth=<?php echo $birth?>&hsex=<?php echo $hsex?>&person_id=<?php echo $person_id ?>&education=<?php echo $education ?>&living=<?php echo $living ?>&social_walfare=<?php echo $social_walfare ?>&marriage=<?php echo $marriage ?>&medi_history_YN=<?php echo $medi_history_YN ?>&medi_history=<?php echo $medi_history ?>';
            </script>
            <?php
        }else{ ?> 
            <script>             
                history.go(-1);
            </script>
            <?php
        }
    }
    if($record['name'] == $name && $record['birth'] == $birth && $record['hsex'] == $hsex && $record['person_id'] == $person_id && $record['education'] == $education && $record['living'] == $living && $record['social_walfare'] == $social_walfare && $record['marriage'] == $marriage && $record['medi_history_YN'] == $medi_history_YN && $record['medi_history'] == $medi_history){ ?>
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