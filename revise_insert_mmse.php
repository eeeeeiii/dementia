<html>
    <head>
        <title>修改</title>
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
session_start();
$mmse_num_index = $_SESSION['mmse_num_index'];
$id = $_SESSION['id'];
$account = $_SESSION['account']; 
$revise_name = $_SESSION['name'];

date_default_timezone_set('Asia/Taipei'); 
$date = date("Y-m-d H:i:s");

$revise = $_GET['revise'];
$link = mysqli_connect("localhost", "root", "", "subject");

$sql_mmse = "SELECT * FROM mmse where id='$id' and num='$mmse_num_index'";
$result_mmse = mysqli_query($link, $sql_mmse);
$record_mmse = mysqli_fetch_assoc($result_mmse);

$sql_mmse_act = "SELECT * FROM mmse_action where id='$id' and date='$record_mmse[date]'";
$result_mmse_act = mysqli_query($link, $sql_mmse_act);
$record_act = mysqli_fetch_assoc($result_mmse_act);

$sql_mmse_7 = "SELECT * FROM mmse_attention_and_calculation where id='$id' and date='$record_mmse[date]'";
$result_mmse_7 = mysqli_query($link, $sql_mmse_7);
$record_7 = mysqli_fetch_assoc($result_mmse_7);

$sql_mmse_build = "SELECT * FROM mmse_build where id='$id' and date='$record_mmse[date]'";
$result_mmse_build = mysqli_query($link, $sql_mmse_build);
$record_build= mysqli_fetch_assoc($result_mmse_build);


$sql_mmse_place = "SELECT * FROM mmse_place where id='$id' and date='$record_mmse[date]'";
$result_mmse_place = mysqli_query($link, $sql_mmse_place);
$record_place = mysqli_fetch_assoc($result_mmse_place);

$sql_mmse_recall = "SELECT * FROM mmse_recall where id='$id' and date='$record_mmse[date]'";
$result_mmse_recall = mysqli_query($link, $sql_mmse_recall);
$record_recall = mysqli_fetch_assoc($result_mmse_recall);

$sql_mmse_reg = "SELECT * FROM mmse_registration where id='$id' and date='$record_mmse[date]'";
$result_mmse_reg = mysqli_query($link, $sql_mmse_reg);
$record_reg = mysqli_fetch_assoc($result_mmse_reg);

$sql_mmse_time = "SELECT * FROM mmse_time where id='$id' and date='$record_mmse[date]'";
$result_mmse_time = mysqli_query($link, $sql_mmse_time);
$record_time = mysqli_fetch_assoc($result_mmse_time);


$sql_lan_name = "SELECT * FROM mmse_lan_name where id='$id' and date='$record_mmse[date]'";
$result_lan_name = mysqli_query($link, $sql_lan_name);
$record_lan_name = mysqli_fetch_assoc($result_lan_name);

$sql_lan_read= "SELECT * FROM mmse_lan_read where id='$id' and date='$record_mmse[date]'";
$result_lan_read = mysqli_query($link, $sql_lan_read);
$record_lan_read = mysqli_fetch_assoc($result_lan_read);

$sql_lan_repeat= "SELECT * FROM mmse_lan_repeat where id='$id' and date='$record_mmse[date]'";
$result_lan_repeat = mysqli_query($link, $sql_lan_repeat);
$record_lan_repeat = mysqli_fetch_assoc($result_lan_repeat);

$sql_lan_write= "SELECT * FROM mmse_lan_write where id='$id' and date='$record_mmse[date]'";
$result_lan_write = mysqli_query($link, $sql_lan_write);
$record_lan_write = mysqli_fetch_assoc($result_lan_write);

if($record_mmse['record_time'] == '0000-00-00'){
    $record_mmse['record_time'] = '';
}

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

