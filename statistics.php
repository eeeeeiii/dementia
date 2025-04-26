<?php
use Matrix\Operators\Division;

    session_start();
    $id=$_SESSION['id'];
    $link = mysqli_connect("localhost", "root", "", "subject");
  
    $sql = "SELECT id, name , hsex FROM patient_basic where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result); 
    
    //Blood_total
    $sql_blood = "SELECT blood.* ,patient_basic.hsex FROM `blood` INNER JOIN patient_basic ON blood.id=patient_basic.id;";
    $result_blood = mysqli_query($link, $sql_blood);
    //Blood_pati
    $sql_blood_pati = "SELECT * FROM blood where id='$id' order by date desc ";
    $result_blood_pati = mysqli_query($link, $sql_blood_pati);
    $record_blood_pati = mysqli_fetch_assoc($result_blood_pati);

    //personal-CDR
    $sql_cdr = "SELECT * FROM cdr where id='$id' order by date desc";
    $result_cdr = mysqli_query($link, $sql_cdr);
    $record_cdr_per = mysqli_fetch_assoc($result_cdr);

    $sql_cdr_mem = "SELECT * FROM cdr_memory where id='$id' order by date desc";
    $result_cdr_mem = mysqli_query($link, $sql_cdr_mem);
    $record_mem_per = mysqli_fetch_assoc($result_cdr_mem);

    $sql_cdr_ori = "SELECT * FROM cdr_orientation where id='$id' order by date desc";
    $result_cdr_ori = mysqli_query($link, $sql_cdr_ori);
    $record_ori_per = mysqli_fetch_assoc($result_cdr_ori);

    $sql_cdr_jug = "SELECT * FROM cdr_judgment_and_problem_solving where id='$id' order by date desc";
    $result_cdr_jug = mysqli_query($link, $sql_cdr_jug);
    $record_jug_per = mysqli_fetch_assoc($result_cdr_jug);

    $sql_cdr_com = "SELECT * FROM cdr_community_affairs where id='$id' order by date desc";
    $result_cdr_com = mysqli_query($link, $sql_cdr_com);
    $record_com_per = mysqli_fetch_assoc($result_cdr_com);

    $sql_cdr_home = "SELECT * FROM cdr_home_and_hobbies where id='$id' order by date desc";
    $result_cdr_home = mysqli_query($link, $sql_cdr_home);
    $record_home_per = mysqli_fetch_assoc($result_cdr_home);

    $sql_cdr_per = "SELECT * FROM cdr_personal_care where id='$id' order by date desc";
    $result_cdr_per = mysqli_query($link, $sql_cdr_per);
    $record_per_per = mysqli_fetch_assoc($result_cdr_per);

    //personal-MMSE
    $sql_mmse = "SELECT * FROM mmse where id='$id' order by date desc";
    $result_mmse = mysqli_query($link, $sql_mmse);
    $record_mmse_per = mysqli_fetch_assoc($result_mmse);
 
    $sql_mmse_act = "SELECT * FROM mmse_action where id='$id' order by date desc";
    $result_mmse_act = mysqli_query($link, $sql_mmse_act);
    $record_act_per = mysqli_fetch_assoc($result_mmse_act);
   
    $sql_mmse_7 = "SELECT * FROM mmse_attention_and_calculation where id='$id' order by date desc";
    $result_mmse_7 = mysqli_query($link, $sql_mmse_7);
    $record_7_per = mysqli_fetch_assoc($result_mmse_7);
   
    $sql_mmse_build = "SELECT * FROM mmse_build where id='$id' order by date desc";
    $result_mmse_build = mysqli_query($link, $sql_mmse_build);
    $record_build_per = mysqli_fetch_assoc($result_mmse_build);
   
    $sql_mmse_place = "SELECT * FROM mmse_place where id='$id' order by date desc";
    $result_mmse_place = mysqli_query($link, $sql_mmse_place);
    $record_place_per = mysqli_fetch_assoc($result_mmse_place);
   
    $sql_mmse_recall = "SELECT * FROM mmse_recall where id='$id' order by date desc";
    $result_mmse_recall = mysqli_query($link, $sql_mmse_recall);
    $record_recall_per = mysqli_fetch_assoc($result_mmse_recall);
   
    $sql_mmse_reg = "SELECT * FROM mmse_registration where id='$id' order by date desc";
    $result_mmse_reg = mysqli_query($link, $sql_mmse_reg);
    $record_reg_per = mysqli_fetch_assoc($result_mmse_reg);
   
    $sql_mmse_time = "SELECT * FROM mmse_time where id='$id' order by date desc";
    $result_mmse_time = mysqli_query($link, $sql_mmse_time);
    $record_time_per = mysqli_fetch_assoc($result_mmse_time);
  
    $sql_lan_name = "SELECT * FROM mmse_lan_name where id='$id' order by date desc";
    $result_lan_name = mysqli_query($link, $sql_lan_name);
    $record_lan_name_per = mysqli_fetch_assoc($result_lan_name);
   
    $sql_lan_read= "SELECT * FROM mmse_lan_read where id='$id' order by date desc";
    $result_lan_read = mysqli_query($link, $sql_lan_read);
    $record_lan_read_per = mysqli_fetch_assoc($result_lan_read);
   
    $sql_lan_repeat= "SELECT * FROM mmse_lan_repeat where id='$id' order by date desc";
    $result_lan_repeat = mysqli_query($link, $sql_lan_repeat);
    $record_lan_repeat_per = mysqli_fetch_assoc($result_lan_repeat);
   
    $sql_lan_write= "SELECT * FROM mmse_lan_write where id='$id' order by date desc";
    $result_lan_write = mysqli_query($link, $sql_lan_write);
    $record_lan_write_per = mysqli_fetch_assoc($result_lan_write);


    //CDR
    $sql_cdr = "SELECT * FROM cdr ";
    $result_cdr = mysqli_query($link, $sql_cdr);
  
    $_SESSION['cdr_num_index'] = $record_cdr['num'];
  
    $sql_cdr_mem = "SELECT * FROM cdr_memory ";
    $result_cdr_mem = mysqli_query($link, $sql_cdr_mem);
  
    $sql_cdr_ori = "SELECT * FROM cdr_orientation ";
    $result_cdr_ori = mysqli_query($link, $sql_cdr_ori);
  
    $sql_cdr_jug = "SELECT * FROM cdr_judgment_and_problem_solving ";
    $result_cdr_jug = mysqli_query($link, $sql_cdr_jug);
  
    $sql_cdr_com = "SELECT * FROM cdr_community_affairs";
    $result_cdr_com = mysqli_query($link, $sql_cdr_com);
  
    $sql_cdr_home = "SELECT * FROM cdr_home_and_hobbies ";
    $result_cdr_home = mysqli_query($link, $sql_cdr_home);
  
    $sql_cdr_per = "SELECT * FROM cdr_personal_care";
    $result_cdr_per = mysqli_query($link, $sql_cdr_per);

    //MMSE
    $sql_mmse = "SELECT * FROM mmse";
    $result_mmse = mysqli_query($link, $sql_mmse);

    $_SESSION['mmse_num_index'] = $record_mmse['num'];

    $sql_mmse_act = "SELECT * FROM mmse_action ";
    $result_mmse_act = mysqli_query($link, $sql_mmse_act);

    $sql_mmse_7 = "SELECT * FROM mmse_attention_and_calculation ";
    $result_mmse_7 = mysqli_query($link, $sql_mmse_7);

    $sql_mmse_build = "SELECT * FROM mmse_build ";
    $result_mmse_build = mysqli_query($link, $sql_mmse_build);
    
    $sql_mmse_place = "SELECT * FROM mmse_place ";
    $result_mmse_place = mysqli_query($link, $sql_mmse_place);

    $sql_mmse_recall = "SELECT * FROM mmse_recall ";
    $result_mmse_recall = mysqli_query($link, $sql_mmse_recall);

    $sql_mmse_reg = "SELECT * FROM mmse_registration ";
    $result_mmse_reg = mysqli_query($link, $sql_mmse_reg);

    $sql_mmse_time = "SELECT * FROM mmse_time ";
    $result_mmse_time = mysqli_query($link, $sql_mmse_time);

    $sql_lan_name = "SELECT * FROM mmse_lan_name ";
    $result_lan_name = mysqli_query($link, $sql_lan_name);

    $sql_lan_read= "SELECT * FROM mmse_lan_read ";
    $result_lan_read = mysqli_query($link, $sql_lan_read);

    $sql_lan_repeat= "SELECT * FROM mmse_lan_repeat";
    $result_lan_repeat = mysqli_query($link, $sql_lan_repeat);

    $sql_lan_write= "SELECT * FROM mmse_lan_write ";
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
    <title>落點分析</title>
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
            <li class="menu-item active">
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
                  <div class="card" style="max-height:max-content">
                    <div class="card-body">
                      <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">統計圖表</span></h3>
                      <div class="mt-3" style='text-align:center;'>
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
                              <h3 id="offcanvasStartLabel" class="offcanvas-title">資料欄位</h3>
                              <button
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="offcanvas-body my-auto mx-0 flex-grow-0" >
                              
                              <!-- CDR -->
                              
                              <input type="checkbox" name="checkboxs" class="btn-check" value="cdr" id='cdr'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="cdr" >CDR量表</label>           
                           
                              <!-- MMSE -->
                              <br>
                              <input type="checkbox" name="checkboxs" class="btn-check" value="mmse" id='mmse'autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="mmse" >MMSE量表</label>

                              <br>
                              <!-- 血液資料 -->
                              <input type="checkbox" name="checkboxs" class="btn-check" value="blood" id='blood' autocomplete="off"/>
                              <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="blood">血液資料</label>

                              
                  
                              
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
                              var location="statistics.php?value="+check_value;
                              window.location.href=location;
                          }
                        
                          </script>  

                        <?php 
                          
                          $value=$_GET['value'];
                          if(isset($value)){
                            $value_array=explode(",",$value);
                            $number=count($value_array);
                          }

                          $cdr_title=[['CDR判分','記憶力','定向感','解決問題能力','社區活動能力','居家嗜好','自我照料'],['CDR總分']];
                          $mmse_title=[['定向感-時間','定向感-地方','注意力-信息登入','注意力-系列減七','回憶','建構力'],['語言-命名','語言-複誦','語言-閱讀理解','語言-書寫造句','口語理解及行用能力'],['MMSE總分']];

                          $blood_title=[['WBC','SEG','RBC','HGB','Platelet'],
                                        ['BUN','Creatinine','eGFR','Na','K','Ca'],
                                        ['GOT','GPT','BILIRUBIN_TOTAL','Blood_ammonia'],
                                        ['ALBUMIN','Folic_acid','Vit_B12'],
                                        ['Glucose_AC','HbA1c','CHOLESTEROL','TRIGLYCERIDE','LDL','HDL','URIC'],
                                        ['TSH','T3','T4','Free_T4'],
                                        ['RPR_VDRL_test'] ];


                          $cdr_score=array(array());
                          $cdr_score[0]=['欄位','0分','0.5分','1分','2分','3分'];
                          for($i=1;$i<=count($cdr_title[0]);$i++){
                            $cdr_score[$i][0]=$cdr_title[0][$i-1];
                          }

                          $cdr_total=array(array());
                          $cdr_total[0]=['欄位','0~2.5分','3~4分','4.5~9分','9.5~15.5分','16~18分'];
                          for($i=1;$i<=count($cdr_title[1]);$i++){
                            $cdr_total[$i][0]=$cdr_title[1][$i-1];
                          }

                          $mmse_score1=array(array());
                          $mmse_score1[0]=['欄位','0分','1分','2分','3分','4分','5分'];
                          for($i=1;$i<=count($mmse_title[0]);$i++){
                            $mmse_score1[$i][0]=$mmse_title[0][$i-1];
                          }

                          $mmse_score2=array(array());
                          $mmse_score2[0]=['欄位','0分','1分','2分','3分','4分','5分'];
                          for($i=1;$i<=count($mmse_title[1]);$i++){
                            $mmse_score2[$i][0]=$mmse_title[1][$i-1];
                          }

                          $mmse_total=array(array());
                          $mmse_total[0]=['欄位','0~15分','16~17分','18~24分','25~30分'];
                          for($i=1;$i<=count($mmse_title[2]);$i++){
                            $mmse_total[$i][0]=$mmse_title[2][$i-1];
                          }

                          $blood_score1=array(array());
                          $blood_score1[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[0]);$i++){
                            $blood_score1[$i][0]=$blood_title[0][$i-1];
                          }
                          $blood_score2=array(array());
                          $blood_score2[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[1]);$i++){
                            $blood_score2[$i][0]=$blood_title[1][$i-1];
                          }
                          $blood_score3=array(array());
                          $blood_score3[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[2]);$i++){
                            $blood_score3[$i][0]=$blood_title[2][$i-1];
                          }
                          $blood_score4=array(array());
                          $blood_score4[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[3]);$i++){
                            $blood_score4[$i][0]=$blood_title[3][$i-1];
                          }
                          $blood_score5=array(array());
                          $blood_score5[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[4]);$i++){
                            $blood_score5[$i][0]=$blood_title[4][$i-1];
                          }
                          $blood_score6=array(array());
                          $blood_score6[0]=['欄位','異常過低','正常','異常過高'];
                          for($i=1;$i<=count($blood_title[5]);$i++){
                            $blood_score6[$i][0]=$blood_title[5][$i-1];
                          }
                          $blood_score7=array(array());
                          $blood_score7[0]=['欄位','','正常','異常'];
                          for($i=1;$i<=count($blood_title[6]);$i++){
                            $blood_score7[$i][0]=$blood_title[6][$i-1];
                          }

                          //personsol_cdr
                          $personal_cdr=array(array());
                          $personal_cdr[0]=[0,1,2,3,4,5,6];
                          $personal_cdr[1]=[$record_cdr_per['cdr'],$record_mem_per['content'],$record_ori_per['content'],$record_jug_per['content'],$record_com_per['content'],$record_home_per['content'],$record_per_per['content']];
                          $personal_total=array();
                          if(isset($personal_cdr[1][0])){
                          if($record_cdr_per['sum_of_box']>=0 && $record_cdr_per['sum_of_box']<=2.5){
                            array_push($personal_total,5);
                          }
                          if($record_cdr_per['sum_of_box']>=3 && $record_cdr_per['sum_of_box']<=4){
                            array_push($personal_total,1);
                          }
                          if($record_cdr_per['sum_of_box']>=4.5 && $record_cdr_per['sum_of_box']<=9){
                            array_push($personal_total,2);
                          }
                          if($record_cdr_per['sum_of_box']>=9.5 && $record_cdr_per['sum_of_box']<=15.5){
                            array_push($personal_total,3);
                          }
                          if($record_cdr_per['sum_of_box']>=16 && $record_cdr_per['sum_of_box']<=18){
                            array_push($personal_total,4);
                          }
                        }
                          $personal_cdr_0=array();
                          $personal_cdr_05=array();
                          $personal_cdr_1=array();
                          $personal_cdr_2=array();
                          $personal_cdr_3=array();
                          if(isset($personal_cdr[1][0])){
                          for($i=0;$i<count($personal_cdr[1]);$i++){
                            if($personal_cdr[1][$i]==0){
                              array_push($personal_cdr_0,$personal_cdr[0][$i]);
                            }
                            elseif($personal_cdr[1][$i]==0.5){
                              array_push($personal_cdr_05,$personal_cdr[0][$i]);
                            }
                            elseif($personal_cdr[1][$i]==1){
                              array_push($personal_cdr_1,$personal_cdr[0][$i]);
                            }
                            elseif($personal_cdr[1][$i]==2){
                              array_push($personal_cdr_2,$personal_cdr[0][$i]);
                            }
                            elseif($personal_cdr[1][$i]==3){
                              array_push($personal_cdr_3,$personal_cdr[0][$i]);
                            }
                          }
                        }
                        //personal_mmse
                        $personal_mmse1=array(array());
                        $personal_mmse2=array(array());
                        $personal_mmse1[0]=[0,1,2,3,4,5,6];
                        $personal_mmse2[0]=[0,1,2,3,4];
                        $personal_mmse1[1]=[$record_time_per['content'],$record_place_per['content'],$record_reg_per['content'],$record_7_per['content'],$record_recall_per['content'],$record_build_per['content']];
                        $personal_mmse2[1]=[$record_lan_name_per['content'],$record_lan_repeat_per['content'],$record_lan_read_per['content'],$record_lan_write_per['content'],$record_act_per['content']];
                        $personal_mmse_total=array();

                        
                        if(isset($personal_mmse1[1][0]) && $record_mmse_per['total']>=0 && $record_mmse_per['total']<=15) {
                          array_push($personal_mmse_total,4);
                        }
                        if($record_mmse_per['total']>=16 && $record_mmse_per['total']<=17){
                          array_push($personal_mmse_total,1);
                        }
                        if($record_mmse_per['total']>=18 && $record_mmse_per['total']<=24){
                          array_push($personal_mmse_total,2);
                        }
                        if($record_mmse_per['total']>=25 && $record_mmse_per['total']<=30){
                          array_push($personal_mmse_total,3);
                        }
                        
                        
                        $personal_mmse1_0=array();
                        $personal_mmse1_1=array();
                        $personal_mmse1_2=array();
                        $personal_mmse1_3=array();
                        $personal_mmse1_4=array();
                        $personal_mmse1_5=array();

                        if(isset($personal_mmse1[1][0])){
                        for($i=0;$i<count($personal_mmse1[1]);$i++){
                          if($personal_mmse1[1][$i]==0){
                            array_push($personal_mmse1_0,$personal_mmse1[0][$i]);
                          }                 
                          elseif($personal_mmse1[1][$i]==1){
                            array_push($personal_mmse1_1,$personal_mmse1[0][$i]);
                          }
                          elseif($personal_mmse1[1][$i]==2){
                            array_push($personal_mmse1_2,$personal_mmse1[0][$i]);
                          }
                          elseif($personal_mmse1[1][$i]==3){
                            array_push($personal_mmse1_3,$personal_mmse1[0][$i]);
                          }
                          elseif($personal_mmse1[1][$i]==4){
                            array_push($personal_mmse1_4,$personal_mmse1[0][$i]);
                          }
                          elseif($personal_mmse1[1][$i]==5){
                            array_push($personal_mmse1_5,$personal_mmse1[0][$i]);
                          }
                        }
                      }
                        $personal_mmse2_0=array();
                        $personal_mmse2_1=array();
                        $personal_mmse2_2=array();
                        $personal_mmse2_3=array();
                        $personal_mmse2_4=array();
                        $personal_mmse2_5=array();

                        if(isset($personal_mmse2[1][0])){
                        for($i=0;$i<count($personal_mmse2[1]);$i++){
                          if($personal_mmse2[1][$i]==0){
                            array_push($personal_mmse2_0,$personal_mmse2[0][$i]);
                          }                       
                          elseif($personal_mmse2[1][$i]==1){
                            array_push($personal_mmse2_1,$personal_mmse2[0][$i]);
                          }
                          elseif($personal_mmse2[1][$i]==2){
                            array_push($personal_mmse2_2,$personal_mmse2[0][$i]);
                          }
                          elseif($personal_mmse2[1][$i]==3){
                            array_push($personal_mmse2_3,$personal_mmse2[0][$i]);
                          }
                          elseif($personal_mmse2[1][$i]==4){
                            array_push($personal_mmse2_4,$personal_mmse2[0][$i]);
                          }
                          elseif($personal_mmse2[1][$i]==5){
                            array_push($personal_mmse2_5,$personal_mmse2[0][$i]);
                          }
                        }
                      }
                        $personal_mmse_0_arr=[$personal_mmse1_0,$personal_mmse2_0];
                        $personal_mmse_1_arr=[$personal_mmse1_1,$personal_mmse2_1];
                        $personal_mmse_2_arr=[$personal_mmse1_2,$personal_mmse2_2];
                        $personal_mmse_3_arr=[$personal_mmse1_3,$personal_mmse2_3];
                        $personal_mmse_4_arr=[$personal_mmse1_4,$personal_mmse2_4];
                        $personal_mmse_5_arr=[$personal_mmse1_5,$personal_mmse2_5];
                        
                        //personal_blood
                        $personal_blood1=array(array());
                          $personal_blood2=array(array());
                          $personal_blood3=array(array());
                          $personal_blood4=array(array());
                          $personal_blood5=array(array());
                          $personal_blood6=array(array());
                          $personal_blood7=array(array());

                          
                          $personal_blood1[0]=[0,1,2,3,4];
                          $personal_blood2[0]=[0,1,2,3,4,5];
                          $personal_blood3[0]=[0,1,2,3];
                          $personal_blood4[0]=[0,1,2];
                          $personal_blood5[0]=[0,1,2,3,4,5,6];
                          $personal_blood6[0]=[0,1,2,3];
                          $personal_blood7[0]=[0];
                          //1
                          if($record_blood_pati['WBC']!=0){
                            if($record_blood_pati['WBC']<4.0){
                              $personal_blood1[1][0]="過低";
                            }elseif($record_blood_pati['WBC']>11.0){
                              $personal_blood1[1][0]="過高";
                            }else{
                              $personal_blood1[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['SEG']!=0){
                            if($record_blood_pati['SEG']>75.0){
                              $personal_blood1[1][1]="過高";
                            }else{
                              $personal_blood1[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['RBC']!=0){
                            if($record['hsex']=="男"){
                              if($record_blood_pati['RBC']<4.2){
                                $personal_blood1[1][2]="過低";
                              }elseif($record_blood_pati['RBC']>6.2){
                                $personal_blood1[1][2]="過高";
                              }else{
                                $personal_blood1[1][2]="正常";
                              }
                            }
                            elseif($record['hsex']=="女"){
                              if($record_blood_pati['RBC']<3.7){
                                $personal_blood1[1][2]="過低";
                              }elseif($record_blood_pati['RBC']>5.5){
                                $personal_blood1[1][2]="過高";
                              }else{
                                $personal_blood1[1][2]="正常";
                              }
                            }
                            else{
                              if($record_blood_pati['RBC']<3.7){
                                $personal_blood1[1][2]="過低";
                              }elseif($record_blood_pati['RBC']>6.2){
                                $personal_blood1[1][2]="過高";
                              }else{
                                $personal_blood1[1][2]="正常";
                              }
                            }
                          }
                          if($record_blood_pati['HGB']!=0){
                            if($record['hsex']=="男"){
                              if($record_blood_pati['HGB']<12.3){
                                $personal_blood1[1][3]="過低";
                              }elseif($record_blood_pati['HGB']>18.3){
                                $personal_blood1[1][3]="過高";
                              }else{
                                $personal_blood1[1][3]="正常";
                              }
                            }
                            elseif($record['hsex']=="女"){
                              if($record_blood_pati['HGB']<11.3){
                                $personal_blood1[1][3]="過低";
                              }elseif($record_blood_pati['HGB']>15.3){
                                $personal_blood1[1][3]="過高";
                              }else{
                                $personal_blood1[1][3]="正常";
                              }
                            }
                            else{
                              if($record_blood_pati['HGB']<11.3){
                                $personal_blood1[1][3]="過低";
                              }elseif($record_blood_pati['HGB']>18.3){
                                $personal_blood1[1][3]="過高";
                              }else{
                                $personal_blood1[1][3]="正常";
                              }
                            }
                            
                          }
                          if($record_blood_pati['Platelet']!=0){
                            if($record_blood_pati['Platelet']<150){
                              $personal_blood1[1][4]="過低";
                            }elseif($record_blood_pati['Platelet']>400){
                              $personal_blood1[1][4]="過高";
                            }else{
                              $personal_blood1[1][4]="正常";
                            }
                          }

                          //2
                          if($record_blood_pati['BUN']!=0){
                            if($record_blood_pati['BUN']<7){
                              $personal_blood2[1][0]="過低";
                            }elseif($record_blood_pati['BUN']>25){
                              $personal_blood2[1][0]="過高";
                            }else{
                              $personal_blood2[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['Creatinine']!=0){
                            if($record_blood_pati['Creatinine']<0.6){
                              $personal_blood2[1][1]="過低";
                            }elseif($record_blood_pati['Creatinine']>1.3){
                              $personal_blood2[1][1]="過高";
                            }else{
                              $personal_blood2[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['eGFR']!=0){
                            if($record_blood_pati['eGFR']<60){
                              $personal_blood2[1][2]="過低";
                            }
                            else{
                              $personal_blood2[1][2]="正常";
                            }
                          }
                          if($record_blood_pati['Na']!=0){
                            if($record_blood_pati['Na']<136){
                              $personal_blood2[1][3]="過低";
                            }elseif($record_blood_pati['Na']>145){
                              $personal_blood2[1][3]="過高";
                            }else{
                              $personal_blood2[1][3]="正常";
                            }
                          }
                          if($record_blood_pati['K']!=0){
                            if($record_blood_pati['K']<3.4){
                              $personal_blood2[1][4]="過低";
                            }elseif($record_blood_pati['K']>4.5){
                              $personal_blood2[1][4]="過高";
                            }else{
                              $personal_blood2[1][4]="正常";
                            }
                          }
                          if($record_blood_pati['Ca']!=0){
                            if($record_blood_pati['Ca']<8.6){
                              $personal_blood2[1][5]="過低";
                            }elseif($record_blood_pati['Ca']>10.3){
                              $personal_blood2[1][5]="過高";
                            }else{
                              $personal_blood2[1][5]="正常";
                            }
                          }

                          //3
                          if($record_blood_pati['GOT']!=0){
                            if($record_blood_pati['GOT']>40){
                              $personal_blood3[1][0]="過高";
                            }else{
                              $personal_blood3[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['GPT']!=0){
                            if($record_blood_pati['GPT']>40){
                              $personal_blood3[1][1]="過高";
                            }else{
                              $personal_blood3[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['BILIRUBIN_TOTAL']!=0){
                            if($record_blood_pati['BILIRUBIN_TOTAL']<0.3){
                              $personal_blood3[1][2]="過低";
                            }elseif($record_blood_pati['BILIRUBIN_TOTAL']>1.0){
                              $personal_blood3[1][2]="過高";
                            }else{
                              $personal_blood3[1][2]="正常";
                            }
                          }
                          if($record_blood_pati['Blood_ammonia']!=0){
                            if($record_blood_pati['Blood_ammonia']<25){
                              $personal_blood3[1][3]="過低";
                            }elseif($record_blood_pati['Blood_ammonia']>90){
                              $personal_blood3[1][3]="過高";
                            }else{
                              $personal_blood3[1][3]="正常";
                            }
                          }

                          //4
                          if($record_blood_pati['ALBUMIN']!=0){
                            if($record_blood_pati['ALBUMIN']<3.5){
                              $personal_blood4[1][0]="過低";
                            }elseif($record_blood_pati['ALBUMIN']>5.7){
                              $personal_blood4[1][0]="過高";
                            }else{
                              $personal_blood4[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['Folic_acid']!=0){
                            if($record_blood_pati['Folic_acid']<4.0){
                              $personal_blood4[1][1]="過低";
                            }else{
                              $personal_blood4[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['Vit_B12']!=0){
                            if($record_blood_pati['Vit_B12']<180){
                              $personal_blood4[1][2]="過低";
                            }elseif($record_blood_pati['Vit_B12']>914){
                              $personal_blood4[1][2]="過高";
                            }else{
                              $personal_blood4[1][2]="正常";
                            }
                          }

                          //5
                          if($record_blood_pati['Glucose_AC']!=0){
                            if($record_blood_pati['Glucose_AC']<70){
                              $personal_blood5[1][0]="過低";
                            }elseif($record_blood_pati['Glucose_AC']>100){
                              $personal_blood5[1][0]="過高";
                            }else{
                              $personal_blood5[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['HbA1c']!=0){
                            if($record_blood_pati['HbA1c']>6.0){
                              $personal_blood5[1][1]="過高";
                            }else{
                              $personal_blood5[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['CHOLESTEROL']!=0){
                            if($record_blood_pati['CHOLESTEROL']>200){
                              $personal_blood5[1][2]="過高";
                            }else{
                              $personal_blood5[1][2]="正常";
                            }
                          }
                          if($record_blood_pati['TRIGLYCERIDE']!=0){
                            if($record_blood_pati['TRIGLYCERIDE']>150){
                              $personal_blood5[1][3]="過高";
                            }else{
                              $personal_blood5[1][3]="正常";
                            }
                          }
                          if($record_blood_pati['LDL']!=0){
                            if($record_blood_pati['LDL']>130){
                              $personal_blood5[1][4]="過高";
                            }else{
                              $personal_blood5[1][4]="正常";
                            }
                          }
                          if($record_blood_pati['HDL']!=0){
                            if($record_blood_pati['HDL']<23){
                              $personal_blood5[1][5]="過低";
                            }elseif($record_blood_pati['HDL']>92){
                              $personal_blood5[1][5]="過高";
                            }else{
                              $personal_blood5[1][5]="正常";
                            }
                          }
                          if($record_blood_pati['URIC']!=0){
                            if($record['hsex']=="男"){
                              if($record_blood_pati['URIC']<4.4){
                                $personal_blood5[1][6]="過低";
                              }elseif($record_blood_pati['URIC']>7.6){
                                $personal_blood5[1][6]="過高";
                              }else{
                                $personal_blood5[1][6]="正常";
                              }
                            }
                            elseif($record['hsex']=="女"){
                              if($record_blood_pati['URIC']<2.3){
                                $personal_blood5[1][6]="過低";
                              }elseif($record_blood_pati['URIC']>6.6){
                                $personal_blood5[1][6]="過高";
                              }else{
                                $personal_blood5[1][6]="正常";
                              }
                            }
                            else{
                              if($record_blood_pati['URIC']<2.3){
                                $personal_blood5[1][6]="過低";
                              }elseif($record_blood_pati['URIC']>7.6){
                                $personal_blood5[1][6]="過高";
                              }else{
                                $personal_blood5[1][6]="正常";
                              }
                            }
                          }

                          //6
                          if($record_blood_pati['TSH']!=0){
                            if($record_blood_pati['TSH']<0.34){
                              $personal_blood6[1][0]="過低";
                            }elseif($record_blood_pati['TSH']>5.6){
                              $personal_blood6[1][0]="過高";
                            }else{
                              $personal_blood6[1][0]="正常";
                            }
                          }
                          if($record_blood_pati['T3']!=0){
                            if($record_blood_pati['T3']<0.7){
                              $personal_blood6[1][1]="過低";
                            }elseif($record_blood_pati['T3']>1.78){
                              $personal_blood6[1][1]="過高";
                            }else{
                              $personal_blood6[1][1]="正常";
                            }
                          }
                          if($record_blood_pati['T4']!=0){
                            if($record_blood_pati['T4']<5.1){
                              $personal_blood6[1][2]="過低";
                            }elseif($record_blood_pati['T4']>12.8){
                              $personal_blood6[1][2]="過高";
                            }else{
                              $personal_blood6[1][2]="正常";
                            }
                          }
                          if($record_blood_pati['Free_T4']!=0){
                            if($record_blood_pati['Free_T4']<0.59){
                              $personal_blood6[1][3]="過低";
                            }elseif($record_blood_pati['Free_T4']>1.45){
                              $personal_blood6[1][3]="過高";
                            }else{
                              $personal_blood6[1][3]="正常";
                            }
                          }

                        //7
                        if($record_blood_pati['RPR_VDRL_test']!=''){
                          if($record_blood_pati['RPR_VDRL_test']=='正常'){
                            $personal_blood7[1][0]="正常";
                          }elseif($record_blood_pati['RPR_VDRL_test']=='異常'){
                            $personal_blood7[1][0]="異常";
                          }
                        } 
                       
                        $personal_blood_low1=array(array());
                        $personal_blood_normal1=array(array());
                        $personal_blood_high1=array(array());
                        for($i=0;$i<count($personal_blood1[0]);$i++){
                          if($personal_blood1[1][$i]=="過低"){
                            $personal_blood_low1[0][]=$personal_blood1[0][$i];
                            $personal_blood_low1[1][]=$blood_title[0][$i];
                           // array_push($personal_blood_low1,$personal_blood1[0][$i]);
                          }
                          elseif($personal_blood1[1][$i]=="正常"){
                            $personal_blood_normal1[0][]=$personal_blood1[0][$i];
                            $personal_blood_normal1[1][]=$blood_title[0][$i];
                            //array_push($personal_blood_normal1,$personal_blood1[0][$i]);
                          }
                          elseif($personal_blood1[1][$i]=="過高"){
                            $personal_blood_high1[0][]=$personal_blood1[0][$i];
                            $personal_blood_high1[1][]=$blood_title[0][$i];
                            //array_push($personal_blood_high1,$personal_blood1[0][$i]);
                          }
                        }
                        $personal_blood_low2=array(array());
                        $personal_blood_normal2=array(array());
                        $personal_blood_high2=array(array());
                        for($i=0;$i<count($personal_blood2[0]);$i++){
                          if($personal_blood2[1][$i]=="過低"){
                            $personal_blood_low2[0][]=$personal_blood2[0][$i];
                            $personal_blood_low2[1][]=$blood_title[1][$i];
                            //array_push($personal_blood_low2,$personal_blood2[0][$i]);
                          }
                          elseif($personal_blood2[1][$i]=="正常"){
                            $personal_blood_normal2[0][]=$personal_blood2[0][$i];
                            $personal_blood_normal2[1][]=$blood_title[1][$i];
                            //array_push($personal_blood_normal2,$personal_blood2[0][$i]);
                          }
                          elseif($personal_blood2[1][$i]=="過高"){
                            $personal_blood_high2[0][]=$personal_blood2[0][$i];
                            $personal_blood_high2[1][]=$blood_title[1][$i];
                            //array_push($personal_blood_high2,$personal_blood2[0][$i]);
                          }
                        }
                        $personal_blood_low3=array(array());
                        $personal_blood_normal3=array(array());
                        $personal_blood_high3=array(array());
                        for($i=0;$i<count($personal_blood3[0]);$i++){
                          if($personal_blood3[1][$i]=="過低"){
                            $personal_blood_low3[0][]=$personal_blood3[0][$i];
                            $personal_blood_low3[1][]=$blood_title[2][$i];
                            //array_push($personal_blood_low3,$personal_blood3[0][$i]);
                          }
                          elseif($personal_blood3[1][$i]=="正常"){
                            $personal_blood_normal3[0][]=$personal_blood3[0][$i];
                            $personal_blood_normal3[1][]=$blood_title[2][$i];
                            //array_push($personal_blood_normal3,$personal_blood3[0][$i]);
                          }
                          elseif($personal_blood3[1][$i]=="過高"){
                            $personal_blood_high3[0][]=$personal_blood3[0][$i];
                            $personal_blood_high3[1][]=$blood_title[2][$i];
                            //array_push($personal_blood_high3,$personal_blood3[0][$i]);
                          }
                        }
                        $personal_blood_low4=array(array());
                        $personal_blood_normal4=array(array());
                        $personal_blood_high4=array(array());
                        for($i=0;$i<count($personal_blood4[0]);$i++){
                          if($personal_blood4[1][$i]=="過低"){
                            $personal_blood_low4[0][]=$personal_blood4[0][$i];
                            $personal_blood_low4[1][]=$blood_title[3][$i];
                            //array_push($personal_blood_low4,$personal_blood4[0][$i]);
                          }
                          elseif($personal_blood4[1][$i]=="正常"){
                            $personal_blood_normal4[0][]=$personal_blood4[0][$i];
                            $personal_blood_normal4[1][]=$blood_title[3][$i];
                            //array_push($personal_blood_normal4,$personal_blood4[0][$i]);
                          }
                          elseif($personal_blood4[1][$i]=="過高"){
                            $personal_blood_high4[0][]=$personal_blood4[0][$i];
                            $personal_blood_high4[1][]=$blood_title[3][$i];
                            //array_push($personal_blood_high4,$personal_blood4[0][$i]);
                          }
                        }
                        $personal_blood_low5=array(array());
                        $personal_blood_normal5=array(array());
                        $personal_blood_high5=array(array());
                        for($i=0;$i<count($personal_blood5[0]);$i++){
                          if($personal_blood5[1][$i]=="過低"){
                            $personal_blood_low5[0][]=$personal_blood5[0][$i];
                            $personal_blood_low5[1][]=$blood_title[4][$i];
                            //array_push($personal_blood_low5,$personal_blood5[0][$i]);
                          }
                          elseif($personal_blood5[1][$i]=="正常"){
                            $personal_blood_normal5[0][]=$personal_blood5[0][$i];
                            $personal_blood_normal5[1][]=$blood_title[4][$i];
                            //array_push($personal_blood_normal5,$personal_blood5[0][$i]);
                          }
                          elseif($personal_blood5[1][$i]=="過高"){
                            $personal_blood_high5[0][]=$personal_blood5[0][$i];
                            $personal_blood_high5[1][]=$blood_title[4][$i];
                            //array_push($personal_blood_high5,$personal_blood5[0][$i]);
                          }
                        }
                        $personal_blood_low6=array(array());
                        $personal_blood_normal6=array(array());
                        $personal_blood_high6=array(array());
                        for($i=0;$i<count($personal_blood6[0]);$i++){
                          if($personal_blood6[1][$i]=="過低"){
                            $personal_blood_low6[0][]=$personal_blood6[0][$i];
                            $personal_blood_low6[1][]=$blood_title[5][$i];
                            //array_push($personal_blood_low6,$personal_blood6[0][$i]);
                          }
                          elseif($personal_blood6[1][$i]=="正常"){
                            $personal_blood_normal6[0][]=$personal_blood6[0][$i];
                            $personal_blood_normal6[1][]=$blood_title[5][$i];
                            //array_push($personal_blood_normal6,$personal_blood6[0][$i]);
                          }
                          elseif($personal_blood6[1][$i]=="過高"){
                            $personal_blood_high6[0][]=$personal_blood6[0][$i];
                            $personal_blood_high6[1][]=$blood_title[5][$i];
                            //array_push($personal_blood_high6,$personal_blood6[0][$i]);
                          }
                        }

                        $personal_blood_low7=array(array());
                        $personal_blood_normal7=array(array());
                        $personal_blood_high7=array(array());
                        for($i=0;$i<count($personal_blood7[0]);$i++){
                          if($personal_blood7[1][$i]=="異常"){
                            $personal_blood_high7[0][]=$personal_blood7[0][$i];
                            $personal_blood_high7[1][]=$blood_title[6][$i];
                            //array_push($personal_blood_high7,$personal_blood7[0][$i]);
                          }
                          if($personal_blood7[1][$i]=="正常"){
                            $personal_blood_normal7[0][]=$personal_blood7[0][$i];
                            $personal_blood_normal7[1][]=$blood_title[6][$i];
                            //array_push($personal_blood_normal7,$personal_blood7[0][$i]);
                          }
                        }
                        
                        $personal_blood_low_arr=[$personal_blood_low1,$personal_blood_low2,$personal_blood_low3,$personal_blood_low4,$personal_blood_low5,$personal_blood_low6,$personal_blood_low7];
                        $personal_blood_high_arr=[$personal_blood_high1,$personal_blood_high2,$personal_blood_high3,$personal_blood_high4,$personal_blood_high5,$personal_blood_high6,$personal_blood_high7];
                        $personal_blood_normal_arr=[$personal_blood_normal1,$personal_blood_normal2,$personal_blood_normal3,$personal_blood_normal4,$personal_blood_normal5,$personal_blood_normal6,$personal_blood_normal7];

                        $total=0;
                        $total_mmse=0;
                        for($j=0;$j<$number;$j++){
                            // CDR
                            if($value_array[$j]=='cdr'){
                              while ($record_cdr = mysqli_fetch_assoc($result_cdr)) {
                                if($record_cdr['sum_of_box']>=0 && $record_cdr['sum_of_box']<=2.5){
                                  $cdr_total[1][1]+=1;
                                }
                                if($record_cdr['sum_of_box']>=3 && $record_cdr['sum_of_box']<=4){
                                  $cdr_total[1][2]+=1;;
                                }
                                if($record_cdr['sum_of_box']>=4.5 && $record_cdr['sum_of_box']<=9){
                                  $cdr_total[1][3]+=1;
                                }
                                if($record_cdr['sum_of_box']>=9.5 && $record_cdr['sum_of_box']<=15.5){
                                  $cdr_total[1][4]+=1;
                                }
                                if($record_cdr['sum_of_box']>=16 && $record_cdr['sum_of_box']<=18){
                                  $cdr_total[1][5]+=1;
                                }
                                

                                if($record_cdr['cdr']==0){
                                  $cdr_score[1][1]+=1;
                                }
                                if($record_cdr['cdr']==0.5){
                                  $cdr_score[1][2]+=1;;
                                }
                                if($record_cdr['cdr']==1){
                                  $cdr_score[1][3]+=1;
                                }
                                if($record_cdr['cdr']==2){
                                  $cdr_score[1][4]+=1;
                                }
                                if($record_cdr['cdr']==3){
                                  $cdr_score[1][5]+=1;
                                }
                              }
                              while($record_mem = mysqli_fetch_assoc($result_cdr_mem)){
                                $total+=1;
                                if($record_mem['content']==0){
                                  $cdr_score[2][1]+=1;
                                }
                                if($record_mem['content']==0.5){
                                  $cdr_score[2][2]+=1;
                                }
                                if($record_mem['content']==1){
                                  $cdr_score[2][3]+=1;
                                }
                                if($record_mem['content']==2){
                                  $cdr_score[2][4]+=1;
                                }
                                if($record_mem['content']==3){
                                  $cdr_score[2][5]+=1;
                                }
                              }
                             
                              while($record_ori = mysqli_fetch_assoc($result_cdr_ori)){
                                if($record_ori['content']==0){
                                  $cdr_score[3][1]+=1;
                                }
                                if($record_ori['content']==0.5){
                                  $cdr_score[3][2]+=1;
                                }
                                if($record_ori['content']==1){
                                  $cdr_score[3][3]+=1;
                                }
                                if($record_ori['content']==2){
                                  $cdr_score[3][4]+=1;
                                }
                                if($record_ori['content']==3){
                                  $cdr_score[3][5]+=1;
                                }
                              }
                              while($record_jug = mysqli_fetch_assoc($result_cdr_jug)){
                                if($record_jug['content']==0){
                                  $cdr_score[4][1]+=1;
                                }
                                if($record_jug['content']==0.5){
                                  $cdr_score[4][2]+=1;
                                }
                                if($record_jug['content']==1){
                                  $cdr_score[4][3]+=1;
                                }
                                if($record_jug['content']==2){
                                  $cdr_score[4][4]+=1;
                                }
                                if($record_jug['content']==3){
                                  $cdr_score[4][5]+=1;
                                }
                              }
                              
                              while($record_com = mysqli_fetch_assoc($result_cdr_com)){
                                if($record_com['content']==0){
                                  $cdr_score[5][1]+=1;
                                }
                                if($record_com['content']==0.5){
                                  $cdr_score[5][2]+=1;
                                }
                                if($record_com['content']==1){
                                  $cdr_score[5][3]+=1;
                                }
                                if($record_com['content']==2){
                                  $cdr_score[5][4]+=1;
                                }
                                if($record_com['content']==3){
                                  $cdr_score[5][5]+=1;
                                }
                              }
                              while($record_home = mysqli_fetch_assoc($result_cdr_home)){
                                if($record_home['content']==0){
                                  $cdr_score[6][1]+=1;
                                }
                                if($record_home['content']==0.5){
                                  $cdr_score[6][2]+=1;
                                }
                                if($record_home['content']==1){
                                  $cdr_score[6][3]+=1;
                                }
                                if($record_home['content']==2){
                                  $cdr_score[6][4]+=1;
                                }
                                if($record_home['content']==3){
                                  $cdr_score[6][5]+=1;
                                }
                              }
                              while($record_per = mysqli_fetch_assoc($result_cdr_per)){
                                if($record_per['content']==0){
                                  $cdr_score[7][1]+=1;
                                }
                                if($record_per['content']==0.5){
                                  $cdr_score[7][2]+=1;
                                }
                                if($record_per['content']==1){
                                  $cdr_score[7][3]+=1;
                                }
                                if($record_per['content']==2){
                                  $cdr_score[7][4]+=1;
                                }
                                if($record_per['content']==3){
                                  $cdr_score[7][5]+=1;
                                }
                              }
                            }
                            
                            //MMSE
                            elseif($value_array[$j]=='mmse'){
                              while ($record_mmse = mysqli_fetch_assoc($result_mmse)) {
                              $total_mmse+=1;
                                if($record_mmse['total']>=0 && $record_mmse['total']<=15) {
                                  $mmse_total[1][1]+=1;
                                }
                                if($record_mmse['total']>=16 && $record_mmse['total']<=17){
                                  $mmse_total[1][2]+=1;
                                }
                                if($record_mmse['total']>=18 && $record_mmse['total']<=24){
                                  $mmse_total[1][3]+=1;
                                }
                                if($record_mmse['total']>=25 && $record_mmse['total']<=30){
                                  $mmse_total[1][4]+=1;
                                }
                               

                              }
                              while($record_time = mysqli_fetch_assoc($result_mmse_time)){
                                if($record_time['content']==0){
                                  $mmse_score1[1][1]+=1;
                                }
                                if($record_time['content']==1){
                                  $mmse_score1[1][2]+=1;
                                }
                                if($record_time['content']==2){
                                  $mmse_score1[1][3]+=1;
                                }
                                if($record_time['content']==3){
                                  $mmse_score1[1][4]+=1;
                                }
                                if($record_time['content']==4){
                                  $mmse_score1[1][5]+=1;
                                }
                                if($record_time['content']==5){
                                  $mmse_score1[1][6]+=1;
                                }
                              }
                              while($record_place = mysqli_fetch_assoc($result_mmse_place)){
                                if($record_place['content']==0){
                                  $mmse_score1[2][1]+=1;
                                }
                                if($record_place['content']==1){
                                  $mmse_score1[2][2]+=1;
                                }
                                if($record_place['content']==2){
                                  $mmse_score1[2][3]+=1;
                                }
                                if($record_place['content']==3){
                                  $mmse_score1[2][4]+=1;
                                }
                                if($record_place['content']==4){
                                  $mmse_score1[2][5]+=1;
                                }
                                if($record_place['content']==5){
                                  $mmse_score1[2][6]+=1;
                                }
                              }
                              while($record_reg = mysqli_fetch_assoc($result_mmse_reg)){
                                if($record_reg['content']==0){
                                  $mmse_score1[3][1]+=1;
                                }
                                if($record_reg['content']==1){
                                  $mmse_score1[3][2]+=1;
                                }
                                if($record_reg['content']==2){
                                  $mmse_score1[3][3]+=1;
                                }
                                if($record_reg['content']==3){
                                  $mmse_score1[3][4]+=1;
                                }
                              }
                              while($record_7 = mysqli_fetch_assoc($result_mmse_7)){
                                if($record_7['content']==0){
                                  $mmse_score1[4][1]+=1;
                                }
                                if($record_7['content']==1){
                                  $mmse_score1[4][2]+=1;
                                }
                                if($record_7['content']==2){
                                  $mmse_score1[4][3]+=1;
                                }
                                if($record_7['content']==3){
                                  $mmse_score1[4][4]+=1;
                                }
                                if($record_7['content']==4){
                                  $mmse_score1[4][5]+=1;
                                }
                                if($record_7['content']==5){
                                  $mmse_score1[4][6]+=1;
                                }
                              }
                              while($record_recall = mysqli_fetch_assoc($result_mmse_recall)){
                                if($record_recall['content']==0){
                                  $mmse_score1[5][1]+=1;
                                }
                                if($record_recall['content']==1){
                                  $mmse_score1[5][2]+=1;
                                }
                                if($record_recall['content']==2){
                                  $mmse_score1[5][3]+=1;
                                }
                                if($record_recall['content']==3){
                                  $mmse_score1[5][4]+=1;
                                }
                              }
                              while($record_build= mysqli_fetch_assoc($result_mmse_build)){
                                if($record_build['content']==0){
                                  $mmse_score1[6][1]+=1;
                                }
                                if($record_build['content']==1){
                                  $mmse_score1[6][2]+=1;
                                }
                              }
                              //mmse2
                              while($record_lan_name = mysqli_fetch_assoc($result_lan_name)){
                                if($record_lan_name['content']==0){
                                  $mmse_score2[1][1]+=1;
                                }
                                if($record_lan_name['content']==1){
                                  $mmse_score2[1][2]+=1;
                                }
                                if($record_lan_name['content']==2){
                                  $mmse_score2[1][3]+=1;
                                }
                            }     
                            
                              while($record_lan_repeat = mysqli_fetch_assoc($result_lan_repeat)){
                                if($record_lan_repeat['content']==0){
                                  $mmse_score2[2][1]+=1;
                                }
                                if($record_lan_repeat['content']==1){
                                  $mmse_score2[2][2]+=1;
                                }
                              }
                              while($record_lan_read = mysqli_fetch_assoc($result_lan_read)){
                                if($record_lan_read['content']==0){
                                  $mmse_score2[3][1]+=1;
                                }
                                if($record_lan_read['content']==1){
                                  $mmse_score2[3][2]+=1;
                                }
                              }
                              while($record_lan_write = mysqli_fetch_assoc($result_lan_write)){
                                if($record_lan_write['content']==0){
                                  $mmse_score2[4][1]+=1;
                                }
                                if($record_lan_write['content']==1){
                                  $mmse_score2[4][2]+=1;
                                }
                              }
                              while ($record_mmse_act = mysqli_fetch_assoc($result_mmse_act)) {
                                if($record_mmse_act['content']==0){
                                  $mmse_score2[5][1]+=1;
                                }
                                if($record_mmse_act['content']==1){
                                  $mmse_score2[5][2]+=1;
                                }
                                if($record_mmse_act['content']==2){
                                  $mmse_score2[5][3]+=1;
                                }
                                if($record_mmse_act['content']==3){
                                  $mmse_score2[5][4]+=1;
                                }
                              }
                            }
                            elseif($value_array[$j]=='blood'){
                              while($record_blood = mysqli_fetch_assoc($result_blood)){
                                //1
                                if($record_blood['WBC']!=0){
                                  if($record_blood['WBC']<4.0){
                                    $blood_score1[1][1]+=1;
                                  }elseif($record_blood['WBC']>11.0){
                                    $blood_score1[1][3]+=1;
                                  }else{
                                    $blood_score1[1][2]+=1;
                                  }
                                }
                                if($record_blood['SEG']!=0){
                                  if($record_blood['SEG']>75.0){
                                    $blood_score1[2][3]+=1;
                                  }else{
                                    $blood_score1[2][2]+=1;
                                  }
                                }
                                if($record_blood['RBC']!=0){
                                  if($record_blood['hsex']=="男"){
                                    if($record_blood['RBC']<4.2){
                                      $blood_score1[3][1]+=1;
                                    }elseif($record_blood['RBC']>6.2){
                                      $blood_score1[3][3]+=1;
                                    }else{
                                      $blood_score1[3][2]+=1;
                                    }
                                  }
                                  elseif($record_blood['hsex']=="女"){
                                    if($record_blood['RBC']<3.7){
                                      $blood_score1[3][1]+=1;
                                    }elseif($record_blood['RBC']>5.5){
                                      $blood_score1[3][3]+=1;
                                    }else{
                                      $blood_score1[3][2]+=1;
                                    }
                                  }
                                  else{
                                    if($record_blood['RBC']<3.7){
                                      $blood_score1[3][1]+=1;
                                    }elseif($record_blood['RBC']>6.2){
                                      $blood_score1[3][3]+=1;
                                    }else{
                                      $blood_score1[3][2]+=1;
                                    }
                                  }
                                }
                                if($record_blood['HGB']!=0){
                                  if($record_blood['hsex']=="男"){
                                    if($record_blood['HGB']<12.3){
                                      $blood_score1[4][1]+=1;
                                    }elseif($record_blood['HGB']>18.3){
                                      $blood_score1[4][3]+=1;
                                    }else{
                                      $blood_score1[4][2]+=1;
                                    }
                                  }
                                  elseif($record_blood['hsex']=="女"){
                                    if($record_blood['HGB']<11.3){
                                      $blood_score1[4][1]+=1;
                                    }elseif($record_blood['HGB']>15.3){
                                      $blood_score1[4][3]+=1;
                                    }else{
                                      $blood_score1[4][2]+=1;
                                    }
                                  }
                                  else{
                                    if($record_blood['HGB']<11.3){
                                      $blood_score1[4][1]+=1;
                                    }elseif($record_blood['HGB']>18.3){
                                      $blood_score1[4][3]+=1;
                                    }else{
                                      $blood_score1[4][2]+=1;
                                    }
                                  }
                                }
                                if($record_blood['Platelet']!=0){
                                  if($record_blood['Platelet']<150){
                                    $blood_score1[5][1]+=1;
                                  }elseif($record_blood['Platelet']>400){
                                    $blood_score1[5][3]+=1;
                                  }else{
                                    $blood_score1[5][2]+=1;
                                  }
                                }

                                //2
                                if($record_blood['BUN']!=0){
                                  if($record_blood['BUN']<7){
                                    $blood_score2[1][1]+=1;
                                  }elseif($record_blood['BUN']>25){
                                    $blood_score2[1][3]+=1;
                                  }else{
                                    $blood_score2[1][2]+=1;
                                  }
                                }
                                if($record_blood['Creatinine']!=0){
                                  if($record_blood['Creatinine']<0.6){
                                    $blood_score2[2][1]+=1;
                                  }elseif($record_blood['Creatinine']>1.3){
                                    $blood_score2[2][3]+=1;
                                  }else{
                                    $blood_score2[2][2]+=1;
                                  }
                                }
                                if($record_blood['eGFR']!=0){
                                  if($record_blood['eGFR']<60){
                                    $blood_score2[3][1]+=1;
                                  }else{
                                    $blood_score2[3][2]+=1;
                                  }
                                }
                                if($record_blood['Na']!=0){
                                  if($record_blood['Na']<136){
                                    $blood_score2[4][1]+=1;
                                  }elseif($record_blood['Na']>145){
                                    $blood_score2[4][3]+=1;
                                  }else{
                                    $blood_score2[4][2]+=1;
                                  }
                                }
                                if($record_blood['K']!=0){
                                  if($record_blood['K']<3.4){
                                    $blood_score2[5][1]+=1;
                                  }elseif($record_blood['K']>4.5){
                                    $blood_score2[5][3]+=1;
                                  }else{
                                    $blood_score2[5][2]+=1;
                                  }
                                }
                                if($record_blood['Ca']!=0){
                                  if($record_blood['Ca']<8.6){
                                    $blood_score2[6][1]+=1;
                                  }elseif($record_blood['Ca']>10.3){
                                    $blood_score2[6][3]+=1;
                                  }else{
                                    $blood_score2[6][2]+=1;
                                  }
                                }

                                //3
                                if($record_blood['GOT']!=0){
                                  if($record_blood['GOT']>40){
                                    $blood_score3[1][3]+=1;
                                  }else{
                                    $blood_score3[1][2]+=1;
                                  }
                                }
                                if($record_blood['GPT']!=0){
                                  if($record_blood['GPT']>40){
                                    $blood_score3[2][3]+=1;
                                  }else{
                                    $blood_score3[2][2]+=1;
                                  }
                                }
                                if($record_blood['BILIRUBIN_TOTAL']!=0){
                                  if($record_blood['BILIRUBIN_TOTAL']<0.3){
                                    $blood_score3[3][1]+=1;
                                  }elseif($record_blood['BILIRUBIN_TOTAL']>1.0){
                                    $blood_score3[3][3]+=1;
                                  }else{
                                    $blood_score3[3][2]+=1;
                                  }
                                }
                                if($record_blood['Blood_ammonia']!=0){
                                  if($record_blood['Blood_ammonia']<25){
                                    $blood_score3[4][1]+=1;
                                  }elseif($record_blood['Blood_ammonia']>90){
                                    $blood_score3[4][3]+=1;
                                  }else{
                                    $blood_score3[4][2]+=1;
                                  }
                                }

                                //4
                                if($record_blood['ALBUMIN']!=0){
                                  if($record_blood['ALBUMIN']<3.5){
                                    $blood_score4[1][1]+=1;
                                  }elseif($record_blood['ALBUMIN']>5.7){
                                    $blood_score4[1][3]+=1;
                                  }else{
                                    $blood_score4[1][2]+=1;
                                  }
                                }
                                if($record_blood['Folic_acid']!=0){
                                  if($record_blood['Folic_acid']<4.0){
                                    $blood_score4[2][1]+=1;
                                  }else{
                                    $blood_score4[2][2]+=1;
                                  }
                                }
                                if($record_blood['Vit_B12']!=0){
                                  if($record_blood['Vit_B12']<180){
                                    $blood_score4[3][1]+=1;
                                  }elseif($record_blood['Vit_B12']>914){
                                    $blood_score4[3][3]+=1;
                                  }else{
                                    $blood_score4[3][2]+=1;
                                  }
                                }

                                //5
                                if($record_blood['Glucose_AC']!=0){
                                  if($record_blood['Glucose_AC']<70){
                                    $blood_score5[1][1]+=1;
                                  }elseif($record_blood['Glucose_AC']>100){
                                    $blood_score5[1][3]+=1;
                                  }else{
                                    $blood_score5[1][2]+=1;
                                  }
                                }
                                if($record_blood['HbA1c']!=0){
                                  if($record_blood['HbA1c']>6.0){
                                    $blood_score5[2][3]+=1;
                                  }else{
                                    $blood_score5[2][2]+=1;
                                  }
                                }
                                if($record_blood['CHOLESTEROL']!=0){
                                  if($record_blood['CHOLESTEROL']>200){
                                    $blood_score5[3][3]+=1;
                                  }else{
                                    $blood_score5[3][2]+=1;
                                  }
                                }
                                if($record_blood['TRIGLYCERIDE']!=0){
                                  if($record_blood['TRIGLYCERIDE']>150){
                                    $blood_score5[4][3]+=1;
                                  }else{
                                    $blood_score5[4][2]+=1;
                                  }
                                }
                                if($record_blood['LDL']!=0){
                                  if($record_blood['LDL']>130){
                                    $blood_score5[5][3]+=1;
                                  }else{
                                    $blood_score5[5][2]+=1;
                                  }
                                }
                                if($record_blood['HDL']!=0){
                                  if($record_blood['HDL']<23){
                                    $blood_score5[6][1]+=1;
                                  }elseif($record_blood['HDL']>92){
                                    $blood_score5[6][3]+=1;
                                  }else{
                                    $blood_score5[6][2]+=1;
                                  }
                                }
                                if($record_blood['URIC']!=0){
                                  if($record_blood['hsex']=="男"){
                                    if($record_blood['URIC']<4.4){
                                      $blood_score5[7][1]+=1;
                                    }elseif($record_blood['URIC']>7.6){
                                      $blood_score5[7][3]+=1;
                                    }else{
                                      $blood_score5[7][2]+=1;
                                    }
                                  }
                                  elseif($record_blood['hsex']=="女"){
                                    if($record_blood['URIC']<2.3){
                                      $blood_score5[7][1]+=1;
                                    }elseif($record_blood['URIC']>6.6){
                                      $blood_score5[7][3]+=1;
                                    }else{
                                      $blood_score5[7][2]+=1;
                                    }
                                  }
                                  else{
                                    if($record_blood['URIC']<2.3){
                                      $blood_score5[7][1]+=1;
                                    }elseif($record_blood['URIC']>7.6){
                                      $blood_score5[7][3]+=1;
                                    }else{
                                      $blood_score5[7][2]+=1;
                                    }
                                  }
                                }

                                //6
                                if($record_blood['TSH']!=0){
                                  if($record_blood['TSH']<0.34){
                                    $blood_score6[1][1]+=1;
                                  }elseif($record_blood['TSH']>5.6){
                                    $blood_score6[1][3]+=1;
                                  }else{
                                    $blood_score6[1][2]+=1;
                                  }
                                }
                                if($record_blood['T3']!=0){
                                  if($record_blood['T3']<0.7){
                                    $blood_score6[2][1]+=1;
                                  }elseif($record_blood['T3']>1.78){
                                    $blood_score6[2][3]+=1;
                                  }else{
                                    $blood_score6[2][2]+=1;
                                  }
                                }
                                if($record_blood['T4']!=0){
                                  if($record_blood['T4']<5.1){
                                    $blood_score6[3][1]+=1;
                                  }elseif($record_blood['T4']>12.8){
                                    $blood_score6[3][3]+=1;
                                  }else{
                                    $blood_score6[3][2]+=1;
                                  }
                                }
                                if($record_blood['Free_T4']!=0){
                                  if($record_blood['Free_T4']<0.59){
                                    $blood_score6[4][1]+=1;
                                  }elseif($record_blood['Free_T4']>1.45){
                                    $blood_score6[4][3]+=1;
                                  }else{
                                    $blood_score6[4][2]+=1;
                                  }
                                }

                              //7
                              if($record_blood['RPR_VDRL_test']!=''){
                                if($record_blood['RPR_VDRL_test']=='正常'){
                                  $blood_score7[1][2]+=1;
                                }elseif($record_blood['RPR_VDRL_test']=='異常'){
                                  $blood_score7[1][3]+=1;
                                }
                              }
                                
                              }
                          }
                        }

                        //pr值
                        for($k=0;$k<$number;$k++){
                        if($value_array[$k]=='cdr' && isset($personal_cdr[1][0])){
                        $percent_pr_cdr0=array();
                        $percent_pr_cdr05=array();
                        $percent_pr_cdr1=array();
                        $percent_pr_cdr2=array();
                        $percent_pr_cdr3=array();
                        for($i=0;$i<count($personal_cdr[1]);$i++){
                          if($personal_cdr[1][$i]==0){
                            array_push($percent_pr_cdr0,(round($cdr_score[$i+1][1]/$total,2))*100);
                          }
                          if($personal_cdr[1][$i]==0.5){
                            array_push($percent_pr_cdr05,(round(($cdr_score[$i+1][2]+$cdr_score[$i+1][1])/$total,2))*100);
                          }
                          if($personal_cdr[1][$i]==1){
                            array_push($percent_pr_cdr1,(round(($cdr_score[$i+1][3]+$cdr_score[$i+1][2]+$cdr_score[$i+1][1])/$total,2))*100);
                          }
                          if($personal_cdr[1][$i]==2){
                            array_push($percent_pr_cdr2,(round(($cdr_score[$i+1][4]+$cdr_score[$i+1][3]+$cdr_score[$i+1][2]+$cdr_score[$i+1][1])/$total,2))*100);
                          }
                          if($personal_cdr[1][$i]==3){
                            array_push($percent_pr_cdr3,(round(($cdr_score[$i+1][5]+$cdr_score[$i+1][4]+$cdr_score[$i+1][3]+$cdr_score[$i+1][2]+$cdr_score[$i+1][1])/$total,2))*100);
                          }
                        }

                        $percent_pr_total5=array();
                        $percent_pr_total1=array();
                        $percent_pr_total2=array();
                        $percent_pr_total3=array();
                        $percent_pr_total4=array();
                        if($personal_total[0]==5){
                          array_push($percent_pr_total5,(round($cdr_total[1][1]/$total,2))*100);
                        }
                        if($personal_total[0]==1){
                          array_push($percent_pr_total1,(round(($cdr_total[1][2]+$cdr_total[1][1])/$total,2))*100);
                        }
                        if($personal_total[0]==2){
                          array_push($percent_pr_total2,(round(($cdr_total[1][3]+$cdr_total[1][2]+$cdr_total[1][1])/$total,2))*100);
                        }
                        if($personal_total[0]==3){
                          array_push($percent_pr_total3,(round(($cdr_total[1][4]+$cdr_total[1][3]+$cdr_total[1][2]+$cdr_total[1][1])/$total,2))*100);
                        }
                        if($personal_total[0]==4){
                          array_push($percent_pr_total4,(round(($cdr_total[1][5]+$cdr_total[1][4]+$cdr_total[1][3]+$cdr_total[1][2]+$cdr_total[1][1])/$total,2))*100);
                        }
                      }}

                        for($k=0;$k<$number;$k++){
                        if($value_array[$k]=='mmse' && isset($personal_mmse1[1][0])){
                        $percent_pr1_mmse0=array();
                        $percent_pr1_mmse1=array();
                        $percent_pr1_mmse2=array();
                        $percent_pr1_mmse3=array();
                        $percent_pr1_mmse4=array();
                        $percent_pr1_mmse5=array();
                        for($i=0;$i<count($personal_mmse1[1]);$i++){
                          if($personal_mmse1[1][$i]==0){
                            array_push($percent_pr1_mmse0,(round($mmse_score1[$i+1][1]/$total_mmse,2))*100);
                          }
                          if($personal_mmse1[1][$i]==1){
                            array_push($percent_pr1_mmse1,(round(($mmse_score1[$i+1][2]+$mmse_score1[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse1[1][$i]==2){
                            array_push($percent_pr1_mmse2,(round(($mmse_score1[$i+1][3]+$mmse_score1[$i+1][2]+$mmse_score1[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse1[1][$i]==3){
                            array_push($percent_pr1_mmse3,(round(($mmse_score1[$i+1][4]+$mmse_score1[$i+1][3]+$mmse_score1[$i+1][2]+$mmse_score1[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse1[1][$i]==4){
                            array_push($percent_pr1_mmse4,(round(($mmse_score1[$i+1][5]+$mmse_score1[$i+1][4]+$mmse_score1[$i+1][3]+$mmse_score1[$i+1][2]+$mmse_score1[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse1[1][$i]==5){
                            array_push($percent_pr1_mmse5,(round(($mmse_score1[$i+1][6]+$mmse_score1[$i+1][5]+$mmse_score1[$i+1][4]+$mmse_score1[$i+1][3]+$mmse_score1[$i+1][2]+$mmse_score1[$i+1][1])/$total_mmse,2))*100);
                          }
                        }

                        $percent_pr2_mmse0=array();
                        $percent_pr2_mmse1=array();
                        $percent_pr2_mmse2=array();
                        $percent_pr2_mmse3=array();
                        $percent_pr2_mmse4=array();
                        $percent_pr2_mmse5=array();
                        for($i=0;$i<count($personal_mmse2[1]);$i++){
                          if($personal_mmse2[1][$i]==0){
                            array_push($percent_pr2_mmse0,(round($mmse_score2[$i+1][1]/$total_mmse,2))*100);
                          }
                          if($personal_mmse2[1][$i]==1){
                            array_push($percent_pr2_mmse1,(round(($mmse_score2[$i+1][2]+$mmse_score2[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse2[1][$i]==2){
                            array_push($percent_pr2_mmse2,(round(($mmse_score2[$i+1][3]+$mmse_score2[$i+1][2]+$mmse_score2[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse2[1][$i]==3){
                            array_push($percent_pr2_mmse3,(round(($mmse_score2[$i+1][4]+$mmse_score2[$i+1][3]+$mmse_score2[$i+1][2]+$mmse_score2[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse2[1][$i]==4){
                            array_push($percent_pr2_mmse4,(round(($mmse_score2[$i+1][5]+$mmse_score2[$i+1][4]+$mmse_score2[$i+1][3]+$mmse_score2[$i+1][2]+$mmse_score2[$i+1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse2[1][$i]==5){
                            array_push($percent_pr2_mmse5,(round(($mmse_score2[$i+1][6]+$mmse_score2[$i+1][5]+$mmse_score2[$i+1][4]+$mmse_score2[$i+1][3]+$mmse_score2[$i+1][2]+$mmse_score2[$i+1][1])/$total_mmse,2))*100);
                          }
                        }

                        $percent_pr_mmse0=[$percent_pr1_mmse0,$percent_pr2_mmse0];
                        $percent_pr_mmse1=[$percent_pr1_mmse1,$percent_pr2_mmse1];
                        $percent_pr_mmse2=[$percent_pr1_mmse2,$percent_pr2_mmse2];
                        $percent_pr_mmse3=[$percent_pr1_mmse3,$percent_pr2_mmse3];
                        $percent_pr_mmse4=[$percent_pr1_mmse4,$percent_pr2_mmse4];
                        $percent_pr_mmse5=[$percent_pr1_mmse5,$percent_pr2_mmse5];
                  
                        $percent_pr_mmse_total0=array();
                        $percent_pr_mmse_total1=array();
                        $percent_pr_mmse_total2=array();
                        $percent_pr_mmse_total3=array();
                          if($personal_mmse_total[0]==4){
                            array_push($percent_pr_mmse_total0,(round($mmse_total[1][1]/$total_mmse,2))*100);
                          }
                          if($personal_mmse_total[0]==1){
                            array_push($percent_pr_mmse_total1,(round(($mmse_total[1][2]+$mmse_total[1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse_total[0]==2){
                            array_push($percent_pr_mmse_total2,(round(($mmse_total[1][3]+$mmse_total[1][2]+$mmse_total[1][1])/$total_mmse,2))*100);
                          }
                          if($personal_mmse_total[0]==3){
                            array_push($percent_pr_mmse_total3,(round(($mmse_total[1][4]+$mmse_total[1][3]+$mmse_total[1][2]+$mmse_total[1][1])/$total_mmse,2))*100);
                          }
                        }}
                     


                        $data_json_CDR = json_encode($cdr_score);
                        $data_json_CDR2 = json_encode($cdr_total);
                        //$data_json_CDR_arr=[$data_json_CDR,$data_json_mmse2];

                        $data_json_mmse1 = json_encode($mmse_score1);
                        $data_json_mmse2 = json_encode($mmse_score2);
                        $data_json_mmse3 = json_encode($mmse_total);
                        $data_json_mmse_arr=[$data_json_mmse1,$data_json_mmse2];

                        $data_json_blood1 = json_encode($blood_score1);
                        $data_json_blood2 = json_encode($blood_score2);
                        $data_json_blood3 = json_encode($blood_score3);
                        $data_json_blood4 = json_encode($blood_score4);
                        $data_json_blood5 = json_encode($blood_score5);
                        $data_json_blood6 = json_encode($blood_score6);
                        $data_json_blood7 = json_encode($blood_score7);
                        $data_json_blood_arr=[$data_json_blood1,$data_json_blood2,$data_json_blood3,$data_json_blood4,$data_json_blood5,$data_json_blood6,$data_json_blood7];
                        $mmse_score_arr=[$mmse_score1,$mmse_score2];
                        $blood_score_arr=[$blood_score1,$blood_score2,$blood_score3,$blood_score4,$blood_score5,$blood_score6,$blood_score7];
                      
                          ?>
                        <br>
              <!-- CDR -->
              <div class="mt-3" style='text-align:center;'>
              <?php
              if(isset($_GET['value']) && strpos($_GET['value'], 'cdr') !== false){ ?>
              <h3><b>CDR欄位</h3>
              <div id="container" style="height: 500%"></div>
                <script type="text/javascript">
                    var today = new Date();
                    var year = today.getFullYear().toString();
                    var month = (today.getMonth() + 1).toString().padStart(2, '0');
                    var day = today.getDate().toString().padStart(2, '0');
                    var formattedDate = year + month + day;

                  var dom = document.getElementById('container');
                  var data = <?php echo $data_json_CDR ?>;
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
                      dataset: {
                    // 提供一份数据。
                        source:data
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
                            name:'<?php echo $record['name']?>'+ '_CDR欄位落點_' + formattedDate,
                          }
                        }
                      },
                      
                      xAxis: {
                          type: 'category',
                          splitArea:{
                            show:true,
                            areaStyle:{
                              color:
                              [
                                'rgba(240, 240, 240,0.6)','',
                              ]
                            }
                          }
                      },
                      yAxis: {
                        type: 'value',
                        minInterval:1,
                        axisLabel: {
                          formatter: '{value}人'
                        }
                      },
                      series:[
                        {type: 'bar',color:'#92AFC7',
                        markPoint:{
                          data:[
                            <?php for($i=0;$i<count($personal_cdr_0);$i++){?>
                            {name:'0分',coord:[<?php echo($personal_cdr_0[$i])?>,<?php echo($cdr_score[$personal_cdr_0[$i]+1][1])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_cdr0[$i])?>%'
                            }
                          },                                 
                            <?php }?> ]} 
                        },
                        {type: 'bar',color:'#B7C4CF',
                          markPoint:{
                          data:[
                            <?php for($i=0;$i<count($personal_cdr_05);$i++){?>
                            {name:'05分',coord:[<?php echo($personal_cdr_05[$i])?>,<?php echo($cdr_score[$personal_cdr_05[$i]+1][2])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_cdr05[$i])?>%'
                            }
                          },    
                            <?php }?> ]} 
                        },
                        {type: 'bar',color:'#EEE3CB',
                          markPoint:{
                          data:[
                            <?php for($i=0;$i<count($personal_cdr_1);$i++){?>
                            {name:'1分',coord:[<?php echo($personal_cdr_1[$i])?>,<?php echo($cdr_score[$personal_cdr_1[$i]+1][3])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_cdr1[$i])?>%'
                            }
                          },  
                            <?php }?> ]} 
                        },
                        {type: 'bar',color:'#D7C0AE',
                          markPoint:{
                          data:[
                            <?php for($i=0;$i<count($personal_cdr_2);$i++){?>
                            {name:'2分',coord:[<?php echo($personal_cdr_2[$i])?>,<?php echo($cdr_score[$personal_cdr_2[$i]+1][4])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_cdr2[$i])?>%'
                            }
                          },  
                            <?php }?> ]} 
                        },
                        {type: 'bar',color:'#967E76',
                          markPoint:{
                          data:[
                            <?php for($i=0;$i<count($personal_cdr_3);$i++){?>
                            {name:'3分',coord:[<?php echo($personal_cdr_3[$i])?>,<?php echo($cdr_score[$personal_cdr_3[$i]+1][5])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_cdr3[$i])?>%'
                            }
                          },  
                            <?php }?> ]} 
                        },
                      ] 
                    };
                      if (option && typeof option === 'object') {
                        myChart.setOption(option);
                      }
                      window.addEventListener('resize', myChart.resize);
                </script>
                
                <h3><b>CDR總分</h3>
                <div id="container_CDR" style="height: 500%"></div>
                <script type="text/javascript">
                  var today = new Date();
                  var year = today.getFullYear().toString();
                  var month = (today.getMonth() + 1).toString().padStart(2, '0');
                  var day = today.getDate().toString().padStart(2, '0');
                  var formattedDate = year + month + day;

                  var dom = document.getElementById('container_CDR');
                  var data = <?php echo $data_json_CDR2 ?>;
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
                      dataset: {
                    // 提供一份数据。
                        source:data
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
                            name:'<?php echo $record['name']?>'+ '_CDR總分落點_' + formattedDate,
                          }
                        }
                      },
                      xAxis: {
                          type: 'category',
                      },
                      yAxis: {
                        type: 'value',
                        minInterval:1,
                        axisLabel: {
                          formatter: '{value}人'
                        }
                      },
                      series:[
                        {type: 'bar',color:'#92AFC7',
                        <?php if($personal_total[0]==5){?>
                          markPoint:{
                          data:[   
                            {name:'0',coord:[0,<?php echo $cdr_total[1][1]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_total5[$i])?>%'  
                              }},                               
                            ]} <?php }?>
                        },
                        {type: 'bar',color:'#B7C4CF',
                          <?php if($personal_total[0]==1){?>
                          markPoint:{
                          data:[   
                            {name:'1',coord:[0,<?php echo $cdr_total[1][2]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_total1[$i])?>%'  
                              }},                                   
                            ]} <?php }?>
                        },
                        {type: 'bar',color:'#EEE3CB',
                          <?php if($personal_total[0]==2){?>
                          markPoint:{
                          data:[   
                            {name:'2',coord:[0,<?php echo $cdr_total[1][3]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_total2[0])?>%'
                              }},                                  
                            ]} <?php }?>
                        },
                        {type: 'bar',color:'#D7C0AE',
                          <?php if($personal_total[0]==3){?>
                          markPoint:{
                          data:[   
                            {name:'3',coord:[0,<?php echo $cdr_total[1][4]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'}, 
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_total3[0])?>%' 
                              }},                               
                            ]} <?php }?>
                        },
                        {type: 'bar',color:'#967E76',
                          <?php if($personal_total[0]==4){?>
                          markPoint:{
                          data:[   
                            {name:'4',coord:[0,<?php echo $cdr_total[1][5]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},   
                            label: {
                              show: true,
                              position: 'inside',
                              offset: [0, 0],
                              textStyle:{color:'#334352',fontWeight:'bolder'},
                              formatter:'<?php print_r($percent_pr_total4[0])?>%' 
                              }},                                  
                            ]} <?php }?>
                        }
                      ]
                    };
                 
                      if (option && typeof option === 'object') {
                        myChart.setOption(option);
                      }
                      window.addEventListener('resize', myChart.resize);
                      
                    </script> 
                <hr></hr>   
                <?php } ?>
              
              <!-- MMSE -->
              <?php 
              if(isset($_GET['value']) && strpos($_GET['value'], 'mmse') !== false){ ?>
              <h3><b>MMSE欄位</h3>
              <?php for($i=1;$i<=2;$i++){ 
                $score=$mmse_score_arr[$i-1]?>
                <div id="container_mmse<?php echo $i ?>" style="height: 500%"></div>
                <script type="text/javascript">
                  var today = new Date();
                  var year = today.getFullYear().toString();
                  var month = (today.getMonth() + 1).toString().padStart(2, '0');
                  var day = today.getDate().toString().padStart(2, '0');
                  var formattedDate = year + month + day;
                  var dom = document.getElementById('container_mmse<?php echo $i ?>');
                  var data = <?php echo $data_json_mmse_arr[$i-1] ?>;
                  var myChart$i = echarts.init(dom, null, {
                      renderer: 'canvas',
                      useDirtyRect: false
                      });
                      var app = {};
                      var option$i;
                      option$i = {
                          tooltip: {
                            trigger: 'axis'
                          },
                          dataset: {
                        // 提供一份数据。
                            source:data
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
                                name:'<?php echo $record['name']?>'+ '_MMSE欄位落點'+'<?php echo $i ?>'+'_' + formattedDate,
                              }}
                        },
                        xAxis: {
                            type: 'category',
                            splitArea:{
                              show:true,
                              areaStyle:{
                                color:
                                [
                                  'rgba(240, 240, 240,0.6)','',
                                ]
                              }
                            }
                        },
                        yAxis: {
                          type: 'value',
                          minInterval:1,
                          axisLabel: {
                            formatter: '{value}人'
                          }
                        },
                      series:[
                        {type: 'bar',color:'#FAD6A5',
                          markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_mmse_0_arr[$i-1]);$j++){?>
                                {name:'0分',coord:[<?php echo($personal_mmse_0_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_0_arr[$i-1][$j]+1][1])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse0[$i-1][$j])?>%'
                                }},
                              <?php }?> ]
                            }
                          },
                        {type: 'bar',color:'#CFB997',
                          markPoint:{
                          data:[
                                <?php for($j=0;$j<count($personal_mmse_1_arr[$i-1]);$j++){?>
                                {name:'1分',coord:[<?php echo($personal_mmse_1_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_1_arr[$i-1][$j]+1][2])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse1[$i-1][$j])?>%'
                                }},
                              <?php }?> ]
                            }
                          },
                        {type: 'bar',color:'#7B8FA1',
                          markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_mmse_2_arr[$i-1]);$j++){?>
                                {name:'2分',coord:[<?php echo($personal_mmse_2_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_2_arr[$i-1][$j]+1][3])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse2[$i-1][$j])?>%'
                                }},
                                <?php }?> ]
                            }
                          },
                        {type: 'bar',color:'#567189',
                          markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_mmse_3_arr[$i-1]);$j++){?>
                                {name:'3分',coord:[<?php echo($personal_mmse_3_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_3_arr[$i-1][$j]+1][4])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse3[$i-1][$j])?>%'
                                }},
                              <?php }?> ]
                            }
                          },
                        {type: 'bar',color:'#98AEC1',
                          markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_mmse_4_arr[$i-1]);$j++){?>
                                {name:'4分',coord:[<?php echo($personal_mmse_4_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_4_arr[$i-1][$j]+1][5])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse4[$i-1][$j])?>%'
                                }},
                              <?php }?> ]
                            }
                          },
                        {type: 'bar',color:'#98AEC1',
                          markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_mmse_5_arr[$i-1]);$j++){?>
                                {name:'5分',coord:[<?php echo($personal_mmse_5_arr[$i-1][$j])?>,<?php echo($score[$personal_mmse_5_arr[$i-1][$j]+1][6])?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},                                 
                                label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse5[$i-1][$j])?>%'
                                }},
                              <?php }?> ]
                            }
                          },
                        ]
                      };
                 
                      if (option$i && typeof option$i === 'object') {
                        myChart$i.setOption(option$i);
                      }
                      window.addEventListener('resize', myChart$i.resize);
                    </script>
                    <?php } ?>
                
                <h3><b>MMSE總分</h3>
                <div id="container_mmse_total" style="height: 500%"></div>
                <script type="text/javascript">
                  var today = new Date();
                    var year = today.getFullYear().toString();
                    var month = (today.getMonth() + 1).toString().padStart(2, '0');
                    var day = today.getDate().toString().padStart(2, '0');
                    var formattedDate = year + month + day;

                  var dom = document.getElementById('container_mmse_total');
                  var data = <?php echo $data_json_mmse3 ?>;
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
                      dataset: {
                    // 提供一份数据。
                        source:data
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
                            name:'<?php echo $record['name']?>'+ '_MMSE總分落點_' + formattedDate,

                          }
                        }
                      },
                      xAxis: {
                          type: 'category',
                      },
                      yAxis: {
                        type: 'value',
                        minInterval:1,
                        axisLabel: {
                          formatter: '{value}人'
                        }
                      },
                      series:[
                        {type: 'bar',color:"#FAD6A5",
                          <?php if($personal_mmse_total[0]==4){?>
                          markPoint:{
                          data:[   
                            {name:'1',coord:[0,<?php echo $mmse_total[1][1]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},
                            label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse_total0[0])?>%'
                                }},                             
                            ]} <?php }?>
                        },
                        {type: 'bar',color:"#CFB997",
                          <?php if($personal_mmse_total[0]==1){?>
                          markPoint:{
                          data:[   
                            {name:'2',coord:[0,<?php echo $mmse_total[1][2]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'},     
                            label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse_total1[0])?>%'
                                }},                                 
                            ]} <?php }?>
                        },
                        {type: 'bar',color:"#7B8FA1",
                          <?php if($personal_mmse_total[0]==2){?>
                          markPoint:{
                          data:[   
                            {name:'3',coord:[0,<?php echo $mmse_total[1][3]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'}, 
                            label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse_total2[0])?>%'
                                }},                                     
                            ]} <?php }?>
                        },
                        {type: 'bar',color:"#567189",
                          <?php if($personal_mmse_total[0]==3){?>
                          markPoint:{
                          data:[   
                            {name:'4',coord:[0,<?php echo $mmse_total[1][4]?>], symbolSize:40 , itemStyle:{color:'#ccd4db'}, 
                            label: {
                                show: true,
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php print_r($percent_pr_mmse_total3[0])?>%'
                                }},                                     
                            ]} <?php }?>
                        },
                       
                      ]
                    };
                 
                      if (option && typeof option === 'object') {
                        myChart.setOption(option);
                      }
                      window.addEventListener('resize', myChart.resize);
                    </script>   
                <hr></hr>
                <?php } ?>
                    
                <!-- Blood -->
                <?php 
                if(isset($_GET['value']) && strpos($_GET['value'], 'blood') !== false){ ?>
                <h3><b>血液資料欄位</h3>
                <?php for($i=1;$i<=7;$i++){ 
                  $score=$blood_score_arr[$i-1]?>
                <div id="container<?php echo $i ?>" style="height: 500%"></div>
                
                  <script type="text/javascript">
                    var today = new Date();
                    var year = today.getFullYear().toString();
                    var month = (today.getMonth() + 1).toString().padStart(2, '0');
                    var day = today.getDate().toString().padStart(2, '0');
                    var formattedDate = year + month + day;

                    var dom = document.getElementById('container<?php echo $i ?>');
                    var data= <?php echo $data_json_blood_arr[$i-1] ?>;
                    var myChart$i = echarts.init(dom, null, {
                        renderer: 'canvas',
                        useDirtyRect: false
                        });
                        var app = {};
                        var option$i;
                        option$i = {
                        tooltip: {
                          trigger: 'axis'
                        },
                        dataset: {
                      // 提供一份数据。
                          source:data
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
                              name:'<?php echo $record['name']?>'+ '_血液資料落點'+'<?php echo $i ?>'+'_' + formattedDate,
                            }
                          }
                        },
                        xAxis: {
                            type: 'category',
                        },
                        yAxis: {
                        type: 'value',
                        minInterval:1,
                        axisLabel: {
                          formatter: '{value}人'
                          }
                        },
                        series:[
                          {type: 'bar',color:'#a6c6ed',
                            markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_blood_low_arr[$i-1][0]);$j++){
                                  $blood_pati_low=$record_blood_pati[$personal_blood_low_arr[$i-1][1][$j]] ?>
                                {name:'過低',coord:[<?php echo($personal_blood_low_arr[$i-1][0][$j])?>,<?php echo($score[$personal_blood_low_arr[$i-1][0][$j]+1][1])?>], symbolSize:45 , itemStyle:{color:'#EEE3CB'},
                                label: {
                                show: true,
                                textStyle:{color:'#567189',fontWeight:'bolder'},
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php echo round($blood_pati_low,2) ?>',
                                }
                                }, 
                                                           
                                <?php }?> ]
                            }
                          },
                          {type: 'bar',color:'#c4cbcf',
                            markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_blood_normal_arr[$i-1][0]);$j++){
                                  $blood_pati_normal=$record_blood_pati[$personal_blood_normal_arr[$i-1][1][$j]]?>
                                {name:'正常',coord:[<?php echo($personal_blood_normal_arr[$i-1][0][$j])?>,<?php echo($score[$personal_blood_normal_arr[$i-1][0][$j]+1][2])?>], symbolSize:45 , itemStyle:{color:'#EEE3CB'},
                                <?php if($personal_blood_normal_arr[$i-1][1][$j]!='RPR_VDRL_test'){?>
                                label: {
                                show: true,
                                textStyle:{color:'#567189',fontWeight:'bolder'},
                                position: 'inside',
                                offset: [0, 0],
                                textStyle:{color:'#334352',fontWeight:'bolder'},
                                formatter:'<?php echo round($blood_pati_normal,2)?>',
                                }
                                <?php } ?>
                                },
                                <?php }?> ]
                            }
                          },
                          {type: 'bar',color:'#ffb1a3',
                            markPoint:{
                              data:[
                                <?php for($j=0;$j<count($personal_blood_high_arr[$i-1][0]);$j++){
                                $blood_pati_high= $record_blood_pati[$personal_blood_high_arr[$i-1][1][$j]] ;?>
                                {name:'過高',coord:[<?php echo($personal_blood_high_arr[$i-1][0][$j])?>,<?php echo($score[$personal_blood_high_arr[$i-1][0][$j]+1][3])?>], symbolSize:45 , itemStyle:{color:'#EEE3CB'},
                                <?php if($personal_blood_high_arr[$i-1][1][$j]!='RPR_VDRL_test'){?>
                                  label: {
                                    show: true,
                                    textStyle:{color:'#567189',fontWeight:'bolder'},
                                    position: 'inside',
                                    offset: [0, 0],
                                    textStyle:{color:'#334352',fontWeight:'bolder'},
                                    formatter:'<?php echo round($blood_pati_high,2)?>',
                                    }
                                    <?php } ?>
                                }  ,                               
                                <?php }?> ]
                            }
                          },
                        ]
                      };
                  
                        if (option$i && typeof option$i === 'object') {
                          myChart$i.setOption(option$i);
                        }
                        window.addEventListener('resize', myChart$i.resize);
                        
                      </script>    
                  <?php }} ?>

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
