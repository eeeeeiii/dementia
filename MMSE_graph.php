<?php
    session_start();
    $id=$_SESSION['id'];
    $link = mysqli_connect("localhost", "root", "", "subject");
  
    $sql = "SELECT id, name FROM patient_basic where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result); 
  
    $sql_mmse = "SELECT * FROM mmse where id='$id'";
    $result_mmse = mysqli_query($link, $sql_mmse);

    $sql_mmse_id = "SELECT id FROM mmse where id='$id'";
    $result_mmse_id = mysqli_query($link, $sql_mmse_id);
    $record_mmse_id = mysqli_fetch_assoc($result_mmse_id);

    $sql_mmse_act = "SELECT * FROM mmse_action where id='$id'";
    $result_mmse_act = mysqli_query($link, $sql_mmse_act);

    $sql_mmse_7 = "SELECT * FROM mmse_attention_and_calculation where id='$id'";
    $result_mmse_7 = mysqli_query($link, $sql_mmse_7); 
   
    $sql_mmse_build = "SELECT * FROM mmse_build where id='$id'";
    $result_mmse_build = mysqli_query($link, $sql_mmse_build);
  
    $sql_mmse_place = "SELECT * FROM mmse_place where id='$id'";
    $result_mmse_place = mysqli_query($link, $sql_mmse_place);
   
    $sql_mmse_recall = "SELECT * FROM mmse_recall where id='$id'";
    $result_mmse_recall = mysqli_query($link, $sql_mmse_recall);
   
    $sql_mmse_reg = "SELECT * FROM mmse_registration where id='$id'";
    $result_mmse_reg = mysqli_query($link, $sql_mmse_reg);
   
    $sql_mmse_time = "SELECT * FROM mmse_time where id='$id'";
    $result_mmse_time = mysqli_query($link, $sql_mmse_time);
   
    $sql_lan_name = "SELECT * FROM mmse_lan_name where id='$id'";
    $result_lan_name = mysqli_query($link, $sql_lan_name);
   
    $sql_lan_read= "SELECT * FROM mmse_lan_read where id='$id'";
    $result_lan_read = mysqli_query($link, $sql_lan_read);
   
    $sql_lan_repeat= "SELECT * FROM mmse_lan_repeat where id='$id'";
    $result_lan_repeat = mysqli_query($link, $sql_lan_repeat);
   
    $sql_lan_write= "SELECT * FROM mmse_lan_write where id='$id'";
    $result_lan_write = mysqli_query($link, $sql_lan_write);

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
    <title>MMSE簡易智能檢查_可視化圖表</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
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
            <li class="menu-item active open">
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
                <li class="menu-item active">
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

          <?php 
          if(empty($record_mmse_id['id'])){ ?>
            <?php if($record_user['psychologist'] == 1){ ?>
              <script>
                  swal({ 
                  title:'查無資料',
                  icon: 'info',
                  text:'請先新增量表資料',
                }).then(function(){
                    document.location.href="MMSE_insert.php"; 
                  });
              </script>
            <?php }elseif($record_user['personal_manager'] == 1 || $record_user['doctor'] == 1 || $record_user['nurse'] == 1){ ?>
              <script>
                  swal({
                  title:'查無資料',
                  icon: 'info',
                  text:'請先新增量表資料',
                }).then(function(){
                    document.location.href="MMSE_look.php"; 
                  });
              </script>
            <?php } } ?>

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">MMSE資料圖表</span></h3>
                      <div class="mt-3" style='text-align:center;'>
                       <!-- Default Offcanvas -->
                       <div class="mt-3">
                          <button
                            class="btn btn-primary"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasStart"
                            aria-controls="offcanvasStart"
                            style="width:180px;font-size:17px"
                          >選擇欄位
                          </button>
                        </div>
                      </div>

                      <!-- Default Offcanvas -->
                      <div class="col-lg-3 col-md-6">
                      <div class="mt-3">
                          <div
                            class="offcanvas offcanvas-start"
                            tabindex="-1"
                            id="offcanvasStart"
                            aria-labelledby="offcanvasStartLabel"
                            style="width:380px"
                          >
                            <div class="offcanvas-header">
                              <h3 id="offcanvasStartLabel" class="offcanvas-title">MMSE資料欄位</h3>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="offcanvas-body my-auto mx-0 flex-grow-0" >
                              

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_total" id='mmse_total' autocomplete="off" />
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_total">MMSE總分</label>                                                                       

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_time" id='mmse_time'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_time" >定向感-時間</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_place" id='mmse_place'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_place" >定向感-地方</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_registration" id='mmse_registration'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_registration" >注意力-信息登入</label>    
                            
                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_7" id='mmse_7'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_7" >注意力-系列減七</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_recall" id='mmse_recall'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_recall" >注意力-回憶</label>    
                              
                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_lan_name" id='mmse_lan_name'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_lan_name" >語言-命名</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_lan_repeat" id='mmse_lan_repeat'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_lan_repeat" >語言-複誦</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_lan_read" id='mmse_lan_read'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_lan_read" >語言-閱讀理解</label>    

                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_lan_write" id='mmse_lan_write'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_lan_write" >語言-書寫造句</label>
                              
                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_action" id='mmse_action'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_action" >口語理解及行用能力</label>
                            
                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse_build" id='mmse_build'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse_build" >建構力</label> 
                              
                          <br>
                          <button type="submit" class="btn btn-primary mb-2 d-grid w-100" onclick="show()">查看</button> 
                          <button
                                type="button"
                                class="btn btn-outline-secondary d-grid w-100"
                                data-bs-dismiss="offcanvas"
                              >
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    

                      <div  style='justify-content: center'>
                            <!-- Checkbox -->



                        <script type="text/javascript">
                          function show() {
                              obj = document.getElementsByName("checkboxs");
                              check_value = [];
                              for (i in obj) {
                                  if (obj[i].checked)
                                      check_value.push(obj[i].value);
                              }
                              var location="MMSE_graph.php?value="+check_value;
                              window.location.href=location;
                          }
                        </script>

                        <?php 
                        $value=$_GET['value'];
                        if(isset($value)){
                          $value_array=explode(",",$value);
                          $number=count($value_array);
                        }
                        
                        $mmse_score=array(array());
                        $num=array(array());
                       
                        $title=array();
                        for($t=0;$t<$number;$t++){
                        if($value_array[$t]=='mmse_action'){array_push($title,'口語理解及行用能力'); }
                        elseif($value_array[$t]=='mmse_build')  {array_push($title,'建構力'); }
                        elseif($value_array[$t]=='mmse_time'){array_push($title,'定向感-時間'); }
                        elseif($value_array[$t]=='mmse_place'){array_push($title,'定向感-地方'); }
                        elseif($value_array[$t]=='mmse_registration'){array_push($title,'注意力-信息登入'); }
                        elseif($value_array[$t]=='mmse_7'){array_push($title,'注意力-系列減七'); }
                        elseif($value_array[$t]=='mmse_recall'){array_push($title,'注意力-回憶'); }
                        elseif($value_array[$t]=='mmse_lan_name'){array_push($title,'語言-命名'); }
                        elseif($value_array[$t]=='mmse_lan_repeat'){array_push($title,'語言-複誦'); }
                        elseif($value_array[$t]=='mmse_lan_read'){array_push($title,'語言-閱讀理解'); }
                        elseif($value_array[$t]=='mmse_lan_write'){array_push($title,'語言-書寫造句'); }
                        elseif($value_array[$t]=='mmse_total'){array_push($title,'MMSE總分'); }
                        }?>
                  <h4><b><?php print_r(implode(", ",$title));?></h4>
                        
                  <?php      
                  for($j=0;$j<$number;$j++){
                    if($value_array[$j]=='mmse_total'){
                      while ($record_mmse = mysqli_fetch_assoc($result_mmse)) {
                          $mmse_score[$j][]=$record_mmse['total'];
                          $time=date('Y_m_d', strtotime($record_mmse['date']));
                          $num[$j][] = $time;
                        }
                      }
                    
                    elseif($value_array[$j]=='mmse_action'){
                      while ($record_mmse_act = mysqli_fetch_assoc($result_mmse_act)) {
                          $mmse_score[$j][]=$record_mmse_act['content'];
                          $time=date('Y_m_d', strtotime($record_mmse_act['date']));
                          $num[$j][] = $time;
                        }
                      }
                                
                      elseif($value_array[$j]=='mmse_build'){
                        while($record_build= mysqli_fetch_assoc($result_mmse_build)){
                          $mmse_score[$j][]=$record_build['content'];
                          $time=date('Y_m_d', strtotime($record_build['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_time'){
                        while($record_time = mysqli_fetch_assoc($result_mmse_time)){
                          $mmse_score[$j][]=$record_time['content'];
                          $time=date('Y_m_d', strtotime($record_time['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_place'){
                        while($record_place = mysqli_fetch_assoc($result_mmse_place)){
                          $mmse_score[$j][]=$record_place['content'];
                          $time=date('Y_m_d', strtotime($record_place['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_registration'){
                        while($record_reg = mysqli_fetch_assoc($result_mmse_reg)){
                          $mmse_score[$j][]=$record_reg['content'];
                          $time=date('Y_m_d', strtotime($record_reg['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_7'){
                        while($record_7 = mysqli_fetch_assoc($result_mmse_7)){
                          $mmse_score[$j][]=$record_7['content'];
                          $time=date('Y_m_d', strtotime($record_7['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_recall'){
                        while($record_recall = mysqli_fetch_assoc($result_mmse_recall)){
                          $mmse_score[$j][]=$record_recall['content'];
                          $time=date('Y_m_d', strtotime($record_recall['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_lan_name'){
                        while($record_lan_name = mysqli_fetch_assoc($result_lan_name)){
                          $mmse_score[$j][]=$record_lan_name['content'];
                          $time=date('Y_m_d', strtotime($record_lan_name['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_lan_repeat'){
                        while($record_lan_repeat = mysqli_fetch_assoc($result_lan_repeat)){
                          $mmse_score[$j][]=$record_lan_repeat['content'];
                          $time=date('Y_m_d', strtotime($record_lan_repeat['date']));
                          $num[$j][] = $time;
                        }
                      }  
                      elseif($value_array[$j]=='mmse_lan_read'){
                        while($record_lan_read = mysqli_fetch_assoc($result_lan_read)){
                          $mmse_score[$j][]=$record_lan_read['content'];
                          $time=date('Y_m_d', strtotime($record_lan_read['date']));
                          $num[$j][] = $time;
                        }
                      }
                      elseif($value_array[$j]=='mmse_lan_write'){
                        while($record_lan_write = mysqli_fetch_assoc($result_lan_write)){
                          $mmse_score[$j][]=$record_lan_write['content'];
                          $time=date('Y_m_d', strtotime($record_lan_write['date']));
                          $num[$j][] = $time;
                        }
                      }     
                    }   
            ?>
            
            <div id="container" style="height: 500%"></div>
            <body style="height: 500%; margin:30">
                <script type="text/javascript">
                    var today = new Date();
                    var year = today.getFullYear().toString();
                    var month = (today.getMonth() + 1).toString().padStart(2, '0');
                    var day = today.getDate().toString().padStart(2, '0');
                    var formattedDate = year + month + day;
                  <?php  
                  for($i=0;$i<$number;$i++){?>
                  var dom = document.getElementById('container');
                  var myChart = echarts.init(dom, null, {
                      renderer: 'canvas',
                      useDirtyRect: false
                      });
                      var app = {};
                      var option;
                      option = {
                      tooltip: {
                        trigger: 'axis'
                      },
                      legend: {},
                      toolbox: {
                        show: true,
                        feature: {
                          dataZoom: {
                            yAxisIndex: 'none'
                          },
                          dataView: { readOnly: false },
                          magicType: { type: ['line', 'bar'] },
                          restore: {},
                          saveAsImage: {
                            name:'<?php echo $record['name']?>'+ '_MMSE量表_' + formattedDate,

                          }
                        }
                      },
                      xAxis: {
                          type: 'category',
                          boundaryGap: false,
                          data: [<?php print_r(implode(",",$num[0]))?>], 
                      },
                      yAxis: {
                        type: 'value',
                        minInterval:1,
                        axisLabel: {
                          formatter: '{value}分'
                        }
                      },
                      series:[
                        {
                          name: '<?php echo $value_array[$i]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[$i])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }]
                          }
                        },
                        <?php if($i>=1){?>
                        {
                          name: '<?php echo $value_array[0]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[0])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=2){?>
                        {
                          name: '<?php echo $value_array[1]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[1])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=3){?>
                        {
                          name: '<?php echo $value_array[2]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[2])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=4){?>
                        {
                          name: '<?php echo $value_array[3]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[3])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=5){?>
                        {
                          name: '<?php echo $value_array[4]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[4])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=6){?>
                        {
                          name: '<?php echo $value_array[5]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[5])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=7){?>
                        {
                          name: '<?php echo $value_array[6]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[6])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=8){?>
                        {
                          name: '<?php echo $value_array[7]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[7])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=9){?>
                        {
                          name: '<?php echo $value_array[8]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[8])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                        <?php if($i>=10){?>
                        {
                          name: '<?php echo $value_array[9]?>',
                          type: 'line',
                          data: [<?php print_r(implode(",",$mmse_score[9])) ?>],
                          markPoint: {
                            data: [
                              { type: 'max', name: 'Max' },
                              { type: 'min', name: 'Min' }
                            ]
                          },
                          markLine: {
                            data: [{ type: 'average', name: 'Avg' }],
                          }
                        },
                        <?php }?>
                      ]
                    };

                      if (option && typeof option === 'object') {
                        myChart.setOption(option);
                      }

                      window.addEventListener('resize', myChart.resize);
                      <?php }?>
                    </script>
                    </body>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
