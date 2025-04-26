<?php
    session_start();
    $id=$_SESSION['id'];
    $link = mysqli_connect("localhost", "root", "", "subject");

    //基本資料
    $sql = "SELECT *  FROM patient_basic where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result); 
 
    //carer
    $sql_carer = "SELECT * FROM carer where id='$id'";
    $result_carer = mysqli_query($link, $sql_carer);
    $record_carer = mysqli_fetch_assoc($result_carer);

    //Blood
    $sql_blood = "SELECT * FROM blood where id='$id' order by date desc ";
    $result_blood = mysqli_query($link, $sql_blood);
    $record_blood = mysqli_fetch_assoc($result_blood);

    //CDR
    $sql_cdr_record_time = "SELECT record_time
        FROM cdr
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_record_time = mysqli_query($link, $sql_cdr_record_time);
    $record_cdr_record_time = mysqli_fetch_assoc($result_cdr_record_time);
    $output_cdr_record_time = array();
    foreach ($result_cdr_record_time as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_record_time, $row['record_time']);
    };

    $sql_cdr_mem = "SELECT content
        FROM cdr_memory
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_mem = mysqli_query($link, $sql_cdr_mem);
    $record_cdr_mem = mysqli_fetch_assoc($result_cdr_mem);
    $output_cdr_mem = array();
    foreach ($result_cdr_mem as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_mem, $row['content']);
    };
  
    $sql_cdr_ori = "SELECT content
        FROM cdr_orientation
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_ori = mysqli_query($link, $sql_cdr_ori);
    $record_cdr_ori = mysqli_fetch_assoc($result_cdr_ori);
    $output_cdr_ori = array();
    foreach ($result_cdr_ori as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_ori, $row['content']);
    };
  
    $sql_cdr_jug = "SELECT content
        FROM cdr_judgment_and_problem_solving
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_jug = mysqli_query($link, $sql_cdr_jug);
    $record_cdr_jug = mysqli_fetch_assoc($result_cdr_jug);
    $output_cdr_jug = array();
    foreach ($result_cdr_jug as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_jug, $row['content']);
    };
  
    $sql_cdr_com = "SELECT content
        FROM cdr_community_affairs
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_com = mysqli_query($link, $sql_cdr_com);
    $record_cdr_com = mysqli_fetch_assoc($result_cdr_com);
    $output_cdr_com = array();
    foreach ($result_cdr_com as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_com, $row['content']);
    };
  
    $sql_cdr_home = "SELECT content
        FROM cdr_home_and_hobbies
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_home = mysqli_query($link, $sql_cdr_home);
    $record_cdr_home = mysqli_fetch_assoc($result_cdr_home); 
    $output_cdr_home = array();
    foreach ($result_cdr_home as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_home, $row['content']);
    };
  
    $sql_cdr_per = "SELECT content
        FROM cdr_personal_care
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_per = mysqli_query($link, $sql_cdr_per);
    $record_cdr_per = mysqli_fetch_assoc($result_cdr_per);
    $output_cdr_per = array();
    foreach ($result_cdr_per as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_per, $row['content']);
    };

    $sql_cdr_sum = "SELECT sum_of_box
        FROM cdr
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_sum = mysqli_query($link, $sql_cdr_sum);
    $record_cdr_sum = mysqli_fetch_assoc($result_cdr_sum);
    $output_cdr_sum = array();
    foreach ($result_cdr_sum as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_sum, $row['sum_of_box']);
    };

    $sql_cdr_cdr = "SELECT cdr
        FROM cdr
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_cdr = mysqli_query($link, $sql_cdr_cdr);
    $record_cdr_cdr = mysqli_fetch_assoc($result_cdr_cdr);
    $output_cdr_cdr = array();
    foreach ($result_cdr_cdr as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_cdr, $row['cdr']);
    };

    $sql_cdr_freetyping = "SELECT freetyping
        FROM cdr
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_cdr_freetyping = mysqli_query($link, $sql_cdr_freetyping);
    $record_cdr_freetyping = mysqli_fetch_assoc($result_cdr_freetyping);
    $output_cdr_freetyping = array();
    foreach ($result_cdr_freetyping as $row) {
        // 将要输出的列添加到数组中
        array_push($output_cdr_freetyping, $row['freetyping']);
    };

    //MMSE
    $sql_mmse_record_time = "SELECT record_time	
        FROM mmse
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_record_time = mysqli_query($link, $sql_mmse_record_time);
    $record_mmse_record_time = mysqli_fetch_assoc($result_mmse_record_time);
    $output_mmse_record_time = array();
    foreach ($result_mmse_record_time as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_record_time, $row['record_time']);
    };

    $sql_mmse_reading = "SELECT reading	
        FROM mmse
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_reading = mysqli_query($link, $sql_mmse_reading);
    $record_mmse_reading = mysqli_fetch_assoc($result_mmse_reading);
    $output_mmse_reading = array();
    foreach ($result_mmse_reading as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_reading, $row['reading']);
    };

    $sql_mmse_hand = "SELECT hand	
        FROM mmse
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_hand = mysqli_query($link, $sql_mmse_hand);
    $record_mmse_hand = mysqli_fetch_assoc($result_mmse_hand);
    $output_mmse_hand = array();
    foreach ($result_mmse_hand as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_hand, $row['hand']);
    };

    $sql_mmse_time = "SELECT content	
        FROM mmse_time
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_time = mysqli_query($link, $sql_mmse_time);
    $record_mmse_time = mysqli_fetch_assoc($result_mmse_time);
    $output_mmse_time = array();
    foreach ($result_mmse_time as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_time, $row['content']);
    };

    $sql_mmse_place = "SELECT content	
        FROM mmse_place
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_place = mysqli_query($link, $sql_mmse_place);
    $record_mmse_place = mysqli_fetch_assoc($result_mmse_place);
    $output_mmse_place = array();
    foreach ($result_mmse_place as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_place, $row['content']);
    };

    $sql_mmse_reg = "SELECT content	
        FROM mmse_registration
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_reg = mysqli_query($link, $sql_mmse_reg);
    $record_mmse_reg = mysqli_fetch_assoc($result_mmse_reg);
    $output_mmse_reg = array();
    foreach ($result_mmse_reg as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_reg, $row['content']);
    };

    $sql_mmse_7 = "SELECT content	
        FROM mmse_attention_and_calculation
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_7 = mysqli_query($link, $sql_mmse_7);
    $record_mmse_7 = mysqli_fetch_assoc($result_mmse_7);
    $output_mmse_7 = array();
    foreach ($result_mmse_7 as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_7, $row['content']);
    };

    $sql_mmse_recall = "SELECT content	
        FROM mmse_recall
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_recall = mysqli_query($link, $sql_mmse_recall);
    $record_mmse_recall = mysqli_fetch_assoc($result_mmse_recall);
    $output_mmse_recall = array();
    foreach ($result_mmse_recall as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_recall, $row['content']);
    };

    $sql_mmse_lan_name = "SELECT content	
        FROM mmse_lan_name
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_lan_name = mysqli_query($link, $sql_mmse_lan_name);
    $record_mmse_lan_name = mysqli_fetch_assoc($result_mmse_lan_name);
    $output_mmse_lan_name = array();
    foreach ($result_mmse_lan_name as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_lan_name, $row['content']);
    };

    $sql_mmse_lan_repeat = "SELECT content	
        FROM mmse_lan_repeat
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_lan_repeat = mysqli_query($link, $sql_mmse_lan_repeat);
    $record_mmse_lan_repeat = mysqli_fetch_assoc($result_mmse_lan_repeat);
    $output_mmse_lan_repeat = array();
    foreach ($result_mmse_lan_repeat as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_lan_repeat, $row['content']);
    };

    $sql_mmse_lan_read = "SELECT content	
        FROM mmse_lan_read
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_lan_read = mysqli_query($link, $sql_mmse_lan_read);
    $record_mmse_lan_read = mysqli_fetch_assoc($result_mmse_lan_read);
    $output_mmse_lan_read = array();
    foreach ($result_mmse_lan_read as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_lan_read, $row['content']);
    };

    $sql_mmse_lan_write = "SELECT content	
        FROM mmse_lan_write
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_lan_write = mysqli_query($link, $sql_mmse_lan_write);
    $record_mmse_lan_write = mysqli_fetch_assoc($result_mmse_lan_write);
    $output_mmse_lan_write = array();
    foreach ($result_mmse_lan_write as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_lan_write, $row['content']);
    };

    $sql_mmse_act = "SELECT content	
        FROM mmse_action
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_act = mysqli_query($link, $sql_mmse_act);
    $record_mmse_act = mysqli_fetch_assoc($result_mmse_act);
    $output_mmse_act = array();
    foreach ($result_mmse_act as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_act, $row['content']);
    };

    $sql_mmse_build = "SELECT content	
        FROM mmse_build
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_build = mysqli_query($link, $sql_mmse_build);
    $record_mmse_build = mysqli_fetch_assoc($result_mmse_build);
    $output_mmse_build = array();
    foreach ($result_mmse_build as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_build, $row['content']);
    };

    $sql_mmse_total = "SELECT total	
        FROM mmse
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_total = mysqli_query($link, $sql_mmse_total);
    $record_mmse_total = mysqli_fetch_assoc($result_mmse_total);
    $output_mmse_total = array();
    foreach ($result_mmse_total as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_total, $row['total']);
    };

    $sql_mmse_freetyping = "SELECT freetyping
        FROM mmse
        where id='$id'
        ORDER BY date DESC
        LIMIT 3";
    $result_mmse_freetyping = mysqli_query($link, $sql_mmse_freetyping);
    $record_mmse_freetyping = mysqli_fetch_assoc($result_mmse_freetyping);
    $output_mmse_freetyping = array();
    foreach ($result_mmse_freetyping as $row) {
        // 将要输出的列添加到数组中
        array_push($output_mmse_freetyping, $row['freetyping']);
    };

    $sql_user = "SELECT * FROM user where account=$_SESSION[account]";
    $result_user = mysqli_query($link, $sql_user);
    $record_user = mysqli_fetch_assoc($result_user); 
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>資料總覽</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
         <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href=" " class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style='font-size:23px'>失智症輔助系統</span>           
             </a>
             <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

           <ul class="menu-inner py-1">
              <li class="menu-item">
                <div class="menu-link">
                  <i class="menu-icon  fas fa-search"></i>
                  <div>
                    <a href="search.php" style="text-align:left;color:#697a8d;">查詢 病歷號/收案號</a>
                  </div>
                </div>
              </li>
            <!-- 病人名及病歷號 -->
            <?php if(isset($record['id'])){ ?>
            <li class="menu-item">
              <div class="menu-link">
                <i class="menu-icon tf-icons fas fa-tag"></i>
                <div ><?php echo $record['id'] ?></div>
              </div>
            </li>
            <li class="menu-item">
              <div class="menu-link">
                <i class="menu-icon tf-icons fas fa-user-alt"></i>
                <div ><?php echo $record['name'] ?></div>
              </div>
            </li>
            <?php } ?>

            <!--線-->
            <hr style="background-color : lightgray; width: 75%;  margin-left: auto; margin-right: auto;">

            <!-- 基本資料 -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fas fa-address-card"></i>
                <div >基本資料</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item ">
                  <a href="basic_look.php" class="menu-link">
                    <div >查看</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="basic_revise.php" class="menu-link">
                    <div>修改紀錄</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- 照顧者資料 -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fas fa-clinic-medical"></i>
                <div >照顧者資料</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="carer_look.php" class="menu-link">
                    <div >查看</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="carer_revise.php" class="menu-link">
                    <div >修改紀錄</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- CDR -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fa fa-edit"></i>
                <div >CDR</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="CDR_look.php" class="menu-link">
                    <div >查看</div>
                  </a>
                </li>
                <?php if ($record_user['doctor'] == 1 || $record_user['psychologist'] == 1){ ?>
                <li class="menu-item ">
                    <a href="CDR_insert.php" class="menu-link">
                      <div >新增</div>
                    </a>
                </li>
                <?php }?>
                <li class="menu-item">
                  <a href="CDR_history.php" class="menu-link">
                    <div >歷史紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="CDR_revise.php" class="menu-link">
                    <div >修改紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="CDR_graph.php" class="menu-link">
                    <div >可視化圖表</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- MMSE -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fa fa-edit"></i>
                <div >MMSE</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="MMSE_look.php" class="menu-link">
                    <div >查看</div>
                  </a>
                </li>
                <?php if ($record_user['doctor'] == 1 || $record_user['psychologist'] == 1){ ?>
                <li class="menu-item ">
                    <a href="MMSE_insert.php" class="menu-link">
                      <div >新增</div>
                    </a>
                </li>
                <?php }?>
                <li class="menu-item">
                  <a href="MMSE_history.php" class="menu-link">
                    <div >歷史紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="MMSE_revise.php" class="menu-link">
                    <div >修改紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="MMSE_graph.php" class="menu-link">
                    <div >可視化圖表</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- 血液資料 -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fas fa-tint"></i>
                <div >血液資料</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="blood_look.php" class="menu-link">
                    <div >查看</div>
                  </a>
                </li>
                <?php if($record_user['doctor'] == 1 || $record_user['nurse'] == 1){ ?>
                <li class="menu-item  ">
                  <a href="blood_insert.php" class="menu-link">
                    <div >新增</div>
                  </a>
                </li>
                <?php } ?>
                <li class="menu-item">
                  <a href="blood_history.php" class="menu-link">
                    <div >歷史紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="blood_revise.php" class="menu-link">
                    <div >修改紀錄</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="blood_graph.php" class="menu-link">
                    <div >可視化圖表</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- 機器學習 -->
            <?php if ($record_user['doctor'] == 1){?>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fas fa-robot"></i>
                <div >決策輔助</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item ">
                  <a href="ML.php" class="menu-link">
                    <div >病程預測</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="model_eval.php" class="menu-link">
                    <div >模型再評估</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="model_verify.php" class="menu-link">
                    <div >外部資料驗證</div>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>    

            <!-- TOTAL -->
            <li class="menu-item active">
              <a href="total_info.php" class="menu-link">
                <i class="menu-icon tf-icons fas fa-clipboard-list"></i>
                <div >資料總覽</div>
              </a>
            </li> 
            
            <!-- 落點分析 -->
            <li class="menu-item">
              <a href="statistics.php" class="menu-link">
                <i class='menu-icon tf-icons fas fa-chart-line'></i>
                <div >落點分析</div>
              </a>
            </li>   

             <!-- 匯出報表 -->
             <?php if ($record_user['doctor'] == 1 || $record_user['personal_manager'] == 1){ ?>
             <li class="menu-item">
              <a href="export.php" class="menu-link">
                <i class="menu-icon tf-icons fas fa-file-excel"></i>
                <div >匯出報表</div>
              </a>
            </li>  
            <?php } ?>
      
          </ul>
        </aside>

        <div class="layout-page">
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center"> 
                </div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <?php echo $record_user['name']; ?>&nbsp;&nbsp;&nbsp;
                <li class="nav-item navbar-dropdown dropdown-user dropdown">                
                  <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/person.png" class="w-px-32 h-auto rounded-circle" />
                  </div> 
                </li>
                &nbsp;&nbsp;&nbsp;
                <li class="nav-item navbar-dropdown dropdown-user dropdown">                
                  <a href="self.php" style='color:gray'>個人檔案</a>&nbsp;&nbsp;
                  /
                  &nbsp;&nbsp;<a href="logout.php" style='color:gray'>登出</a>
                </li>
              </ul>
            </div>
          </nav>

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card"> 
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-11"></div>
                      <i class='fas fa-cloud-download-alt col-md-1' style='font-size:24px' onclick=window.print()></i>
                    </div>
                      <div class="row">
                        <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">基本資料</span></h3>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:150px;'>病歷號</label>
                          <div class='col-md-4'  >
                            <span class="form-control" style='height:38px'><?php echo $record['id'] ?><span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>收案號</label>
                          <div class='col-md-4' >
                            <span class="form-control" style='height:38px'><?php echo $record['final_id'] ?><span>
                          </div>
                        </div>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:150px;'>姓名</label>
                          <div class='col-md-4'>
                            <span class="form-control" style='height:38px'><?php echo $record['name'] ?><span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>出生日期</label>
                          <div class='col-md-4'>
                            <?php if($record['birth'] == '0000-00-00'){ ?>
                              <span class="form-control" style='height:38px'><span>
                            <?php }else{ ?>
                              <span class="form-control" style='height:38px'><?php echo $record['birth'] ?><span>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:150px;'>性別</label>
                          <div class='col-md-4'>
                            <span class="form-control" style='height:38px'><?php echo $record['hsex'] ?><span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>身分證字號</label>
                          <div class='col-md-4'>
                            <span class="form-control" style='height:38px'><?php echo $record['person_id'] ?><span>
                          </div>
                        </div>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:150px;'>教育程度</label>
                          <div class='col-md-4'>
                          <span class="form-control" style='height:38px'>
                                <?php 
                                  if($record['education'] == '0'){echo '不識字';} 
                                  else if($record['education'] == '0*'){echo '識字，未受正規教育';}
                                  else if($record['education'] == '6'){echo '國小';} 
                                  else if($record['education'] == '9'){echo '國中';} 
                                  else if($record['education'] == '12'){echo '高中(職)';} 
                                  else if($record['education'] == '6*'){echo '特教班-國小';} 
                                  else if($record['education'] == '9*'){echo '特教班-國中';} 
                                  else if($record['education'] == '12*'){echo '特教班-高中職';} 
                                  else if($record['education'] == '14'){echo '五專';} 
                                  else if($record['education'] == '16'){echo '大學(二三專)';} 
                                  else if($record['education'] == '18'){echo '研究所以上';} 
                                  else if($record['education'] == '其他'){echo '其他';}
                                ?>
                              <span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>居住狀況</label>
                          <div class='col-md-4'>
                            <span class="form-control" style='height:38px'><?php echo $record['living'] ?><span>
                          </div>
                        </div>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:150px;'>社會福利身分別</label>
                          <div class='col-md-4'>
                             <span class="form-control" style='height:38px'><?php echo $record['social_walfare'] ?><span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>婚姻狀況</label>
                          <div class='col-md-4'>
                             <span class="form-control" style='height:38px'><?php echo $record['marriage'] ?><span>
                          </div>
                        </div>
                        <div class="row mb-4" style='justify-content: space-evenly'>
                          <label class="form-label" style='font-size:16px;text-align:center;width:150px;'>有無失智或<br>精神類病史</label>
                          <div class='col-md-4' >
                             <span class="form-control" style='height:38px'><?php echo $record['medi_history_YN'] ?><span>
                          </div>
                          <label class="col-form-label" style='font-size:16px;text-align:center;width:120px;'>病史</label>
                          <div class='col-md-4'>
                            <span class="form-control" style='height:38px'><?php echo $record['medi_history'] ?><span>
                          </div>
                        </div>
                      <hr>
                    
                      <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">照顧者資料</span></h3>
                      <div class="mb-4 row " style='justify-content: space-evenly'>
                        <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>姓名</label>
                            <div class='col-md-4 ' >
                                <span class="form-control" style='height:38px'><?php echo $record_carer['name'] ?></span>
                            </div>
                        <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>性別</label>
                            <div class='col-md-4'>
                                <span class="form-control" style='height:38px'><?php echo $record_carer['gender'] ?></span>
                            </div>
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>電話</label>
                            <div class='col-md-4 '>
                                <span class="form-control" style='height:38px'><?php echo $record_carer['phone'] ?></span>
                            </div>
                        <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>職業</label>
                            <div class='col-md-4 '>
                                <span class="form-control" style='height:38px'><?php echo $record_carer['job'] ?></span>
                            </div>
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;width:125px;'>與個案關係</label>
                            <div class='col-md-4 '>
                                <span class="form-control" style='height:38px'><?php echo $record_carer['relation'] ?></span>
                            </div>
                        <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'>教育程度</label>
                            <div class='col-md-4 '>
                                <span class="form-control" style='height:38px'>
                                    <?php 
                                        if($record_carer['education'] == '0'){echo '不識字';} 
                                        else if($record_carer['education'] == '0*'){echo '識字，未受正規教育';}
                                        else if($record_carer['education'] == '6'){echo '國小';} 
                                        else if($record_carer['education'] == '9'){echo '國中';} 
                                        else if($record_carer['education'] == '12'){echo '高中(職)';} 
                                        else if($record_carer['education'] == '6*'){echo '特教班-國小';} 
                                        else if($record_carer['education'] == '9*'){echo '特教班-國中';} 
                                        else if($record_carer['education'] == '12*'){echo '特教班-高中職';} 
                                        else if($record_carer['education'] == '14'){echo '五專';} 
                                        else if($record_carer['education'] == '16'){echo '大學(二三專)';} 
                                        else if($record_carer['education'] == '18'){echo '研究所以上';} 
                                        else if($record_carer['education'] == '其他'){echo '其他';}
                                    ?>
                                </span>
                            </div> 
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;width:125px;'>有無聘用看護</label>
                          <div class='col-md-4 '>
                            <span class="form-control" style='height:38px'><?php echo $record_carer['caretaker'] ?></span>
                          </div>
                          <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'> </label>
                          <div class='col-md-4 '>
                            
                          </div>
                      </div>
                    </div>
                    <hr>

                    <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">CDR失智評分量表</span></h3>
                        <div class="row  align-items-top">
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>受測日期</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <?php if($output_cdr_record_time[0] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_cdr_record_time[0]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <?php if($output_cdr_record_time[1] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_cdr_record_time[1]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <?php if($output_cdr_record_time[2] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_cdr_record_time[2]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>記憶力</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_cdr_mem[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_cdr_mem[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_cdr_mem[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <div class=" col-md-2 " style="text-align:center;margin-top:8px">
                            <label  class="form-label" style='font-size:16px;'>定向感</label>
                          </div>
                          <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_ori[0]) ?>分</span>
                            <label class="form-label">&nbsp;</label> 
                          </div>
                          <div class=" col-md-3" style="text-align:center;" >
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_ori[1]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div>
                          <div class=" col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_ori[2]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label class="form-label" style='font-size:16px;' >解決問題能力</label>
                          </div>
                          <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_jug[0]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div> 
                          <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_jug[1]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div> 
                          <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_jug[2]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div> 
                          <div class="col-md-1"></div>
                          <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label for="state" class="form-label" style='font-size:16px;'>社區活動能力</label>
                          </div>
                          <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_com[0]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_com[1]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_com[2]) ?>分</span>
                            <label class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-1"></div>
                        <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label class="form-label" for="country" style='font-size:16px;'>居家嗜好</label>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_home[0]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_home[1]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3" style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_home[2]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>自我照料</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_per[0]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_per[1]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_per[2]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>總分</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_sum[0]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_sum[1]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_sum[2]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>CDR判分</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_cdr[0]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_cdr[1]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <span class="form-control" style='height:38px;'><?php print_r($output_cdr_cdr[2]) ?>分</span>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 " style="text-align:center;margin-top:8px">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>總結</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_cdr_freetyping[0]) ?></textarea>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class=" col-md-3 " style="text-align:center;">
                            <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_cdr_freetyping[1]) ?></textarea>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-3 " style="text-align:center;">
                            <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_cdr_freetyping[2]) ?></textarea>
                            <label  class="form-label">&nbsp;</label>
                        </div>
                        <div class="col-md-1"></div>
                        </div>
                      <hr>
                    
                    <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">MMSE簡易智能檢查</h3>
                        <div class="row align-items-top">
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>受測日期</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <?php if($output_mmse_record_time[0] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_mmse_record_time[0]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <?php if($output_mmse_record_time[1] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_mmse_record_time[1]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <?php if($output_mmse_record_time[2] == "0000-00-00"){ ?>
                                  <span class="form-control" style='height:38px'></span>
                                <?php }else{ ?>
                                  <span class="form-control" style='height:38px'><?php print_r($output_mmse_record_time[2]) ?></span>
                                <?php } ?>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>

                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>識字程度</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reading[0]) ?></span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reading[1]) ?></span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reading[2]) ?></span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>

                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>慣用手</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_hand[0]) ?></span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_hand[1]) ?></span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_hand[2]) ?></span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <h5 class="fw-bold pt-4 mb-3 col-mb-12">定向感</h5>
                          <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>時間</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_time[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_time[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_time[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>地方</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_place[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_place[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_place[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <h5  class="fw-bold pt-4 mb-3 col-mb-12">注意力</h5>
                          <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>信息登錄</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reg[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reg[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_reg[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class="mb-4 col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>系列減七</label>
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_7[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_7[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_7[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">回憶</h5>
                          <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_recall[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_recall[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_recall[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <h5  class="fw-bold pt-4 mb-3 col-mb-12">語言</h5>
                          <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>命名</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_name[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_name[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_name[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>複誦</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_repeat[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_repeat[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_repeat[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>閱讀理解</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_read[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_read[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_lan_read[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>書寫造句</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r(trim($output_mmse_lan_write[0])) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r(trim($output_mmse_lan_write[1])) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r(trim($output_mmse_lan_write[2])) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class="mb-4 col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>口語理解及行用能力</label>
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_act[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_act[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_act[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">建構力</h5>
                          <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_build[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class="mb-4 col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_build[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="mb- col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_build[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>總分</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_total[0]) ?>分</span>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_total[1]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <span class="form-control" style='height:38px'><?php print_r($output_mmse_total[2]) ?>分</span>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                            <div class=" col-md-2 " style="text-align:center;margin-top:8px" >
                                <label class="form-label "  style='font-size:16px;'>總結</label>
                            </div>
                            <div class="col-md-3" style="text-align:center;">
                                <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_mmse_freetyping[0]) ?></textarea>
                                <label class="form-label">&nbsp;</label> 
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_mmse_freetyping[1]) ?></textarea>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class=" col-md-3" style="text-align:center;">
                                <textarea class="form-control" style='height:38px;background-color:#FFFFFF;' readonly><?php print_r($output_mmse_freetyping[2]) ?></textarea>
                                <label class="form-label">&nbsp;</label>    
                            </div>
                            <div class="col-md-1"></div>
                        </div>  
                       <hr>
                       
                       <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">血液資料</span></h3>
                       <div class="mb-4 row" style='justify-content: space-evenly'>
                              <div class="mb-3 col-md-8">
                                  <div  class="form-control" style=" text-align: center; background-color: #D9E6ED ; width:15% ;margin-left:5%;border-radius: 4px;  display: inline-block;">
                                  <span style="font-weight:bold;">異常(過低)</span></div>
                                  <div  class="form-control" style=" text-align: center; background-color: #FFD5C9 ; width:15% ;margin-left:5%;border-radius: 4px; display: inline-block;">
                                  <span style="font-weight:bold;">異常(過高)</span></div>
                                  <div  class="form-control" style=" text-align: center;  width:25% ;margin-left:5%;border-radius: 4px;border-color:gray;border-width:2.5px;border-style:dotted ;display: inline-block;">
                                  <span style="font-weight:bold;">未輸入性別，無法判定</span></div>
                              </div>
                              <div class="mb-3 col-md-1"></div>
                              <div class="mb-3 col-md-1" style="text-align:center;">
                                <label for="email" class='col-form-label' style='font-size:16px;'>受測日期</label>
                              </div>
                              <div class="mb-3 col-md-2">
                                <?php if($record_blood['record_time'] == '0000-00-00'){ ?>
                                  <span style="max-height:auto;min-height:38px" type="date" class="form-control" name="blood_record_time">
                                <?php }else{ ?>
                                  <span style="max-height:auto;min-height:38px" type="date" class="form-control" name="blood_record_time" value="<?php echo $record_blood['record_time']; ?>"><?php echo $record_blood['record_time']; ?>
                                <?php } ?>
                              </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>WBC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['WBC']) !=0 ){?>
                                    <?php if(($record_blood['WBC'])<4.0) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='WBC' ><?php echo $record_blood['WBC'] ?></span>
                                    <?php } elseif(($record_blood['WBC'])>11.0) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='WBC' ><?php echo $record_blood['WBC'] ?></span>
                                    <?php } else {?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='WBC'><?php echo $record_blood['WBC'] ?></span>
                                    <?php } ?>
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='WBC' >
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>A<font style="text-transform: lowercase;">LBUMIN</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['ALBUMIN'])!=0){?>
                                    <?php if(($record_blood['ALBUMIN'])<3.5) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='ALBUMIN' ><?php echo $record_blood['ALBUMIN'] ?></span>
                                    <?php } elseif(($record_blood['ALBUMIN'])>5.7) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='ALBUMIN' ><?php echo $record_blood['ALBUMIN'] ?></span>
                                    <?php } else{ ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='ALBUMIN'><?php echo $record_blood['ALBUMIN'] ?></span>
                                    <?php } ?> 
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='ALBUMIN'>
                                  <?php } ?>
                                </div>
                              </div>     

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>S<font style="text-transform: lowercase;">EG</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['SEG'])!=0){ ?>
                                    <?php if(($record_blood['SEG'])>75.0){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='SEG'><?php echo $record_blood['SEG'] ?></span>
                                    <?php } else{ ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='SEG' ><?php echo $record_blood['SEG'] ?></span>
                                    <?php } ?>
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='SEG'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>F<font style="text-transform: lowercase;">olic_acid</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Folic_acid']) !=0 ){ ?>
                                    <?php if(($record_blood['Folic_acid'])<4.0) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Folic_acid'><?php echo $record_blood['Folic_acid'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Folic_acid' ><?php echo $record_blood['Folic_acid'] ?></span>
                                    <?php } ?>
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Folic_acid' >
                                  <?php }?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>RBC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['RBC'])!=0){?>
                                    <?php if($record['hsex']==NULL){ ?>
                                      <span style="max-height:auto;min-height:38px;border-color:gray;border-width:2.5px;border-style:dotted;" class="form-control" type="text" name="RBC"><?php echo $record_blood['RBC'] ?></span>
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='女'){ ?>
                                      <?php if(($record_blood['RBC'])<3.70) {?>
                                        <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='RBC' ><?php echo $record_blood['RBC'] ?></span>
                                      <?php } elseif (($record_blood['RBC'])>5.50){ ?>
                                        <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='RBC' ><?php echo $record_blood['RBC'] ?></span>
                                      <?php } else {?>
                                        <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='RBC' ><?php echo $record_blood['RBC'] ?></span>
                                      <?php } ?> 
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='男'){ ?>
                                      <?php if(($record_blood['RBC'])<4.2) {?>
                                        <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='RBC' ><?php echo $record_blood['RBC'] ?></span>
                                      <?php } elseif (($record_blood['RBC'])>6.2){ ?>
                                        <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='RBC' ><?php echo $record_blood['RBC'] ?></span>
                                      <?php } else {?>
                                        <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='RBC'><?php echo $record_blood['RBC'] ?></span>
                                      <?php } ?> 
                                    <?php } ?>
                                  <?php  } else { ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='RBC'>
                                  <?php } ?>
                                  </div>
                                  <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>V<font style="text-transform: lowercase;">it</font>.B12</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Vit_B12'])!=0){?>
                                    <?php if(($record_blood['Vit_B12'])<180) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Vit_B12'><?php echo $record_blood['Vit_B12'] ?></span>
                                    <?php } elseif(($record_blood['Vit_B12'])>914) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Vit_B12'><?php echo $record_blood['Vit_B12'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Vit_B12'><?php echo $record_blood['Vit_B12'] ?></span>
                                    <?php } ?>
                                  <?php } else{?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Vit_B12'/>
                                  <?php } ?>
                                  </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>H<font style="text-transform: lowercase;">GB</font></label>
                                <div class='col-md-4 '>
                                <?php if(($record_blood['HGB'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <span style="max-height:auto;min-height:38px;border-color:gray;border-width:2.5px;border-style:dotted" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['HGB'])<11.3){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } elseif($record_blood['HGB']>15.3){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['HGB'])<12.3){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name="HGB"  ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } elseif($record_blood['HGB']>18.3){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="HGB" ><?php echo $record_blood['HGB'] ?></span>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="HGB" >
                                <?php } ?>
                                </div>
                                <div class='col-md-6'>
                                  <hr>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>P<font style="text-transform: lowercase;">latelet</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Platelet'])!=0){?>
                                    <?php if(($record_blood['Platelet'])<150) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Platelet' ><?php echo $record_blood['Platelet'] ?></span>
                                    <?php } elseif(($record_blood['Platelet'])>400) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Platelet'  ><?php echo $record_blood['Platelet'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Platelet'><?php echo $record_blood['Platelet'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Platelet'  >
                                  <?php } ?>
                                </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >G<font style="text-transform: lowercase;">lucose</font>_AC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Glucose_AC']) != 0) {?>
                                    <?php if(($record_blood['Glucose_AC'])<70){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Glucose_AC' ><?php echo $record_blood['Glucose_AC'] ?></span>
                                    <?php } elseif(($record_blood['Glucose_AC'])>100) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;"  class="form-control" type="text" name='Glucose_AC'><?php echo $record_blood['Glucose_AC'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='Glucose_AC'><?php echo $record_blood['Glucose_AC'] ?></span>
                                    <?php } ?>
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='Glucose_AC' >
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                                <div class='col-md-6'>
                                  <hr>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>H<font style="text-transform: lowercase;">b</font>A1<font style="text-transform: lowercase;">c</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['HbA1c'])!=0){?>
                                    <?php if(($record_blood['HbA1c'])>6.0) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='HbA1c'><?php echo $record_blood['HbA1c'] ?></span>
                                    <?php } else {?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='HbA1c' ><?php echo $record_blood['HbA1c'] ?></span>
                                    <?php } ?>
                                      <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='HbA1c' />
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>BUN</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['BUN'])!=0) {?>
                                    <?php if(($record_blood['BUN'])<7){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='BUN'><?php echo $record_blood['BUN'] ?></span>
                                    <?php } elseif(($record_blood['BUN'])>25) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='BUN'><?php echo $record_blood['BUN'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='BUN'><?php echo $record_blood['BUN'] ?></span>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='BUN'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">HOLESTEROL</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['CHOLESTEROL'])!=0) {?>
                                    <?php if(($record_blood['CHOLESTEROL'])>200) { ?>
                                    <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='CHOLESTEROL'><?php echo $record_blood['CHOLESTEROL'] ?></span>
                                    <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='CHOLESTEROL'><?php echo $record_blood['CHOLESTEROL'] ?></span>
                                    <?php } ?> 
                                  <?php } else{?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='CHOLESTEROL'>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>C<font style="text-transform: lowercase;">reatinine</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Creatinine'])!=0) {?>
                                    <?php if(($record_blood['Creatinine'])<0.6) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Creatinine' ><?php echo $record_blood['Creatinine'] ?></span>
                                    <?php } elseif(($record_blood['Creatinine'])>1.3) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Creatinine' ><?php echo $record_blood['Creatinine'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Creatinine'><?php echo $record_blood['Creatinine'] ?>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Creatinine'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T<font style="text-transform: lowercase;">RIGLYCERIDE</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['TRIGLYCERIDE'])!=0){ ?>
                                    <?php if(($record_blood['TRIGLYCERIDE'])>150){?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;"  class="form-control" type="text" name='TRIGLYCERIDE' ><?php echo $record_blood['TRIGLYCERIDE'] ?></span>
                                    <?php } else {?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='TRIGLYCERIDE' ><?php echo $record_blood['TRIGLYCERIDE'] ?></span>
                                    <?php } ?>
                                 
                                      <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='TRIGLYCERIDE'>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'><font style="text-transform: lowercase;">e</font>GFR</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['eGFR'])!=0) {?>
                                    <?php if(($record_blood['eGFR'])<60) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='eGFR' ><?php echo $record_blood['eGFR'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='eGFR' ><?php echo $record_blood['eGFR'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='eGFR' />
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>LDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['LDL'])!=0){ ?>
                                    <?php if(($record_blood['LDL'])>130) {?>
                                    <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='LDL'><?php echo $record_blood['LDL'] ?></span>
                                    <?php } else {?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='LDL'><?php echo $record_blood['LDL'] ?></span>
                                    <?php } ?>  
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='LDL'>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>N<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Na'])!=0) {?>
                                    <?php if(($record_blood['Na'])<136){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Na'><?php echo $record_blood['Na'] ?></span>
                                    <?php } elseif(($record_blood['Na'])>145){?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Na'><?php echo $record_blood['Na'] ?></span>
                                    <?php }else{ ?>
                                      <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='Na'><?php echo $record_blood['Na'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='Na' >
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>HDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['HDL'])!=0) {?>
                                    <?php if(($record_blood['HDL'])<23) { ?>
                                    <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='HDL'><?php echo $record_blood['HDL'] ?></span>
                                    <?php } elseif(($record_blood['HDL'])>92) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='HDL'><?php echo $record_blood['HDL'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='HDL'><?php echo $record_blood['HDL'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='HDL'>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>K</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['K']) !=0 ){?>
                                    <?php if(($record_blood['K'])<3.4){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='K'><?php echo $record_blood['K'] ?></span>
                                    <?php } elseif(($record_blood['K'])>4.5){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='K'><?php echo $record_blood['K'] ?></span>
                                    <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='K'><?php echo $record_blood['K'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='K' />
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>U<font style="text-transform: lowercase;">RIC</font></label>
                              <div class='col-md-4'>
                                <?php if(($record_blood['URIC'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <span style="max-height:auto;min-height:38px;border-color:gray;border-width:2.5px;border-style:dotted" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['URIC'])<2.3){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } elseif($record_blood['URIC']>6.6){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['URIC'])<4.4){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } elseif($record_blood['URIC']>7.6){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name="URIC"><?php echo $record_blood['URIC'] ?></span>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="URIC" >
                                <?php } ?>
                              </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Ca'])!=0) {?>
                                    <?php if(($record_blood['Ca'])<8.6) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Ca' ><?php echo $record_blood['Ca'] ?></span>
                                    <?php } elseif(($record_blood['Ca'])>10.3) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Ca' ><?php echo $record_blood['Ca'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Ca'><?php echo $record_blood['Ca'] ?></span>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Ca'>
                                  <?php } ?>
                                </div>
                                <div class='col-md-6'>
                                  <hr>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <div class='col-md-6'>
                                <hr>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>TSH </label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['TSH'])!=0){ ?>
                                    <?php if(($record_blood['TSH'])<0.34) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='TSH' ><?php echo $record_blood['TSH'] ?></span>
                                    <?php } elseif (($record_blood['TSH'])>5.6) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='TSH' ><?php echo $record_blood['TSH'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='TSH'  ><?php echo $record_blood['TSH'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='TSH' >
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>GOT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GOT']) != 0) {?>
                                    <?php if(($record_blood['GOT'])>40 or ($record_blood['GOT'])==40){ ?>
                                    <span  style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='GOT'><?php echo $record_blood['GOT'] ?></span>
                                    <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='GOT'><?php echo $record_blood['GOT'] ?></span>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='GOT'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>T3</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T3'])!=0){?>
                                    <?php if(($record_blood['T3'])<0.70) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='T3' ><?php echo $record_blood['T3'] ?></span>
                                    <?php } elseif(($record_blood['T3'])>1.78) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='T3' ><?php echo $record_blood['T3'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='T3' ><?php echo $record_blood['T3'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='T3' >
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>GPT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GPT']) !=0 ){?>
                                    <?php if(($record_blood['GPT'])>40 or ($record_blood['GPT'])==40){ ?>
                                    <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='GPT'><?php echo $record_blood['GPT'] ?></span>
                                    <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px;"  class="form-control" type="text" name='GPT'><?php echo $record_blood['GPT'] ?></span>
                                    <?php } ?>
                                  <?php } else {?>
                                    <span style="max-height:auto;min-height:38px;" class="form-control" type="text" name='GPT'/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T4'])!=0){?>
                                    <?php if(($record_blood['T4'])<5.1) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='T4' ><?php echo $record_blood['T4'] ?></span>
                                    <?php } elseif(($record_blood['T4'])>12.8) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='T4' ><?php echo $record_blood['T4'] ?></span>
                                    <?php } else{ ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='T4'><?php echo $record_blood['T4'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='T4'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >BILIRUBIN_TOTAL</label>
                                <div class='col-md-4 ' >
                                  <?php if(($record_blood['BILIRUBIN_TOTAL']) != 0) { ?>
                                    <?php if(($record_blood['BILIRUBIN_TOTAL'])<0.3 ){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name="BILIRUBIN_TOTAL"><?php echo $record_blood['BILIRUBIN_TOTAL'] ?></span>
                                    <?php } elseif (($record_blood['BILIRUBIN_TOTAL'])>1.0){ ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name="BILIRUBIN_TOTAL"><?php echo $record_blood['BILIRUBIN_TOTAL'] ?></span>
                                    <?php } else {?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="BILIRUBIN_TOTAL"><?php echo $record_blood['BILIRUBIN_TOTAL'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name="BILIRUBIN_TOTAL" >
                                  <?php }?>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>F<font style="text-transform: lowercase;">ree</font>_T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Free_T4'])!=0) {?>
                                    <?php if(($record_blood['Free_T4'])<0.59) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Free_T4' ><?php echo $record_blood['Free_T4'] ?></span>
                                    <?php } elseif(($record_blood['Free_T4'])>1.45) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Free_T4' ><?php echo $record_blood['Free_T4'] ?></span>
                                    <?php } else{ ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Free_T4' ><?php echo $record_blood['Free_T4'] ?></span>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Free_T4' >
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>B<font style="text-transform: lowercase;">lood_ammonia</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Blood_ammonia']) !=0 ){?>
                                    <?php if(($record_blood['Blood_ammonia'])<25) { ?>
                                      <span style="max-height:auto;min-height:38px;background-color:#D9E6ED;" class="form-control" type="text" name='Blood_ammonia' ><?php echo $record_blood['Blood_ammonia'] ?></span>
                                    <?php } elseif(($record_blood['Blood_ammonia'])>90) {?>
                                      <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control" type="text" name='Blood_ammonia' ><?php echo $record_blood['Blood_ammonia'] ?></span>
                                    <?php } else { ?>
                                      <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Blood_ammonia' ><?php echo $record_blood['Blood_ammonia'] ?></span>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <span style="max-height:auto;min-height:38px" class="form-control" type="text" name='Blood_ammonia' >
                                  <?php } ?>
                                </div>
                                <div class='col-md-6'>
                                  <hr>
                                </div>
                            </div>

                        <div class="mb-4 row" style='justify-content: space-evenly'>
                        <div class='col-md-6'></div>
                        <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>RPR/VDRL_<font style="text-transform: lowercase;">test</font></label>
                          <div class='col-md-4 '>
                              <?php if(($record_blood['RPR_VDRL_test'])=='異常') {?>
                                  <span style="max-height:auto;min-height:38px;background-color:#FFD5C9;" class="form-control"><?php echo $record_blood['RPR_VDRL_test'] ?></span>
                              <?php }else {?>
                                  <span style="max-height:auto;min-height:38px" class="form-control"><?php echo $record_blood['RPR_VDRL_test'] ?></span>
                              <?php } ?>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/form-basic-inputs.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>