<html>
    <head>
        <title>修改</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start();
    $id = $_SESSION['id']; 
    $account = $_SESSION['account'];
    $revise_name = $_SESSION['name'];
    $link = mysqli_connect("localhost", "root", "", "subject");
    $sql = "SELECT * FROM carer where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result);
 
    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d H:i:s");
    $revise = $_GET['revise'];
    // 照顧者資料
    $carer_name=$_GET['carer_name'];
    $carer_gender=$_GET['carer_gender'];
    $carer_phone=$_GET['carer_phone'];
    $carer_job=$_GET['carer_job'];
    $carer_relation=$_GET['carer_relation'];
    $carer_education=$_GET['carer_education'];
    $caretaker=$_GET['caretaker'];

    if ($record['name'] !== $carer_name){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '姓名', '$record[name]', '$carer_name', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['gender'] !== $carer_gender){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '性別', '$record[gender]', '$carer_gender', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php 
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['phone'] !== $carer_phone){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '聯絡電話', '$record[phone]', '$carer_phone', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['job'] !== $carer_job){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '職業', '$record[job]', '$carer_job', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['relation'] !== $carer_relation){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '與個案關係', '$record[relation]', '$carer_relation', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['education'] !== $carer_education){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '教育程度', '$record[education]', '$carer_education', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if ($record['caretaker'] !== $caretaker){
        $sql_id = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date, account, name) VALUES ('$id', '照顧者資料', '有無聘用看護', '$record[caretaker]', '$caretaker', '$date', '$account', '$revise_name')";
        if(mysqli_query($link,$sql_id)){ ?>
            <script>
                parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&carer_name=<?php echo $carer_name ?>&carer_phone=<?php echo $carer_phone ?>&carer_job=<?php echo $carer_job ?>&carer_relation=<?php echo $carer_relation ?>&carer_education=<?php echo $carer_education ?>&caretaker=<?php echo $caretaker ?>&carer_gender=<?php echo $carer_gender ?>';
            </script>
            <?php
        }else{ ?> 
            <script>              
                history.go(-1);
            </script>
            <?php
        }
    }
    if($record['name'] == $carer_name && $record['gender'] == $carer_gender && $record['phone'] == $carer_phone && $record['job'] == $carer_job && $record['relation'] == $carer_relation && $record['education'] == $carer_education && $record['caretaker'] == $caretaker){ ?>
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