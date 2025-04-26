<html>
    <head>
    <title>搜尋病歷號/收案號</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>

<script>

swal({
  title: "請選擇輸入種類",
  icon: "warning",
  closeOnClickOutside: false,
  buttons:{
    收案號: {
        text: "收案號",
        value: "收案號"
      },
      病歷號: {
        text: "病歷號",
        value: "病歷號"
      },
}})

.then((value) => {
  switch (value) {
      case "病歷號":
        swal({
        title: "請輸入病歷號",
        content: 'input',
        icon: "warning",
        buttons: true,
        closeOnClickOutside: false,
        })
        .then((value,) => {
        if (value !== "" && value !== null){
                location.href='basic_look.php?>&page=<?php echo 'search' ?>&id='+value;
        }else{
                history.back()
        }
        })
        ;
      break;
 
    case "收案號":
        swal({
        title: "請輸入收案號", 
        content: 'input',
        icon: "warning",
        buttons: true,
        closeOnClickOutside: false,
        })
        .then((value,) => {
        if (value !== "" && value !== null){
                location.href='basic_look.php?>&page=<?php echo 'search' ?>&final_id='+value;
        }else{
                history.back()
        }
        })
        ;
      break;
   default:
        history.back();
}});
      
</script>




