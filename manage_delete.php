<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    $account_index = $_GET['account_index'];

    $link = mysqli_connect("localhost", "root", "", "subject");
    $sql = "DELETE FROM user WHERE account = '$account_index'";
    if(mysqli_query($link, $sql)){ ?>
        <script>
            swal({
                title:'刪除成功',
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
            });
        </script>
        <?php
    }
?>