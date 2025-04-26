<html>
    <head>
        <title>修改</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
session_start();
$cdr_num_index = $_SESSION['cdr_num_index'];
$id = $_SESSION['id'];
$account = $_SESSION['account']; 
$revise_name = $_SESSION['name'];
$link = mysqli_connect("localhost", "root", "", "subject");

$sql = "SELECT * FROM cdr where id='$id' and num='$cdr_num_index'";
$result = mysqli_query($link, $sql);
$record = mysqli_fetch_assoc($result);

$sql_cdr_mem = "SELECT * FROM cdr_memory where id='$id' and date='$record[date]'";
$result_cdr_mem = mysqli_query($link, $sql_cdr_mem);
$record_mem = mysqli_fetch_assoc($result_cdr_mem);

$sql_cdr_ori = "SELECT * FROM cdr_orientation where id='$id' and date='$record[date]'";
$result_cdr_ori = mysqli_query($link, $sql_cdr_ori);
$record_ori = mysqli_fetch_assoc($result_cdr_ori);

$sql_cdr_jug = "SELECT * FROM cdr_judgment_and_problem_solving where id='$id' and date='$record[date]'";
$result_cdr_jug = mysqli_query($link, $sql_cdr_jug);
$record_jug = mysqli_fetch_assoc($result_cdr_jug);

$sql_cdr_com = "SELECT * FROM cdr_community_affairs where id='$id' and date='$record[date]'";
$result_cdr_com = mysqli_query($link, $sql_cdr_com);
$record_com = mysqli_fetch_assoc($result_cdr_com);

$sql_cdr_home = "SELECT * FROM cdr_home_and_hobbies where id='$id' and date='$record[date]'";
$result_cdr_home = mysqli_query($link, $sql_cdr_home);
$record_home = mysqli_fetch_assoc($result_cdr_home);

$sql_cdr_per = "SELECT * FROM cdr_personal_care where id='$id' and date='$record[date]'";
$result_cdr_per = mysqli_query($link, $sql_cdr_per);
$record_per = mysqli_fetch_assoc($result_cdr_per);

if($record['record_time'] == '0000-00-00'){
    $record['record_time'] = '';
}

date_default_timezone_set('Asia/Taipei');
$date = date("Y-m-d H:i:s");
$revise = $_GET['revise'];

//CDR
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

if ($record['record_time'] !== $cdr_record_time){
    $sql_record_time = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'cdr', '受測日期', '$record[record_time]', '$cdr_record_time', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_record_time)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_mem['content'] !== $cdr_memory){
    $sql_mem = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'cdr', '記憶力', '$record_mem[content]', '$cdr_memory', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_mem)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_mem['freetyping'] !== $cdr_memory_text){
    $sql_mem_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '記憶力-說明', '$record_mem[freetyping]', '$cdr_memory_text', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_mem_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_ori['content'] !== $cdr_orientation){
    $sql_ori = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '定向感', '$record_ori[content]', '$cdr_orientation', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_ori)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_ori['freetyping'] !== $cdr_orientation_text){
    $sql_ori_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '定向感-說明', '$record_ori[freetyping]', '$cdr_orientation_text', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_ori_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_jug['content'] !== $cdr_judgment_and_problem_solving){
    $sql_jug = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr','解決問題能力', '$record_jug[content]', '$cdr_judgment_and_problem_solving', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_jug)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_jug['freetyping']) !== trim($cdr_judgment_and_problem_solving_text)){
    $sql_jug_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '解決問題能力-說明', '$record_jug[freetyping]', '$cdr_judgment_and_problem_solving_text', '$date','$cdr_num_index','','', '$account', '$revise_name')";
    if(mysqli_query($link,$sql_jug_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_com['content'] !== $cdr_community_affairs){
    $sql_com = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '社區活動能力', '$record_com[content]', '$cdr_community_affairs', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_com)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_com['freetyping']) !== trim($cdr_community_affairs_text)){
    $sql_com_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '社區活動能力-說明', '$record_com[freetyping]', '$cdr_community_affairs_text', '$date','$cdr_num_index','','', '$account', '$revise_name')";
    if(mysqli_query($link,$sql_com_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_home['content'] !== $cdr_home_and_hobbies){
    $sql_home = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '居家嗜好', '$record_home[content]', '$cdr_home_and_hobbies', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_home)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_home['freetyping'] !== $cdr_home_and_hobbies_text){
    $sql_home_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '居家嗜好-說明', '$record_home[freetyping]', '$cdr_home_and_hobbies_text', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_home_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_per['content'] !== $cdr_personal_care){
    $sql_per = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '自我照料', '$record_per[content]', '$cdr_personal_care', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_per)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record_per['freetyping'] !== $cdr_personal_care_text){
    $sql_per_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '自我照料-說明', '$record_per[freetyping]', '$cdr_personal_care_text', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_per_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record['freetyping'] !== $cdr_freetyping){
    $sql_typing = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', '總結', '$record[freetyping]', '$cdr_freetyping', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_typing)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if ($record['cdr'] !== $cdr_cdr){
    $sql_cdr = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'cdr', 'CDR判分', '$record[cdr]', '$cdr_cdr', '$date','$cdr_num_index','','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_cdr)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise?>&id=<?php echo $id ?>&cdr_memory=<?php echo $cdr_memory?>&cdr_memory_text=<?php echo $cdr_memory_text?>&cdr_orientation=<?php echo $cdr_orientation ?>&cdr_orientation_text=<?php echo $cdr_orientation_text?>&cdr_judgment_and_problem_solving=<?php echo $cdr_judgment_and_problem_solving?>&cdr_judgment_and_problem_solving_text=<?php echo $cdr_judgment_and_problem_solving_text?>&cdr_community_affairs=<?php echo $cdr_community_affairs?>&cdr_community_affairs_text=<?php echo $cdr_community_affairs_text?>&cdr_home_and_hobbies=<?php echo $cdr_home_and_hobbies?>&cdr_home_and_hobbies_text=<?php echo $cdr_home_and_hobbies_text?>&cdr_personal_care=<?php echo $cdr_personal_care?>&cdr_personal_care_text=<?php echo $cdr_personal_care_text?>&cdr_freetyping=<?php echo $cdr_freetyping?>&sum_of_box=<?php echo $sum_of_box?>&cdr_cdr=<?php echo $cdr_cdr?>&cdr_record_time=<?php echo $cdr_record_time?>&cdr_num=<?php echo $cdr_num_index?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if($record_mem['content'] == $cdr_memory && $record_mem['freetyping'] == $cdr_memory_text && $record_ori['content'] == $cdr_orientation && $record_ori['freetyping'] == $cdr_orientation_text && $record_jug['content'] == $cdr_judgment_and_problem_solving && trim($record_jug['freetyping']) == trim($cdr_judgment_and_problem_solving_text) && $record_com['content'] == $cdr_community_affairs && trim($record_com['freetyping']) == trim($cdr_community_affairs_text) && $record_home['content'] == $cdr_home_and_hobbies && $record_home['freetyping'] == $cdr_home_and_hobbies_text && $record_per['content'] == $cdr_personal_care && $record_per['freetyping'] == $cdr_personal_care_text && $record['freetyping'] == $cdr_freetyping && $record['cdr'] == $cdr_cdr && $record['record_time'] == $cdr_record_time){ ?>
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