if (trim($record_mmse['reading']) !== trim($mmse_reading)){
    $sql_reading = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '識字程度', '$record_mmse[reading]', '$mmse_reading','$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_reading)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?>&mmse_lan_write=<?php echo $mmse_lan_write ?>&mmse_lan_write_text=<?php echo $mmse_lan_write_text ?>&mmse_freetyping=<?php echo $mmse_freetyping ?>&mmse_total=<?php echo $mmse_total ?>&mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_mmse['hand']) !== trim($mmse_hand)){
    $sql_hand = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '慣用手', '$record_mmse[hand]', '$mmse_hand', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_hand)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?>&mmse_lan_write=<?php echo $mmse_lan_write ?>&mmse_lan_write_text=<?php echo $mmse_lan_write_text ?>&mmse_freetyping=<?php echo $mmse_freetyping ?>&mmse_total=<?php echo $mmse_total ?>&mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_mmse['record_time']) !== trim($mmse_record_time)){
    $sql_record_time = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '受測日期', '$record_mmse[record_time]', '$mmse_record_time','$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_record_time)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?>&mmse_lan_write=<?php echo $mmse_lan_write ?>&mmse_lan_write_text=<?php echo $mmse_lan_write_text ?>&mmse_freetyping=<?php echo $mmse_freetyping ?>&mmse_total=<?php echo $mmse_total ?>&mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_time['content']) !== trim($mmse_time)){
    $sql_time = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '定向感-時間', '$record_time[content]', '$mmse_time', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_time)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_time['freetyping']) !== trim($mmse_time_text)){
    $sql_time_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data,date,cdr_num,mmse_num,blood_num, account, name) VALUES ('$id', 'mmse', '定向感-時間-說明', '$record_time[freetyping]', '$mmse_time_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_time_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_place['content']) !== trim($mmse_place)){
    $sql_place = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '定向感-地方', '$record_place[content]', '$mmse_place', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_place)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_place['freetyping']) !== trim($mmse_place_text)){
    $sql_place_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '定向感-地方-說明', '$record_place[freetyping]', '$mmse_place_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_place_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_reg['content']) !== trim($mmse_reg)){
    $sql_reg = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '注意力-信息登錄', '$record_reg[content]', '$mmse_reg', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_reg)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_reg['freetyping']) !== trim($mmse_reg_text)){
    $sql_reg_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '注意力-信息登錄-說明', '$record_reg[freetyping]', '$mmse_reg_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_reg_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_7['content']) !== trim($mmse_7)){
    $sql_7 = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '注意力-系列減七', '$record_7[content]', '$mmse_7', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_7)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_7['freetyping']) !== trim($mmse_7_text)){
    $sql_7_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '注意力-系列減七-說明', '$record_7[freetyping]', '$mmse_7_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_7_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_recall['content']) !== trim($mmse_recall)){
    $sql_recall = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '回憶', '$record_recall[content]', '$mmse_recall', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_recall)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_recall['freetyping']) !== trim($mmse_recall_text)){
    $sql_recall_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '回憶-說明', '$record_recall[freetyping]', '$mmse_recall_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_recall_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_name['content']) !== trim($mmse_lan_name)){
    $sql_lan_name = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-命名', '$record_lan_name[content]', '$mmse_lan_name', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_name)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_name['freetyping']) !== trim($mmse_lan_name_text)){
    $sql_lan_name_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-命名-說明', '$record_lan_name[freetyping]', '$mmse_lan_name_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_name_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_repeat['content']) !== trim($mmse_lan_repeat)){
    $sql_lan_repeat = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-複誦', '$record_lan_repeat[content]', '$mmse_lan_repeat', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_repeat)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_repeat['freetyping']) !== trim($mmse_lan_repeat_text)){
    $sql_lan_repeat_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-複誦-說明', '$record_lan_repeat[freetyping]', '$mmse_lan_repeat_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_repeat_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}

if (trim($record_lan_read['content']) !==trim( $mmse_lan_read)){
    $sql_lan_read = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-閱讀理解', '$record_lan_read[content]', '$mmse_lan_read', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_read)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_read['freetyping']) !== trim($mmse_lan_read_text)){
    $sql_lan_read_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-閱讀理解-說明', '$record_lan_read[freetyping]', '$mmse_lan_write_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_read_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}

