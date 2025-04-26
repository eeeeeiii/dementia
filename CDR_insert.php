<?php
  session_start();
  $id=$_SESSION['id'];
  $link = mysqli_connect("localhost", "root", "", "subject");

  $sql = "SELECT id, name FROM patient_basic where id='$id'";
  $result = mysqli_query($link, $sql);
  $record = mysqli_fetch_assoc($result); 

  $sql_cdr = "SELECT * FROM cdr where id='$id'";
  $result_cdr = mysqli_query($link, $sql_cdr);
  $record_cdr = mysqli_fetch_assoc($result_cdr);

  $sql_cdr_mem = "SELECT * FROM cdr_memory where id='$id'";
  $result_cdr_mem = mysqli_query($link, $sql_cdr_mem);
  $record_mem = mysqli_fetch_assoc($result_cdr_mem);

  $sql_cdr_ori = "SELECT * FROM cdr_orientation where id='$id'";
  $result_cdr_ori = mysqli_query($link, $sql_cdr_ori);
  $record_ori = mysqli_fetch_assoc($result_cdr_ori);

  $sql_cdr_jug = "SELECT * FROM cdr_judgment_and_problem_solving where id='$id'";
  $result_cdr_jug = mysqli_query($link, $sql_cdr_jug);
  $record_jug = mysqli_fetch_assoc($result_cdr_jug);

  $sql_cdr_com = "SELECT * FROM cdr_community_affairs where id='$id'";
  $result_cdr_com = mysqli_query($link, $sql_cdr_com);
  $record_com = mysqli_fetch_assoc($result_cdr_com);

  $sql_cdr_home = "SELECT * FROM cdr_home_and_hobbies where id='$id'";
  $result_cdr_home = mysqli_query($link, $sql_cdr_home);
  $record_home = mysqli_fetch_assoc($result_cdr_home);

  $sql_cdr_per = "SELECT * FROM cdr_personal_care where id='$id'";
  $result_cdr_per = mysqli_query($link, $sql_cdr_per);
  $record_per = mysqli_fetch_assoc($result_cdr_per);

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
    <title>CDR失智評分量表_新增</title>
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
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
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
            <li class="menu-item active open">
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
                <li class="menu-item active">
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
        
          <script type="text/javascript">
             function sum(){
              //取得所選的六個分數
              var mem=document.getElementById("memory");
              var mem_scroe = mem.options[mem.selectedIndex].value;

              var ori=document.getElementById("orientation");
              var ori_scroe = ori.options[ori.selectedIndex].value;
              
              var jug=document.getElementById("jugment");
              var jug_scroe = jug.options[jug.selectedIndex].value;

              var com=document.getElementById("community");
              var com_scroe = com.options[com.selectedIndex].value;

              var home=document.getElementById("home");
              var home_scroe = home.options[home.selectedIndex].value;

              var personal=document.getElementById("personal");
              var personal_scroe = personal.options[personal.selectedIndex].value;

              //加總
              var sum=parseFloat(mem_scroe)+parseFloat(ori_scroe)+parseFloat(jug_scroe)+parseFloat(com_scroe)+parseFloat(home_scroe)+parseFloat(personal_scroe);
              //顯示
              document.getElementById("sum_cox_box").innerHTML=sum;
              }
          </script>
          
          <form action="insert.php" method="POST">
          <input type="hidden" name="insert" value="cdr">
          <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">新增CDR失智評分量表</span></h3>
                        <div class="row  align-items-end">
                          <div class="mb-3 col-md-9" style="text-align:center;"></div>
                          <div class="mb-3 col-md-1" style="text-align:center;">
                            <label for="email" class="form-label" style='font-size:16px;'>受測日期</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <input type="date" class="form-control" name="cdr_record_time">
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label class="form-label" style='font-size:16px;'>記憶力</label>
                          </div>
                          <div class="mb-3 col-md-2 ">
                            <select name="cdr_memory" class="select2 form-select" id="memory" onchange="sum()">
                              <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <label for="currency" class="form-label">&nbsp;</label>
                            <input class="form-control" type="text" name="cdr_memory_text" placeholder="說明">
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label  class="form-label" style="font-size:16px;">定向感</label>
                          </div>
                          <div class="mb-3 col-md-2 ">
                            <select name="cdr_orientation" class="select2 form-select" id="orientation" onchange="sum()">
                              <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                          <label for="currency" class="form-label">&nbsp;</label>
                            <input type="text" class="form-control" name="cdr_orientation_text" placeholder="說明">
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label class="form-label" style="font-size:16px;">解決問題能力</label>
                          </div>  
                          <div class="mb-3 col-md-2">
                            <div class="input-group input-group-merge">
                              <select name="cdr_judgment_and_problem_solving" class="select2 form-select"id="jugment" onchange="sum()">
                                <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3 col-md-8">
                             <label for="currency" class="form-label">&nbsp;</label>
                            <input type="text" class="form-control" name="cdr_judgment_and_problem_solving_text" placeholder="說明" >
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label for="state" class="form-label" style="font-size:16px;">社區活動能力</label>
                          </div>  
                          <div class="mb-3 col-md-2">
                            <select name="cdr_community_affairs" class="select2 form-select" id="community" onchange="sum()">
                              <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8" style="text-align:center;">
                            <label for="currency" class="form-label">&nbsp;</label>
                            <input type="text" class="form-control" name="cdr_community_affairs_text" placeholder="說明">
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label class="form-label" for="country" style="font-size:16px;">居家嗜好</label>
                          </div>  
                          <div class="mb-3 col-md-2">
                            <select name="cdr_home_and_hobbies" class="select2 form-select" id="home" onchange="sum()">
                              <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <label for="currency" class="form-label">&nbsp;</label>
                            <input type="text" class="form-control" name="cdr_home_and_hobbies_text" placeholder="說明">
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;">
                            <label for="timeZones" class="form-label" style="font-size:16px;">自我照料</label>
                            </div>  
                          <div class="mb-3 col-md-2">
                            <select name="cdr_personal_care" class="select2 form-select" id="personal" onchange="sum()">
                              <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <label for="currency" class="form-label">&nbsp;</label>
                            <input type="text" class="form-control" name="cdr_personal_care_text" placeholder="說明">
                          </div>
                              <div class="mb-3 mt-2 col-md-2" style="text-align:center;">
                                <label class="form-label" style="font-size:16px;">總分</label>
                                <h4 id=sum_cox_box>0</h4>
                              </div>
                              <div class="mb-3 mt-2 col-md-8">
                                <label class="form-label" style="font-size:16px;">總結</label>
                                <input type="text" class="form-control" name="cdr_freetyping" placeholder="總結">
                              </div>
                              <div class="mb-3 col-md-2 mt-2" >
                              <label class="form-label"  style="font-size:16px;">CDR判分</label>
                              <select class="select2 form-select" name="cdr_rating">                   
                                <option value="0">0分</option>
                                <option value="0.5">0.5分</option>
                                <option value="1">1分</option>
                                <option value="2">2分</option>
                                <option value="3">3分</option>
                              </select>
                            </div>
                        </div>
                        <div class="mt-2" style='text-align:right;'>
                          <button type="submit" class="btn btn-primary me-2" style="font-size:16px;">新增</button>
                        </div>
                      </form>
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
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
