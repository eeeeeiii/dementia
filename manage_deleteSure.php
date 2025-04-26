<html>
    <head>
    <title>確認刪除？</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
    $account_index = $_POST['account_index'];
?>
<script> 
    swal({
        title: '確認刪除?',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            location.href='manage_delete.php?account_index=<?php echo $account_index ?>';
        }
        else {
            swal({
                title: '已取消動作',
                icon: 'error',
            })
            .then(function(){
                history.go(-1);
            })
        }
        });  
        </script>
</html>