if (trim($record_lan_write['content']) !== trim($mmse_lan_write)){
    $sql_lan_write= "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-書寫造句', '$record_lan_write[content]', '$mmse_lan_write', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_write)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_lan_write['freetyping']) !== trim($mmse_lan_write_text)){
    $sql_lan_write_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-書寫造句-說明', '$record_lan_write[freetyping]', '$mmse_lan_write_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_lan_write_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_act['content']) !== trim($mmse_action)){
    $sql_act = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-口語理解及行用能力', '$record_act[content]', '$mmse_action', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_act)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?>';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_act['freetyping']) !== trim($mmse_action_text)){
    $sql_act_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '語言-口語理解及行用能力-說明', '$record_act[freetyping]', '$mmse_action_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_act_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_build['content']) !== trim($mmse_build)){
    $sql_build = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '建構力', '$record_build[content]', '$mmse_build', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_build)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_build['freetyping']) !== trim($mmse_build_text)){
    $sql_build_text = "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '建構力-說明', '$record_build[freetyping]', '$mmse_build_text', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_build_text)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if (trim($record_mmse['freetyping']) !== trim($mmse_freetyping)){
    $sql_freetyping= "INSERT INTO revise (id, revise_table, revise_column, original_data, new_data, date,cdr_num,mmse_num,blood_num,account, name) VALUES ('$id', 'mmse', '總結', '$record_mmse[freetyping]', '$mmse_freetyping', '$date','','$mmse_num_index','','$account', '$revise_name')";
    if(mysqli_query($link,$sql_freetyping)){ ?>
        <script>
            parent.location.href='revise.php?revise=<?php echo $revise ?>&id=<?php echo $id ?>&mmse_reading=<?php echo $mmse_reading ?>&mmse_hand=<?php echo $mmse_hand ?>&mmse_action=<?php echo $mmse_action ?>&mmse_action_text=<?php echo $mmse_action_text ?>&mmse_build=<?php echo $mmse_build ?>&mmse_build_text=<?php echo $mmse_build_text ?>&mmse_time=<?php echo $mmse_time ?>&mmse_time_text=<?php echo $mmse_time_text ?>&mmse_place=<?php echo $mmse_place ?>&mmse_place_text=<?php echo $mmse_place_text ?>&mmse_reg=<?php echo $mmse_reg ?>&mmse_reg_text=<?php echo $mmse_reg_text ?>&mmse_7=<?php echo $mmse_7 ?>&mmse_7_text=<?php echo $mmse_7_text ?>&mmse_recall=<?php echo $mmse_recall ?>&mmse_recall_text=<?php echo $mmse_recall_text ?>&mmse_lan_name=<?php echo $mmse_lan_name ?>&mmse_lan_name_text=<?php echo $mmse_lan_name_text ?>&mmse_lan_repeat=<?php echo $mmse_lan_repeat ?>&mmse_lan_repeat_text=<?php echo $mmse_lan_repeat_text ?>&mmse_lan_read=<?php echo $mmse_lan_read ?>&mmse_lan_read_text=<?php echo $mmse_lan_read_text ?> &mmse_lan_write=<?php echo $mmse_lan_write ?> &mmse_lan_write_text=<?php echo $mmse_lan_write_text ?> &mmse_freetyping=<?php echo $mmse_freetyping ?> &mmse_total=<?php echo $mmse_total ?> &mmse_num=<?php echo $mmse_num_index ?>&mmse_record_time=<?php echo $mmse_record_time ?> ';
        </script>
        <?php
    }else{ ?> 
        <script>              
            history.go(-1);
        </script>
        <?php
    }
}
if(trim($record_mmse['reading']) == trim($mmse_reading) && trim($record_mmse['hand']) == trim($mmse_hand) && trim($record_act['content']) == trim($mmse_action) && trim($record_act['freetyping']) == trim($mmse_action_text) && trim($record_build['content']) == trim($mmse_build) && trim($record_build['freetyping']) == trim($mmse_build_text) && trim($record_time['content']) == trim($mmse_time) && trim($record_time['freetyping']) == trim($mmse_time_text) && trim($record_place['content']) == trim($mmse_place) && trim($record_place['freetyping']) == trim($mmse_place_text) && trim($record_reg['content']) == trim($mmse_reg) && trim($record_reg['freetyping']) == trim($mmse_reg_text) && trim($record_7['content']) == trim($mmse_7) && trim($record_7['freetyping']) == trim($mmse_7_text) && trim($record_recall['content']) == trim($mmse_recall) && trim($record_recall['freetyping']) == trim($mmse_recall_text) && trim($record_lan_name['content']) == trim($mmse_lan_name) && trim($record_lan_name['freetyping']) == trim($mmse_lan_name_text) && trim($record_lan_repeat['content']) == trim($mmse_lan_repeat) && trim($record_lan_repeat['freetyping']) == trim($mmse_lan_repeat_text) && trim($record_lan_read['content']) == trim($mmse_lan_read) && trim($record_lan_read['freetyping']) == trim($mmse_lan_read_text) && trim($record_lan_write['content']) == trim($mmse_lan_write) && trim($record_lan_write['freetyping']) == trim($mmse_lan_write_text) && trim($record_mmse['freetyping']) == trim($mmse_freetyping) && trim($record_mmse['record_time']) == trim($mmse_record_time)){ ?>
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