<?php
    session_start();
    $id=$_SESSION['id'];
    $num_index=$_GET['num_index'];
    $_SESSION['blood_num_index'] = $num_index;
    $link = mysqli_connect("localhost", "root", "", "subject");
  
    $sql = "SELECT * FROM patient_basic where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result); 
  
    $sql_blood = "SELECT * FROM blood where id='$id' and num='$num_index' ";
    $result_blood = mysqli_query($link, $sql_blood); 
    $record_blood = mysqli_fetch_assoc($result_blood);
    $blood_date=$record_blood['date'];
    $blood_num = mysqli_num_rows($result_blood);

    $sql_revise = "SELECT * FROM revise where id='$id' and revise_table='血液資料' and blood_num='$num_index' order by date desc";
    $result_revise = mysqli_query($link, $sql_revise);
    $record_revise = mysqli_fetch_assoc($result_revise);

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
    <title>血液資料_歷史紀錄</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
            <li class="menu-item">
              <div class="menu-link">
                <i class="menu-icon tf-icons fas fa-tag"></i>
                <div><?php echo $record['id'] ?></div>
              </div>
            </li>
            <li class="menu-item">
              <div class="menu-link">
                <i class="menu-icon tf-icons fas fa-user-alt"></i>
                <div><?php echo $record['name'] ?></div>
              </div>
            </li>

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
            <li class="menu-item active open">
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
                <li class="menu-item active">
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
            <li class="menu-item">
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

          <?php if ($record_user['doctor'] == 1 || $record_user['nurse'] == 1){ ?>
            <form action="revise_sure.php?blood_num=<?php echo $blood_num ?>" method="POST">
            <input type="hidden" name="revise" value="blood">
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
                                <input type="date" class="form-control" name="blood_record_time" value="<?php echo $record_blood['record_time'] ?>">
                              </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>WBC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['WBC']) !=0 ){?>
                                    <?php if(($record_blood['WBC'])<4.0) {?>
                                      <input class="form-control" type="text" name='WBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['WBC'] ?>"/>
                                    <?php } elseif(($record_blood['WBC'])>11.0) { ?>
                                      <input class="form-control" type="text" name='WBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['WBC'] ?>"/>
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='WBC' value="<?php echo $record_blood['WBC'] ?>"/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='WBC'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>A<font style="text-transform: lowercase;">LBUMIN</font></label>
                                  <div class='col-md-4 '>
                                    <?php if(($record_blood['ALBUMIN'])!=0){?>
                                      <?php if(($record_blood['ALBUMIN'])<3.5) {?>
                                        <input class="form-control" type="text" name='ALBUMIN' style='background-color:#D9E6ED;'value="<?php echo $record_blood['ALBUMIN'] ?>"/>
                                      <?php } elseif(($record_blood['ALBUMIN'])>5.7) { ?>
                                        <input class="form-control" type="text" name='ALBUMIN' style='background-color:#FFD5C9;' value="<?php echo $record_blood['ALBUMIN'] ?>"/>
                                      <?php } else{ ?>
                                        <input class="form-control" type="text" name='ALBUMIN' value="<?php echo $record_blood['ALBUMIN'] ?>"/>
                                      <?php } ?> 
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='ALBUMIN'/>
                                    <?php } ?>
                                  </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>S<font style="text-transform: lowercase;">EG</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['SEG'])!=0){ ?>
                                    <?php if(($record_blood['SEG'])>75.0){ ?>
                                      <input class="form-control" type="text" name='SEG' style='background-color:#FFD5C9;' value="<?php echo $record_blood['SEG'] ?>"/>
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='SEG' value="<?php echo $record_blood['SEG'] ?>"/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='SEG'/>
                                  <?php } ?>
                                </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>F<font style="text-transform: lowercase;">olic_acid</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Folic_acid']) !=0 ){ ?>
                                    <?php if(($record_blood['Folic_acid'])<4.0) {?>
                                      <input class="form-control" type="text" name='Folic_acid' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Folic_acid'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Folic_acid'  value="<?php echo $record_blood['Folic_acid'] ?>"/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='Folic_acid'>
                                  <?php }?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>RBC</label>
                                <div class='col-md-4 '>
                                <?php if(($record_blood['RBC'])!=0){?>
                                    <?php if($record['hsex']==NULL){ ?>
                                      <input class="form-control" type="text" name="RBC"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['RBC'] ?>" >
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='女'){ ?>
                                      <?php if(($record_blood['RBC'])<3.70) {?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['RBC'] ?>" >
                                      <?php } elseif (($record_blood['RBC'])>5.50){ ?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['RBC'] ?>" >
                                      <?php } else {?>
                                        <input class="form-control" type="text" name='RBC' value="<?php echo $record_blood['RBC'] ?>" >
                                      <?php } ?> 
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='男'){ ?>
                                      <?php if(($record_blood['RBC'])<4.2) {?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['RBC'] ?>" >
                                      <?php } elseif (($record_blood['RBC'])>6.2){ ?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['RBC'] ?>">
                                      <?php } else {?>
                                        <input class="form-control" type="text" name='RBC' value="<?php echo $record_blood['RBC'] ?>" >
                                      <?php } ?> 
                                    <?php } ?>
                                  <?php  } else { ?>
                                    <input class="form-control" type="text" name='RBC' >
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>V<font style="text-transform: lowercase;">it</font>.B12</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Vit_B12'])!=0){?>
                                    <?php if(($record_blood['Vit_B12'])<180) { ?>
                                      <input class="form-control" type="text" name='Vit_B12' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Vit_B12'] ?>"/>
                                    <?php } elseif(($record_blood['Vit_B12'])>914) {?>
                                      <input class="form-control" type="text" name='Vit_B12' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Vit_B12'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Vit_B12' value="<?php echo $record_blood['Vit_B12'] ?>"/>
                                    <?php } ?>
                                  <?php } else{?>
                                    <input class="form-control" type="text" name='Vit_B12'/>
                                  <?php } ?>
                                  </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>H<font style="text-transform: lowercase;">GB</font></label>
                                <div class='col-md-4 '>
                                <?php if(($record_blood['HGB'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <input class="form-control" type="text" name="HGB"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['HGB'] ?>" >
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['HGB'])<11.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } elseif($record_blood['HGB']>15.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="HGB"   value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['HGB'])<12.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } elseif($record_blood['URIC']>18.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="HGB"   value="<?php echo $record_blood['HGB'] ?>" >
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <input class="form-control" type="text" name="HGB" >
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
                                      <input class="form-control" type="text" name='Platelet' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Platelet'] ?>">
                                    <?php } elseif(($record_blood['Platelet'])>400) {?>
                                      <input class="form-control" type="text" name='Platelet' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Platelet'] ?>">
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Platelet' value="<?php echo $record_blood['Platelet'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Platelet'>
                                  <?php } ?>
                                </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >G<font style="text-transform: lowercase;">lucose</font>_AC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Glucose_AC']) != 0) {?>
                                    <?php if(($record_blood['Glucose_AC'])<70){ ?>
                                      <input class="form-control" type="text" name='Glucose_AC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Glucose_AC'] ?>"/>
                                    <?php } elseif(($record_blood['Glucose_AC'])>100) { ?>
                                      <input class="form-control" type="text" name='Glucose_AC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Glucose_AC'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Glucose_AC'  value="<?php echo $record_blood['Glucose_AC'] ?>" />
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='Glucose_AC' >
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
                                      <input class="form-control" type="text" name='HbA1c'  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HbA1c'] ?>" />
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='HbA1c' value="<?php echo $record_blood['HbA1c'] ?>" />
                                    <?php } ?>
                                      <?php } else{ ?>
                                    <input class="form-control" type="text" name='HbA1c' />
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>BUN</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['BUN'])!=0) {?>
                                    <?php if(($record_blood['BUN'])<7){ ?>
                                      <input class="form-control" type="text" name='BUN' style='background-color:#D9E6ED;' value="<?php echo $record_blood['BUN'] ?>">
                                    <?php } elseif(($record_blood['BUN'])>25) { ?>
                                      <input class="form-control" type="text" name='BUN' style='background-color:#FFD5C9;' value="<?php echo $record_blood['BUN'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='BUN' value="<?php echo $record_blood['BUN'] ?>"/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='BUN'/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">HOLESTEROL</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['CHOLESTEROL'])!=0) {?>
                                    <?php if(($record_blood['CHOLESTEROL'])>200) { ?>
                                    <input class="form-control" type="text" name='CHOLESTEROL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['CHOLESTEROL'] ?>"/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='CHOLESTEROL' value="<?php echo $record_blood['CHOLESTEROL'] ?>"/>
                                    <?php } ?> 
                                  <?php } else{?>
                                    <input class="form-control" type="text" name='CHOLESTEROL'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">reatinine</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Creatinine'])!=0) {?>
                                    <?php if(($record_blood['Creatinine'])<0.6) { ?>
                                      <input class="form-control" type="text" name='Creatinine' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Creatinine'] ?>">
                                    <?php } elseif(($record_blood['Creatinine'])>1.3) { ?>
                                      <input class="form-control" type="text" name='Creatinine'  style='background-color:#FFD5C9;' value="<?php echo $record_blood['Creatinine'] ?>">
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Creatinine' value="<?php echo $record_blood['Creatinine'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Creatinine'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T<font style="text-transform: lowercase;">RIGLYCERIDE</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['TRIGLYCERIDE'])!=0){ ?>
                                    <?php if(($record_blood['TRIGLYCERIDE'])>150){?>
                                      <input class="form-control" type="text" name='TRIGLYCERIDE' style='background-color:#FFD5C9;' value="<?php echo $record_blood['TRIGLYCERIDE'] ?>">
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='TRIGLYCERIDE' value="<?php echo $record_blood['TRIGLYCERIDE'] ?>">
                                    <?php } ?>
                                 
                                      <?php } else{ ?>
                                    <input class="form-control" type="text" name='TRIGLYCERIDE'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'><font style="text-transform: lowercase;">e</font>GFR</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['eGFR'])!=0) {?>
                                    <?php if(($record_blood['eGFR'])<60) { ?>
                                      <input class="form-control" type="text" name='eGFR' style='background-color:#D9E6ED;' value="<?php echo $record_blood['eGFR'] ?>" />
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='eGFR' value="<?php echo $record_blood['eGFR'] ?>" />
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='eGFR' />
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>LDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['LDL'])!=0){ ?>
                                    <?php if(($record_blood['LDL'])>130) {?>
                                    <input class="form-control" type="text" name='LDL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['LDL'] ?>"/>
                                    <?php } else {?>
                                    <input class="form-control" type="text" name='LDL' value="<?php echo $record_blood['LDL'] ?>"/>
                                    <?php } ?>  
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='LDL'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>N<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Na'])!=0) {?>
                                    <?php if(($record_blood['Na'])<136){ ?>
                                      <input class="form-control" type="text" name='Na' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Na'] ?>"/>
                                    <?php } elseif(($record_blood['Na'])>145){?>
                                      <input class="form-control" type="text" name='Na' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Na'] ?>"/>
                                    <?php }else{ ?>
                                      <input class="form-control" type="text" name='Na' value="<?php echo $record_blood['Na'] ?>"/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Na'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>HDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['HDL'])!=0) {?>
                                    <?php if(($record_blood['HDL'])<23) { ?>
                                    <input class="form-control" type="text" name='HDL' style='background-color:#D9E6ED;' value="<?php echo $record_blood['HDL'] ?>"/>
                                    <?php } elseif(($record_blood['HDL'])>92) { ?>
                                      <input class="form-control" type="text" name='HDL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['HDL'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='HDL' value="<?php echo $record_blood['HDL'] ?>"/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='HDL'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>K</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['K']) !=0 ){?>
                                    <?php if(($record_blood['K'])<3.4){ ?>
                                      <input class="form-control" type="text" name='K' style='background-color:#D9E6ED;' value="<?php echo $record_blood['K'] ?>"/>
                                    <?php } elseif(($record_blood['K'])>4.5){ ?>
                                      <input class="form-control" type="text" name='K' style='background-color:#FFD5C9;' value="<?php echo $record_blood['K'] ?>"/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='K' value="<?php echo $record_blood['K'] ?>"/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='K'/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>U<font style="text-transform: lowercase;">RIC</font></label>
                              <div class='col-md-4'>
                                <?php if(($record_blood['URIC'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <input class="form-control" type="text" name="URIC"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['URIC'] ?>" >
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['URIC'])<2.3){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } elseif($record_blood['URIC']>6.6){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="URIC"   value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['URIC'])<4.4){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } elseif($record_blood['URIC']>7.6){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="URIC"   value="<?php echo $record_blood['URIC'] ?>" >
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <input class="form-control" type="text" name="URIC" >
                                <?php } ?>
                              </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Ca'])!=0) {?>
                                    <?php if(($record_blood['Ca'])<8.6) { ?>
                                      <input class="form-control" type="text" name='Ca' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Ca'] ?>"/>
                                    <?php } elseif(($record_blood['Ca'])>10.3) {?>
                                      <input class="form-control" type="text" name='Ca' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Ca'] ?>">
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Ca' value="<?php echo $record_blood['Ca'] ?>"/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='Ca'>
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
                                      <input class="form-control" type="text" name='TSH' style='background-color:#D9E6ED;' value="<?php echo $record_blood['TSH'] ?>">
                                    <?php } elseif (($record_blood['TSH'])>5.6) { ?>
                                      <input class="form-control" type="text" name='TSH' style='background-color:#FFD5C9;' value="<?php echo $record_blood['TSH'] ?>">
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='TSH' value="<?php echo $record_blood['TSH'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='TSH'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>GOT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GOT']) != 0) {?>
                                    <?php if(($record_blood['GOT'])>40 or ($record_blood['GOT'])==40){ ?>
                                    <input class="form-control" type="text" name='GOT' style='background-color:#FFD5C9;' value="<?php echo $record_blood['GOT'] ?>">
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='GOT' value="<?php echo $record_blood['GOT'] ?>"/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='GOT'>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>T3</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T3'])!=0){?>
                                    <?php if(($record_blood['T3'])<0.70) {?>
                                      <input class="form-control" type="text" name='T3' style='background-color:#D9E6ED;' value="<?php echo $record_blood['T3'] ?>">
                                    <?php } elseif(($record_blood['T3'])>1.78) {?>
                                      <input class="form-control" type="text" name='T3' style='background-color:#FFD5C9;' value="<?php echo $record_blood['T3'] ?>">
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='T3' value="<?php echo $record_blood['T3'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='T3'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>GPT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GPT']) !=0 ){?>
                                    <?php if(($record_blood['GPT'])>40 or ($record_blood['GPT'])==40){ ?>
                                    <input class="form-control" type="text" name='GPT' style='background-color:#FFD5C9;' value="<?php echo $record_blood['GPT'] ?>"/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='GPT' value="<?php echo $record_blood['GPT'] ?>"/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='GPT'/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T4'])!=0){?>
                                    <?php if(($record_blood['T4'])<5.1) {?>
                                      <input class="form-control" type="text" name='T4' style='background-color:#D9E6ED;' value="<?php echo $record_blood['T4'] ?>">
                                    <?php } elseif(($record_blood['T4'])>12.8) { ?>
                                      <input class="form-control" type="text" name='T4' style='background-color:#FFD5C9;' value="<?php echo $record_blood['T4'] ?>">
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='T4' value="<?php echo $record_blood['T4'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='T4'>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >BILIRUBIN_TOTAL</label>
                                <div class='col-md-4 ' >
                                  <?php if(($record_blood['BILIRUBIN_TOTAL']) != 0) { ?>
                                    <?php if(($record_blood['BILIRUBIN_TOTAL'])<0.3 ){ ?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL" style='background-color:#D9E6ED;' value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>">
                                    <?php } elseif (($record_blood['BILIRUBIN_TOTAL'])>1.0){ ?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL"  style='background-color:#FFD5C9;'  value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>">
                                    <?php } else {?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL"    value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>">
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name="BILIRUBIN_TOTAL"  >
                                  <?php }?>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>F<font style="text-transform: lowercase;">ree</font>_T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Free_T4'])!=0) {?>
                                    <?php if(($record_blood['Free_T4'])<0.59) { ?>
                                      <input class="form-control" type="text" name='Free_T4' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Free_T4'] ?>"/>
                                    <?php } elseif(($record_blood['Free_T4'])>1.45) {?>
                                      <input class="form-control" type="text" name='Free_T4' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Free_T4'] ?>"/>
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='Free_T4' value="<?php echo $record_blood['Free_T4'] ?>"/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='Free_T4' >
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>B<font style="text-transform: lowercase;">lood_ammonia</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Blood_ammonia']) !=0 ){?>
                                    <?php if(($record_blood['Blood_ammonia'])<25) { ?>
                                      <input class="form-control" type="text" name='Blood_ammonia' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Blood_ammonia'] ?>"/>
                                    <?php } elseif(($record_blood['Blood_ammonia'])>90) {?>
                                      <input class="form-control" type="text" name='Blood_ammonia' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Blood_ammonia'] ?>"/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Blood_ammonia' value="<?php echo $record_blood['Blood_ammonia'] ?>"/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Blood_ammonia'>
                                  <?php } ?>
                                </div>
                                <div class='col-md-6'>
                                    <hr>
                                </div>
                            </div>

                            <div class="mb-4 row" style='justify-content: space-evenly'>
                              <div class='col-md-6'>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>RPR/VDRL_<font style="text-transform: lowercase;">test</font></label>
                                <div class='col-md-4 '>
                                    <?php if($record_blood['RPR_VDRL_test']=='異常') {?>
                                      <select style='background-color:#FFD5C9;' name='RPR_VDRL_test' class="form-select ">
                                      <option style='background-color:#FFD5C9;'></option>
                                      <option style='background-color:#FFD5C9;' value="正常">正常</option>
                                      <option style='background-color:#FFD5C9;' value="異常" selected>異常</option>
                                    <?php }else if($record_blood['RPR_VDRL_test']=='正常') {?>
                                      <select name='RPR_VDRL_test' class="form-select ">
                                      <option></option>
                                      <option value="正常" selected>正常</option>
                                      <option value="異常">異常</option>
                                    <?php }else{ ?>
                                      <select name='RPR_VDRL_test' class="form-select ">
                                      <option></option>
                                      <option value="正常">正常</option>
                                      <option value="異常">異常</option>
                                    <?php } ?>
                                  </select>
                                </div>                             
                            </div>

                            <div style='text-align:right;'>
                                <?php if(isset($record_revise['id'])){ ?>
                                  <p style="display:inline-block;">上次修改時間&nbsp;&nbsp;<?php echo $record_revise['date'] ?>&nbsp;&nbsp;</p>
                                 
                                <?php } ?>  
                                <button type="submit" class="btn btn-primary me-2 ">修改</button>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          <?php }else{ ?>
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
                          <input type="date" class="form-control" name="blood_record_time" value="<?php echo $record_blood['record_time'] ?>" readonly>
                        </div>
                      </div>

                      <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>WBC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['WBC']) !=0 ){?>
                                    <?php if(($record_blood['WBC'])<4.0) {?>
                                      <input class="form-control" type="text" name='WBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['WBC'] ?>" readonly/>
                                    <?php } elseif(($record_blood['WBC'])>11.0) { ?>
                                      <input class="form-control" type="text" name='WBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['WBC'] ?>" readonly/>
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='WBC' value="<?php echo $record_blood['WBC'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='WBC' readonly>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>A<font style="text-transform: lowercase;">LBUMIN</font></label>
                                  <div class='col-md-4 '>
                                    <?php if(($record_blood['ALBUMIN'])!=0){?>
                                      <?php if(($record_blood['ALBUMIN'])<3.5) {?>
                                        <input class="form-control" type="text" name='ALBUMIN' style='background-color:#D9E6ED;'value="<?php echo $record_blood['ALBUMIN'] ?>" readonly/>
                                      <?php } elseif(($record_blood['ALBUMIN'])>5.7) { ?>
                                        <input class="form-control" type="text" name='ALBUMIN' style='background-color:#FFD5C9;' value="<?php echo $record_blood['ALBUMIN'] ?>" readonly/>
                                      <?php } else{ ?>
                                        <input class="form-control" type="text" name='ALBUMIN' value="<?php echo $record_blood['ALBUMIN'] ?>" readonly/>
                                      <?php } ?> 
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='ALBUMIN' readonly/>
                                    <?php } ?>
                                  </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>S<font style="text-transform: lowercase;">EG</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['SEG'])!=0){ ?>
                                    <?php if(($record_blood['SEG'])>75.0){ ?>
                                      <input class="form-control" type="text" name='SEG' style='background-color:#FFD5C9;' value="<?php echo $record_blood['SEG'] ?>" readonly/>
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='SEG' value="<?php echo $record_blood['SEG'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='SEG' readonly/>
                                  <?php } ?>
                                </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>F<font style="text-transform: lowercase;">olic_acid</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Folic_acid']) !=0 ){ ?>
                                    <?php if(($record_blood['Folic_acid'])<4.0) {?>
                                      <input class="form-control" type="text" name='Folic_acid' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Folic_acid'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Folic_acid'  value="<?php echo $record_blood['Folic_acid'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='Folic_acid' readonly>
                                  <?php }?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>RBC</label>
                                <div class='col-md-4 '>
                                <?php if(($record_blood['RBC'])!=0){?>
                                    <?php if($record['hsex']==NULL){ ?>
                                      <input class="form-control" type="text" name="RBC"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['RBC'] ?>" readonly/>
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='女'){ ?>
                                      <?php if(($record_blood['RBC'])<3.70) {?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['RBC'] ?>" readonly/>
                                      <?php } elseif (($record_blood['RBC'])>5.50){ ?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['RBC'] ?>" readonly/>
                                      <?php } else {?>
                                        <input class="form-control" type="text" name='RBC' value="<?php echo $record_blood['RBC'] ?>" readonly>
                                      <?php } ?> 
                                    <?php } ?>
                                    <?php if(($record['hsex'])=='男'){ ?>
                                      <?php if(($record_blood['RBC'])<4.2) {?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['RBC'] ?>" readonly/>
                                      <?php } elseif (($record_blood['RBC'])>6.2){ ?>
                                        <input class="form-control" type="text" name='RBC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['RBC'] ?>" readonly/> 
                                      <?php } else {?>
                                        <input class="form-control" type="text" name='RBC' value="<?php echo $record_blood['RBC'] ?>" readonly/>
                                      <?php } ?> 
                                    <?php } ?>
                                  <?php  } else { ?>
                                    <input class="form-control" type="text" name='RBC' readonly>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>V<font style="text-transform: lowercase;">it</font>.B12</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Vit_B12'])!=0){?>
                                    <?php if(($record_blood['Vit_B12'])<180) { ?>
                                      <input class="form-control" type="text" name='Vit_B12' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Vit_B12'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Vit_B12'])>914) {?>
                                      <input class="form-control" type="text" name='Vit_B12' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Vit_B12'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Vit_B12' value="<?php echo $record_blood['Vit_B12'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{?>
                                    <input class="form-control" type="text" name='Vit_B12' readonly/>
                                  <?php } ?>
                                  </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>H<font style="text-transform: lowercase;">GB</font></label>
                                <div class='col-md-4 '>
                                <?php if(($record_blood['HGB'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <input class="form-control" type="text" name="HGB"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['HGB'] ?>" readonly>
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['HGB'])<11.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } elseif($record_blood['HGB']>15.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="HGB"   value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['HGB'])<12.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } elseif($record_blood['URIC']>18.3){ ?>
                                      <input class="form-control" type="text" name="HGB"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="HGB"   value="<?php echo $record_blood['HGB'] ?>" readonly>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <input class="form-control" type="text" name="HGB" readonly>
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
                                      <input class="form-control" type="text" name='Platelet' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Platelet'] ?>" readonly>
                                    <?php } elseif(($record_blood['Platelet'])>400) {?>
                                      <input class="form-control" type="text" name='Platelet' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Platelet'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Platelet' value="<?php echo $record_blood['Platelet'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Platelet' readonly>
                                  <?php } ?>
                                </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >G<font style="text-transform: lowercase;">lucose</font>_AC</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Glucose_AC']) != 0) {?>
                                    <?php if(($record_blood['Glucose_AC'])<70){ ?>
                                      <input class="form-control" type="text" name='Glucose_AC' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Glucose_AC'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Glucose_AC'])>100) { ?>
                                      <input class="form-control" type="text" name='Glucose_AC' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Glucose_AC'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Glucose_AC'  value="<?php echo $record_blood['Glucose_AC'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='Glucose_AC' readonly>
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
                                      <input class="form-control" type="text" name='HbA1c'  style='background-color:#FFD5C9;' value="<?php echo $record_blood['HbA1c'] ?>" readonly/>
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='HbA1c' value="<?php echo $record_blood['HbA1c'] ?>" readonly/>
                                    <?php } ?>
                                      <?php } else{ ?>
                                    <input class="form-control" type="text" name='HbA1c' readonly/>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>BUN</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['BUN'])!=0) {?>
                                    <?php if(($record_blood['BUN'])<7){ ?>
                                      <input class="form-control" type="text" name='BUN' style='background-color:#D9E6ED;' value="<?php echo $record_blood['BUN'] ?>" readonly>
                                    <?php } elseif(($record_blood['BUN'])>25) { ?>
                                      <input class="form-control" type="text" name='BUN' style='background-color:#FFD5C9;' value="<?php echo $record_blood['BUN'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='BUN' value="<?php echo $record_blood['BUN'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='BUN' readonly/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">HOLESTEROL</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['CHOLESTEROL'])!=0) {?>
                                    <?php if(($record_blood['CHOLESTEROL'])>200) { ?>
                                    <input class="form-control" type="text" name='CHOLESTEROL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['CHOLESTEROL'] ?>" readonly/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='CHOLESTEROL' value="<?php echo $record_blood['CHOLESTEROL'] ?>" readonly/>
                                    <?php } ?> 
                                  <?php } else{?>
                                    <input class="form-control" type="text" name='CHOLESTEROL' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">reatinine</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Creatinine'])!=0) {?>
                                    <?php if(($record_blood['Creatinine'])<0.6) { ?>
                                      <input class="form-control" type="text" name='Creatinine' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Creatinine'] ?>" readonly>
                                    <?php } elseif(($record_blood['Creatinine'])>1.3) { ?>
                                      <input class="form-control" type="text" name='Creatinine'  style='background-color:#FFD5C9;' value="<?php echo $record_blood['Creatinine'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Creatinine' value="<?php echo $record_blood['Creatinine'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Creatinine' readonly>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T<font style="text-transform: lowercase;">RIGLYCERIDE</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['TRIGLYCERIDE'])!=0){ ?>
                                    <?php if(($record_blood['TRIGLYCERIDE'])>150){?>
                                      <input class="form-control" type="text" name='TRIGLYCERIDE' style='background-color:#FFD5C9;' value="<?php echo $record_blood['TRIGLYCERIDE'] ?>" readonly>
                                    <?php } else {?>
                                      <input class="form-control" type="text" name='TRIGLYCERIDE' value="<?php echo $record_blood['TRIGLYCERIDE'] ?>" readonly>
                                    <?php } ?>
                                 
                                      <?php } else{ ?>
                                    <input class="form-control" type="text" name='TRIGLYCERIDE' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'><font style="text-transform: lowercase;">e</font>GFR</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['eGFR'])!=0) {?>
                                    <?php if(($record_blood['eGFR'])<60) { ?>
                                      <input class="form-control" type="text" name='eGFR' style='background-color:#D9E6ED;' value="<?php echo $record_blood['eGFR'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='eGFR' value="<?php echo $record_blood['eGFR'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='eGFR' readonly/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>LDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['LDL'])!=0){ ?>
                                    <?php if(($record_blood['LDL'])>130) {?>
                                    <input class="form-control" type="text" name='LDL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['LDL'] ?>" readonly/>
                                    <?php } else {?>
                                    <input class="form-control" type="text" name='LDL' value="<?php echo $record_blood['LDL'] ?>" readonly/>
                                    <?php } ?>  
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='LDL' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>N<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Na'])!=0) {?>
                                    <?php if(($record_blood['Na'])<136){ ?>
                                      <input class="form-control" type="text" name='Na' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Na'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Na'])>145){?>
                                      <input class="form-control" type="text" name='Na' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Na'] ?>" readonly/>
                                    <?php }else{ ?>
                                      <input class="form-control" type="text" name='Na' value="<?php echo $record_blood['Na'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Na' readonly>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>HDL</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['HDL'])!=0) {?>
                                    <?php if(($record_blood['HDL'])<23) { ?>
                                    <input class="form-control" type="text" name='HDL' style='background-color:#D9E6ED;' value="<?php echo $record_blood['HDL'] ?>" readonly/>
                                    <?php } elseif(($record_blood['HDL'])>92) { ?>
                                      <input class="form-control" type="text" name='HDL' style='background-color:#FFD5C9;' value="<?php echo $record_blood['HDL'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='HDL' value="<?php echo $record_blood['HDL'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='HDL' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>K</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['K']) !=0 ){?>
                                    <?php if(($record_blood['K'])<3.4){ ?>
                                      <input class="form-control" type="text" name='K' style='background-color:#D9E6ED;' value="<?php echo $record_blood['K'] ?>" readonly/>
                                    <?php } elseif(($record_blood['K'])>4.5){ ?>
                                      <input class="form-control" type="text" name='K' style='background-color:#FFD5C9;' value="<?php echo $record_blood['K'] ?>" readonly/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='K' value="<?php echo $record_blood['K'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='K' readonly/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>U<font style="text-transform: lowercase;">RIC</font></label>
                              <div class='col-md-4'>
                                <?php if(($record_blood['URIC'])!=0) {?>
                                  <?php if($record['hsex']==NULL){ ?>
                                    <input class="form-control" type="text" name="URIC"  style="border-color:gray;border-width:2.5px;border-style:dotted" value="<?php echo $record_blood['URIC'] ?>" readonly>
                                  <?php } ?>
                                  <?php if($record['hsex']=='女'){ ?>
                                    <?php if(($record_blood['URIC'])<2.3){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } elseif($record_blood['URIC']>6.6){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="URIC"   value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } ?>
                                  <?php }?>
                                  <?php if(($record['hsex'])=='男'){ ?>
                                    <?php if(($record_blood['URIC'])<4.4){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#D9E6ED;' value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } elseif($record_blood['URIC']>7.6){ ?>
                                      <input class="form-control" type="text" name="URIC"  style='background-color:#FFD5C9;' value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name="URIC"   value="<?php echo $record_blood['URIC'] ?>" readonly>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <input class="form-control" type="text" name="URIC" readonly>
                                <?php } ?>
                              </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>C<font style="text-transform: lowercase;">a</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Ca'])!=0) {?>
                                    <?php if(($record_blood['Ca'])<8.6) { ?>
                                      <input class="form-control" type="text" name='Ca' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Ca'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Ca'])>10.3) {?>
                                      <input class="form-control" type="text" name='Ca' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Ca'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Ca' value="<?php echo $record_blood['Ca'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='Ca' readonly>
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
                                      <input class="form-control" type="text" name='TSH' style='background-color:#D9E6ED;' value="<?php echo $record_blood['TSH'] ?>" readonly>
                                    <?php } elseif (($record_blood['TSH'])>5.6) { ?>
                                      <input class="form-control" type="text" name='TSH' style='background-color:#FFD5C9;' value="<?php echo $record_blood['TSH'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='TSH' value="<?php echo $record_blood['TSH'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='TSH' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>GOT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GOT']) != 0) {?>
                                    <?php if(($record_blood['GOT'])>40 or ($record_blood['GOT'])==40){ ?>
                                    <input class="form-control" type="text" name='GOT' style='background-color:#FFD5C9;' value="<?php echo $record_blood['GOT'] ?>" readonly>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='GOT' value="<?php echo $record_blood['GOT'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='GOT' readonly>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>T3</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T3'])!=0){?>
                                    <?php if(($record_blood['T3'])<0.70) {?>
                                      <input class="form-control" type="text" name='T3' style='background-color:#D9E6ED;' value="<?php echo $record_blood['T3'] ?>" readonly>
                                    <?php } elseif(($record_blood['T3'])>1.78) {?>
                                      <input class="form-control" type="text" name='T3' style='background-color:#FFD5C9;' value="<?php echo $record_blood['T3'] ?>" readonly>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='T3' value="<?php echo $record_blood['T3'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='T3' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>GPT</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['GPT']) !=0 ){?>
                                    <?php if(($record_blood['GPT'])>40 or ($record_blood['GPT'])==40){ ?>
                                    <input class="form-control" type="text" name='GPT' style='background-color:#FFD5C9;' value="<?php echo $record_blood['GPT'] ?>" readonly/>
                                    <?php } else{ ?>
                                    <input class="form-control" type="text" name='GPT' value="<?php echo $record_blood['GPT'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else {?>
                                    <input class="form-control" type="text" name='GPT' readonly/>
                                  <?php } ?>
                                </div>
                                <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['T4'])!=0){?>
                                    <?php if(($record_blood['T4'])<5.1) {?>
                                      <input class="form-control" type="text" name='T4' style='background-color:#D9E6ED;' value="<?php echo $record_blood['T4'] ?>" readonly>
                                    <?php } elseif(($record_blood['T4'])>12.8) { ?>
                                      <input class="form-control" type="text" name='T4' style='background-color:#FFD5C9;' value="<?php echo $record_blood['T4'] ?>" readonly>
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='T4' value="<?php echo $record_blood['T4'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='T4' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;' >BILIRUBIN_TOTAL</label>
                                <div class='col-md-4 ' >
                                  <?php if(($record_blood['BILIRUBIN_TOTAL']) != 0) { ?>
                                    <?php if(($record_blood['BILIRUBIN_TOTAL'])<0.3 ){ ?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL" style='background-color:#D9E6ED;' value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>" readonly>
                                    <?php } elseif (($record_blood['BILIRUBIN_TOTAL'])>1.0){ ?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL"  style='background-color:#FFD5C9;'  value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>" readonly>
                                    <?php } else {?>
                                      <input class="form-control" type="text" name="BILIRUBIN_TOTAL"    value="<?php echo $record_blood['BILIRUBIN_TOTAL'] ?>" readonly>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name="BILIRUBIN_TOTAL"  readonly>
                                  <?php }?>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>F<font style="text-transform: lowercase;">ree</font>_T4</label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Free_T4'])!=0) {?>
                                    <?php if(($record_blood['Free_T4'])<0.59) { ?>
                                      <input class="form-control" type="text" name='Free_T4' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Free_T4'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Free_T4'])>1.45) {?>
                                      <input class="form-control" type="text" name='Free_T4' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Free_T4'] ?>" readonly/>
                                    <?php } else{ ?>
                                      <input class="form-control" type="text" name='Free_T4' value="<?php echo $record_blood['Free_T4'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <input class="form-control" type="text" name='Free_T4' readonly>
                                  <?php } ?>
                                </div>
                            </div>

                            <div class="mb-4 row " style='justify-content: space-evenly'>
                            <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;'>B<font style="text-transform: lowercase;">lood_ammonia</font></label>
                                <div class='col-md-4 '>
                                  <?php if(($record_blood['Blood_ammonia']) !=0 ){?>
                                    <?php if(($record_blood['Blood_ammonia'])<25) { ?>
                                      <input class="form-control" type="text" name='Blood_ammonia' style='background-color:#D9E6ED;' value="<?php echo $record_blood['Blood_ammonia'] ?>" readonly/>
                                    <?php } elseif(($record_blood['Blood_ammonia'])>90) {?>
                                      <input class="form-control" type="text" name='Blood_ammonia' style='background-color:#FFD5C9;' value="<?php echo $record_blood['Blood_ammonia'] ?>" readonly/>
                                    <?php } else { ?>
                                      <input class="form-control" type="text" name='Blood_ammonia' value="<?php echo $record_blood['Blood_ammonia'] ?>" readonly/>
                                    <?php } ?>
                                  <?php } else{ ?>
                                    <input class="form-control" type="text" name='Blood_ammonia' readonly>
                                  <?php } ?>
                                </div>
                                <div class='col-md-6'>
                                    <hr>
                                </div>
                            </div>

                            <div class="mb-4 row" style='justify-content: space-evenly'>
                              <div class='col-md-6'>
                              </div>
                              <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;'>RPR/VDRL_<font style="text-transform: lowercase;">test</font></label>
                                <div class='col-md-4 '>
                                    <?php if($record_blood['RPR_VDRL_test']=='異常') {?>
                                      <select style='background-color:#FFD5C9;' name='RPR_VDRL_test' class="form-select " disabled>
                                      <option style='background-color:#FFD5C9;'></option>
                                      <option style='background-color:#FFD5C9;' value="正常">正常</option>
                                      <option style='background-color:#FFD5C9;' value="異常" selected>異常</option>
                                    <?php }else if($record_blood['RPR_VDRL_test']=='正常') {?>
                                      <select name='RPR_VDRL_test' class="form-select " disabled>
                                      <option></option>
                                      <option value="正常" selected>正常</option>
                                      <option value="異常">異常</option>
                                    <?php }else{ ?>
                                      <select name='RPR_VDRL_test' class="form-select " disabled>
                                      <option></option>
                                      <option value="正常">正常</option>
                                      <option value="異常">異常</option>
                                    <?php } ?>
                                  </select>
                                </div>                             
                            </div>

                      <div style='text-align:right;'>
                        <?php if(isset($record_revise['id'])){ ?>
                            <p style="display:inline-block;">上次修改時間&nbsp;&nbsp;<?php echo $record_revise['date'] ?>&nbsp;&nbsp;</p>
                        <?php } ?>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
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
