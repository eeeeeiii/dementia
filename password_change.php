<html>
    <head>
    <title>修改密碼</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start();
    $account=$_SESSION['account'];
    $link = mysqli_connect("localhost", "root", "", "subject");
    $sql_user="SELECT * FROM user where account = '$account'";
    $result_user = mysqli_query($link, $sql_user);
    $record_user = mysqli_fetch_assoc($result_user);
    
    $password= $_POST['password'];
    $newpassword= $_POST['newpassword'];
    $newpassword2= $_POST['newpassword2'];



    if ($password !== $record_user["password"]) {
        ?>
        <script>
            swal({
                title: '原密碼錯誤',
                icon: 'error',
            }).then(function() {
                history.go(-1);
            });
        </script>

    <?php
    }elseif(($newpassword !== $newpassword2)){
    ?>
        <script>
         swal({
            title:'確認密碼錯誤',
            icon: 'error',
        }).then(function(){
            history.go(-1);
            });
        </script>
        <?php
    }elseif(($newpassword) ===($record_user["password"])){
    ?>
       <script>
        swal({
            title:'原密碼與新密碼相同',
            icon: 'error',
        }).then(function(){
            history.go(-1);
            });
        </script>

    <?php
    }elseif($newpassword===$newpassword2&&$password === $record_user["password"]&&$record_user["name"]==null){
        $sql="UPDATE user SET password = '$newpassword', pass=1 where account='$account'";
        if(mysqli_query($link, $sql)){ ?>
            <script>
            swal({
                title: '修改成功',
                icon: 'success',
            }).then(function () {
                // Show the second SweetAlert dialog
                swal({
                    title: '請記得填寫個人基本資料',
                    text: '填寫完個人基本資料後才能使用系統其他功能',
                    icon: 'info',
                    buttons: {
                        confirm: {
                            text: '確認',
                            className: 'btn btn-info'
                        }
                    },
                }).then(function (isConfirmed) {
                    if (isConfirmed) {
                        document.location.href = "self.php";
                    }
                });
            });
        </script>
    <?php } else { ?>
        <script>
            swal({
                title: '修改失敗',
                icon: 'error',
            }).then(function () {
                history.go(-1);
            });
        </script>
    <?php
    }

    }elseif($newpassword==$newpassword2&&$password == $record_user["password"]&&isset($record_user["name"])){
        $sql="UPDATE user SET password = '$newpassword', pass=1 where account='$account'";
        if(mysqli_query($link, $sql)){ ?>
            <script>
            swal({
                title: '修改成功',
                icon: 'success',
            }).then(function () {
                // Show the second SweetAlert dialog
                swal({
                    title: '請重新登入系統',
                    icon: 'info',
                    buttons: {
                        confirm: {
                            text: '確認',
                            className: 'btn btn-info'
                        }
                    },
                }).then(function (isConfirmed) {
                    if (isConfirmed) {
                        document.location.href = "index.php";
                    }
                });
            });
        </script>
    <?php } else { ?>
        <script>
            swal({
                title: '修改失敗',
                icon: 'error',
            }).then(function () {
                history.go(-1);
            });
        </script>
    <?php
    }
}
        
