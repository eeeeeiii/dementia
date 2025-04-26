<html>
    <head>
    <title>登出</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    session_start();
    unset($_SESSION['account']);
    unset($_SESSION['name']);
?>
<script>
    swal({
        title:'登出成功',
        icon:'success',
    }).then(function(){
        parent.location.href='index.php';
    })
</script>