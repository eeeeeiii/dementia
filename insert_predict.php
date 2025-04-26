<?php
//date
date_default_timezone_set('Asia/Taipei');
$date = date("Y-m-d H:i:s");

$result = $_POST['result'];
$id=$_POST['id'];

// 建立 MySQL 連接
$link = mysqli_connect("localhost", "root", "", "subject");

// 插入預測結果若id已存在就改成修改
if(isset($id)&&isset($result)){
   
    $sql_check = "SELECT COUNT(*) as count FROM ml WHERE id = '$id'";
    $result_check = mysqli_query($link, $sql_check);
    $row_check = mysqli_fetch_assoc($result_check);

    if ($row_check['count'] > 0) {
        $sql_ml = "UPDATE ml SET result='$result', date='$date' WHERE id='$id'";
    } else {
        $sql_ml = "INSERT INTO ml (id, result, date) VALUES ('$id', '$result', '$date')";
    }

    mysqli_query($link, $sql_ml);
}






?>