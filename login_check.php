<html>
    <head>
    <title>登入</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php 
    session_start();
    $account = $_POST['account'];
    $password = $_POST['password'];
    $_SESSION['account'] = $account;

    $link=mysqli_connect("localhost","root","","subject");
    $sql="select * from user where account = '$account' and password = '$password'";
    $result=mysqli_query($link,$sql);
    $sql_user="SELECT * FROM user where account = '$account'";
    $result_user = mysqli_query($link, $sql_user);
    $record_user = mysqli_fetch_assoc($result_user);

    if($record = mysqli_fetch_assoc($result)){
        if($record['manager'] == 1){
            $_SESSION["name"] = $record['name'];
        ?>
        <script>
            swal({
                icon: 'success',
                title: '登入成功',
            }).then(function(){
                window.location.href = 'manage.php';
            })
        </script>
        <?php
        }else if ($record["pass"]==1 and $record_user["name"]!=null){
            $_SESSION['account'] = $record['account'];
            header("location:search.php");
        }else if ($record["pass"]==0 or $record_user["name"]==null) {
            $_SESSION['account'] = $record['account'];
            ?>
            <script>
                swal({
                    icon: 'success',
                    title: '登入成功',
                }).then(function(){
                    window.location.href = 'self.php';
                })
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                swal({
                    title:'帳號密碼錯誤',
                    icon:'error'
                }).then(function(){
                    history.go(-1);
                })
            </script>
        <?php
    }
?>