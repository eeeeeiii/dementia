<?php
  session_start();
  $id=$_SESSION['id'];
  $link = mysqli_connect("localhost", "root", "", "subject");

  $sql = "SELECT id, name FROM patient_basic where id='$id'";
  $result = mysqli_query($link, $sql);
  $record = mysqli_fetch_assoc($result); 
 
  $sql_carer = "SELECT * FROM carer where id='$id'";
  $result_carer = mysqli_query($link, $sql_carer);
  $record_carer = mysqli_fetch_assoc($result_carer);

  $sql_revise = "SELECT * FROM revise where id='$id' and revise_table='照顧者資料' order by date desc";
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
    <title>照顧者資料</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
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
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fas fa-clinic-medical"></i>
                <div >照顧者資料</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
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

          <?php if ($record_user['doctor'] == 1 || $record_user['personal_manager'] == 1){ ?>
            <?php if(isset($record_carer['id'])){ ?>
            <form action="revise_sure.php" method="POST">
          <?php }else{ ?>
            <form action="insert.php" method="POST"> 
            <script>
                swal({
                  title:'尚未建檔',
                  text:'請先填寫照顧者資料',
                  icon:'info',
                })
              </script>
          <?php } ?>
          <input type="hidden" name="insert" value="carer">
          <input type="hidden" name="revise" value="carer">
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
                      <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">照顧者資料</span></h3>
                      <div class="mb-4 row " style='justify-content: space-evenly'>
                        <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>姓名</label>
                        <div class='col-md-4 ' >
                          <input class="form-control" type="text" name="carer_name" value="<?php echo $record_carer['name'] ?>"/>
                        </div>
                        <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>性別</label>
                        <div class='col-md-4'>
                          <select name="carer_gender" class="form-select ">
                            <?php if($record_carer['gender'] == '男'){ ?>
                              <option></option>
                              <option value="男" selected>男</option>
                              <option value="女">女</option>
                            <?php }else if($record_carer['gender'] == '女'){ ?>
                              <option></option>
                              <option value="男">男</option>
                              <option value="女" selected>女</option>
                            <?php }else{ ?>
                              <option></option>
                              <option value="男">男</option>
                              <option value="女">女</option>
                            <?php } ?>
                          </select>
                          </div>
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>聯絡電話</label>
                        <div class='col-md-4 '>
                          <input class="form-control" type="tel" name='carer_phone' value="<?php echo $record_carer['phone'] ?>"/>
                        </div>
                        <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>職業</label>
                        <div class='col-md-4 '>
                          <input class="form-control" type="tel" name='carer_job' value="<?php echo $record_carer['job'] ?>"/>
                        </div>
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;width:125px;'>與個案關係</label>
                          <div class='col-md-4 '>
                            <select name='carer_relation' class="form-select " >
                              <?php if($record_carer['relation'] == '父母'){ ?>
                                <option></option>
                                <option value="父母" selected>父母</option>
                                <option value="子女">子女</option>
                                <option value="兄弟姊妹">兄弟姊妹</option>
                                <option value="鄰居">鄰居</option>
                                <option value="其他">其他</option>
                              <?php }else if($record_carer['relation'] == '子女'){ ?>
                                <option></option>
                                <option value="父母">父母</option>
                                <option value="子女" selected>子女</option>
                                <option value="兄弟姊妹">兄弟姊妹</option>
                                <option value="鄰居">鄰居</option>
                                <option value="其他">其他</option>
                              <?php }else if($record_carer['relation'] == '兄弟姊妹'){ ?>
                                <option></option>
                                <option value="父母">父母</option>
                                <option value="子女">子女</option>
                                <option value="兄弟姊妹" selected>兄弟姊妹</option>
                                <option value="鄰居">鄰居</option>
                                <option value="其他">其他</option>
                              <?php }else if($record_carer['relation'] == '鄰居'){ ?>
                                <option></option>
                                <option value="父母">父母</option>
                                <option value="子女">子女</option>
                                <option value="兄弟姊妹">兄弟姊妹</option>
                                <option value="鄰居" selected>鄰居</option>
                                <option value="其他">其他</option>
                              <?php }else if($record_carer['relation'] == '其他'){ ?>
                                <option></option>
                                <option value="父母">父母</option>
                                <option value="子女">子女</option>
                                <option value="兄弟姊妹">兄弟姊妹</option>
                                <option value="鄰居">鄰居</option>
                                <option value="其他" selected>其他</option>
                              <?php }else{ ?>
                                <option></option>
                                <option value="父母">父母</option>
                                <option value="子女">子女</option>
                                <option value="兄弟姊妹">兄弟姊妹</option>
                                <option value="鄰居">鄰居</option>
                                <option value="其他">其他</option>
                              <?php } ?>
                            </select>
                            </div>
                        <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'>教育程度</label>
                        <div class='col-md-4 '>
                          <select name='carer_education' class="form-select " >
                            <?php if($record_carer['education'] == '0'){ ?>
                              <option></option>
                              <option value="0" selected>不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '0*'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*" selected>識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '6'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6" selected>國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '9'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9" selected>國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '12'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12" selected>高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '6*'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*" selected>特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '9*'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*" selected>特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '12*'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*" selected>特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '14'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14" selected>五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '16'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16" selected>大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '18'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18" selected>研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php }else if($record_carer['education'] == '其他'){ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他" selected>其他</option>
                            <?php }else{ ?>
                              <option></option>
                              <option value="0">不識字</option>
                              <option value="0*">識字，未受正規教育</option>
                              <option value="6">國小</option>
                              <option value="9">國中</option>
                              <option value="12">高中(職)</option>
                              <option value="6*">特教班-國小</option>
                              <option value="9*">特教班-國中</option>
                              <option value="12*">特教班-高中職</option>
                              <option value="14">五專</option>
                              <option value="16">大學(二三專)</option>
                              <option value="18">研究所以上</option> 
                              <option value="其他">其他</option>
                            <?php } ?>
                          </select>
                          </div> 
                      </div>
                      <div class="mb-4 row" style='justify-content: space-evenly'>
                        <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;width:125px;'>有無聘用看護</label>
                          <div class='col-md-4 '>
                            <select name='caretaker' class="form-select ">
                              <?php if($record_carer['caretaker'] == '有'){ ?>
                                <option></option>
                                <option value="有" selected>有</option>
                                <option value="無">無</option>
                              <?php }else if($record_carer['caretaker'] == '無'){ ?>
                                <option></option>
                                <option value="有">有</option>
                                <option value="無" selected>無</option>
                              <?php }else{ ?>
                                <option></option>
                                <option value="有">有</option>
                                <option value="無">無</option>
                              <?php } ?>
                            </select>
                          </div>
                          <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'> </label>
                          <div class='col-md-4 '></div>
                      </div>
                        <div class="mt-2" style='text-align:right;'>
                          <?php if(isset($record_revise['id']) && isset($record_carer['id'])){ ?>
                            <p style="display:inline-block;">上次修改時間&nbsp;&nbsp;<?php echo $record_revise['date'] ?>&nbsp;&nbsp;</p>
                            <button type="submit" class="btn btn-primary me-2">修改</button>
                          <?php }elseif(isset($record_carer['id'])){?>
                            <button type="submit" class="btn btn-primary me-2">修改</button>
                          <?php }
                          else if(isset($_SESSION['id'])){ ?>
                            <button type="submit" class="btn btn-primary me-2">新增</button>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
          <?php }else{ 
            if(empty($record_carer['id'])){?>
            <script>
                swal({
                  title:'尚未建檔',
                  text:'請先填寫照顧者資料',
                  icon:'info',
                })
              </script>
              <?php } ?>
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
                        <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">照顧者資料</span></h3>
                        <div class="mb-4 row " style='justify-content: space-evenly'>
                          <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>姓名</label>
                          <div class='col-md-4 ' >
                            <input class="form-control" type="text" name="carer_name" required="required" value="<?php echo $record_carer['name'] ?>" readonly>
                          </div>
                          <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>性別</label>
                          <div class='col-md-4'>
                              <input class="form-control" type="text"  name="gender" value="<?php echo $record_carer['gender'] ?>" readonly>
                          </div>
                        </div>
                        <div class="mb-4 row" style='justify-content: space-evenly'>
                          <label  class=' col-form-label' style='font-size:16px;text-align:center;width:125px;'>聯絡電話</label>
                          <div class='col-md-4 '>
                            <input class="form-control" type="tel" name='carer_phone' value="<?php echo $record_carer['phone'] ?>" readonly>
                          </div>
                          <label  class='col-form-label' style='font-size:16px;text-align:center;width:90px;'>職業</label>
                          <div class='col-md-4 '>
                            <input class="form-control" type="tel" name='carer_job' value="<?php echo $record_carer['job'] ?>" readonly>
                          </div>
                        </div>
                        <div class="mb-4 row" style='justify-content: space-evenly'>
                          <label  class='col-md-2 col-form-label' style='font-size:16px;;text-align:center;width:125px;'>與個案關係</label>
                            <div class='col-md-4 '>                            
                              <input class="form-control" type="text" name='carer_relation' value="<?php echo $record_carer['relation'] ?>" readonly>
                            </div>
                          <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'>教育程度</label>
                          <div class='col-md-4 '>
                            <input class="form-control" type="text" name='carer_education' 
                            value="<?php if($record_carer['education'] == '0'){echo '不識字';} 
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
                              ?>" readonly>
                          </div>
                        </div>
                        <div class="mb-4 row" style='justify-content: space-evenly'>
                          <label  class='col-md-2 col-form-label' style='font-size:16px;text-align:center;width:125px;'>有無聘用看護</label>
                            <div class='col-md-4 '>
                            <input class="form-control" type="text" name='caretaker' value="<?php echo $record_carer['caretaker'] ?>" readonly>
                            </div>
                            <label  class=' col-form-label' style='font-size:16px;;text-align:center;width:90px;'> </label>
                            <div class='col-md-4 '>
                            </div>
                        </div>
                          <div class="mt-2" style='text-align:right;'>
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
            </form>
          <?php } ?>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
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
