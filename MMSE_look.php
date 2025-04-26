<?php
 session_start();
 $id=$_SESSION['id'];
 $link = mysqli_connect("localhost", "root", "", "subject");

 $sql = "SELECT id, name FROM patient_basic where id='$id'";
 $result = mysqli_query($link, $sql);
 $record = mysqli_fetch_assoc($result); 
 
 $sql_mmse = "SELECT * FROM mmse where id='$id' order by date desc";
 $result_mmse = mysqli_query($link, $sql_mmse);
 $record_mmse = mysqli_fetch_assoc($result_mmse);

 $_SESSION['mmse_num_index'] = $record_mmse['num'];

 $sql_mmse_act = "SELECT * FROM mmse_action where id='$id' order by date desc";
 $result_mmse_act = mysqli_query($link, $sql_mmse_act);
 $record_act = mysqli_fetch_assoc($result_mmse_act);

 $sql_mmse_7 = "SELECT * FROM mmse_attention_and_calculation where id='$id' order by date desc";
 $result_mmse_7 = mysqli_query($link, $sql_mmse_7);
 $record_7 = mysqli_fetch_assoc($result_mmse_7);

 $sql_mmse_build = "SELECT * FROM mmse_build where id='$id' order by date desc";
 $result_mmse_build = mysqli_query($link, $sql_mmse_build);
 $record_build= mysqli_fetch_assoc($result_mmse_build);

 $sql_mmse_place = "SELECT * FROM mmse_place where id='$id' order by date desc";
 $result_mmse_place = mysqli_query($link, $sql_mmse_place);
 $record_place = mysqli_fetch_assoc($result_mmse_place);

 $sql_mmse_recall = "SELECT * FROM mmse_recall where id='$id' order by date desc";
 $result_mmse_recall = mysqli_query($link, $sql_mmse_recall);
 $record_recall = mysqli_fetch_assoc($result_mmse_recall);

 $sql_mmse_reg = "SELECT * FROM mmse_registration where id='$id' order by date desc";
 $result_mmse_reg = mysqli_query($link, $sql_mmse_reg);
 $record_reg = mysqli_fetch_assoc($result_mmse_reg);

 $sql_mmse_time = "SELECT * FROM mmse_time where id='$id' order by date desc";
 $result_mmse_time = mysqli_query($link, $sql_mmse_time);
 $record_time = mysqli_fetch_assoc($result_mmse_time);

 $sql_lan_name = "SELECT * FROM mmse_lan_name where id='$id' order by date desc";
 $result_lan_name = mysqli_query($link, $sql_lan_name);
 $record_lan_name = mysqli_fetch_assoc($result_lan_name);

 $sql_lan_read= "SELECT * FROM mmse_lan_read where id='$id' order by date desc";
 $result_lan_read = mysqli_query($link, $sql_lan_read);
 $record_lan_read = mysqli_fetch_assoc($result_lan_read);

 $sql_lan_repeat= "SELECT * FROM mmse_lan_repeat where id='$id' order by date desc";
 $result_lan_repeat = mysqli_query($link, $sql_lan_repeat);
 $record_lan_repeat = mysqli_fetch_assoc($result_lan_repeat);

 $sql_lan_write= "SELECT * FROM mmse_lan_write where id='$id' order by date desc";
 $result_lan_write = mysqli_query($link, $sql_lan_write);
 $record_lan_write = mysqli_fetch_assoc($result_lan_write);

 $sql_revise = "SELECT * FROM revise where id='$id' and revise_table='mmse' and mmse_num='$record_mmse[num]' order by date desc";
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
    <title>MMSE簡易智能檢查</title>
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
                <li class="menu-item active">
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
              var action=document.getElementById("mmse_action");
              var action_scroe = action.options[action.selectedIndex].value;
              
              var build=document.getElementById("mmse_build");
              var build_scroe = build.options[build.selectedIndex].value;

              var time=document.getElementById("mmse_time");
              var time_scroe = time.options[time.selectedIndex].value;

              var place=document.getElementById("mmse_place");
              var place_scroe = place.options[place.selectedIndex].value;

              var reg=document.getElementById("mmse_reg");
              var reg_scroe = reg.options[reg.selectedIndex].value;

              var mmse_7=document.getElementById("mmse_7");
              var mmse_7_scroe = mmse_7.options[mmse_7.selectedIndex].value;

              var recall=document.getElementById("mmse_recall");
              var recall_scroe = recall.options[recall.selectedIndex].value;

              var lan_name=document.getElementById("mmse_lan_name");
              var lan_name_scroe = lan_name.options[lan_name.selectedIndex].value;

              var lan_repeat=document.getElementById("mmse_lan_repeat");
              var lan_repeat_scroe = lan_repeat.options[lan_repeat.selectedIndex].value;

              var lan_read=document.getElementById("mmse_lan_read");
              var lan_read_scroe = lan_read.options[lan_read.selectedIndex].value;

              var lan_write=document.getElementById("mmse_lan_write");
              var lan_write_scroe = lan_write.options[lan_write.selectedIndex].value;
              
              //加總
              var sum=parseInt(action_scroe)+parseInt(build_scroe)+parseInt(time_scroe)+parseInt(place_scroe)+parseInt(reg_scroe)+parseInt(mmse_7_scroe)+parseInt(recall_scroe)+parseInt(lan_name_scroe)+parseInt(lan_repeat_scroe)+parseInt(lan_read_scroe)+parseInt(lan_write_scroe);
              //顯示
              document.getElementById("total").innerHTML=sum;
              }
          </script>
           <?php if ($record_user['doctor'] == 1 || $record_user['psychologist'] == 1){ ?>
            <?php if(empty($record_mmse['id'])){ ?>
              <script>
                swal({
                  title:'查無資料',
                  icon: 'info',
                  text:'請先新增量表資料',
                }).then(function(){
                  location.href='mmse_insert.php';
                });
              </script>
            <?php } ?>
            <?php if(isset($record_mmse['id'])){ ?>
              <form action="revise_sure.php" method="POST">
            <?php } ?> 
          <input type="hidden" name="insert" value="mmse">
          <input type="hidden" name="revise" value="mmse">
          <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-11"></div>
                      <i class='fas fa-cloud-download-alt col-md-1' style='font-size:24px' onclick=window.print()></i>
                    </div>
                    <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">MMSE簡易智能檢查</h3>
                        <div class="row align-items-top">
                          <div class="mb-3 col-md-2" style="text-align:center;margin-top:8px;">
                            <label for="firstName" class="form-label" style='font-size:16px;'>識字程度</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_reading" class="select2 form-select" id="mmse_reading">
                              <?php if($record_mmse['reading'] == '不識字'){ ?>
                                <option></option>
                                <option value="不識字" selected>不識字</option>
                                <option value="可讀不能寫">可讀不能寫</option>
                                <option value="可以讀寫">可以讀寫</option>
                              <?php }else if($record_mmse['reading'] == '可讀不能寫'){ ?>
                                <option></option>
                                <option value="不識字">不識字</option>
                                <option value="可讀不能寫" selected>可讀不能寫</option>
                                <option value="可以讀寫">可以讀寫</option>
                              <?php }else if($record_mmse['reading'] == '可以讀寫'){ ?>
                                <option></option>
                                <option value="不識字">不識字</option>
                                <option value="可讀不能寫">可讀不能寫</option>
                                <option value="可以讀寫" selected>可以讀寫</option>
                              <?php }else{ ?>
                                <option></option>
                                <option value="不識字">不識字</option>
                                <option value="可讀不能寫">可讀不能寫</option>
                                <option value="可以讀寫">可以讀寫</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-1" style="text-align:center;margin-top:8px;">
                            <label for="email" class="form-label" style='font-size:16px;'>慣用手</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_hand" class="select2 form-select">
                              <?php if($record_mmse['hand'] == '左手'){ ?>
                                <option></option>
                                <option value="左手" selected>左手</option>
                                <option value="右手">右手</option>
                              <?php }else if($record_mmse['hand'] == '右手'){ ?>
                                <option></option>
                                <option value="左手">左手</option>
                                <option value="右手" selected>右手</option>
                              <?php }else{ ?>
                                <option></option>
                                <option value="左手">左手</option>
                                <option value="右手">右手</option>
                              <?php } ?>
                            </select> 
                          </div>
                          <div class="mb-3 col-md-2"></div>
                          <div class="mb-3 col-md-1" style="text-align:center;margin-top:8px;">
                            <label for="email" class="form-label" style='font-size:16px;'>受測日期</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <input type="date" class="form-control" name="mmse_record_time"  value="<?php echo $record_mmse['record_time'] ?>">
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12" >定向感</h5>
                          <div class=" col-md-2"  style="text-align:center;margin-top:8px;">
                            <label class="form-label"style='font-size:16px;'>時間</label>
                          </div>
                          <div class=" col-md-2">
                            <div class="input-group input-group-merge">
                            <select name="mmse_time" class="select2 form-select" id="mmse_time" onchange="sum()">
                            <?php if($record_time['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_time['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_time['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_time['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_time['content'] == '4'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4" selected>4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_time['content'] == '5'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5" selected>5分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php } ?>
                            </select>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_time_text" placeholder="說明" value="<?php echo $record_time['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="state" class="form-label" style='font-size:16px;'>地方</label>
                          </div>
                          <div class=" col-md-2">
                            <select name="mmse_place" class="select2 form-select" id="mmse_place" onchange="sum()">
                            <?php if($record_place['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_place['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_place['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_place['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_place['content'] == '4'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4" selected>4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_place['content'] == '5'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5" selected>5分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php } ?>
                            </select>
                          </div> 
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_place_text" placeholder="說明" value="<?php echo $record_place['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12">注意力</h5>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label class="form-label" for="country" style='font-size:16px;'>信息登錄</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_reg" class="select2 form-select" id="mmse_reg" onchange="sum()">
                            <?php if($record_reg['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_reg['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_reg['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_reg['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_reg_text" placeholder="說明" value="<?php echo $record_reg['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div> 
                          <div class="mb-3 col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>系列減七</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_7" class="select2 form-select" id="mmse_7" onchange="sum()">
                            <?php if($record_7['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_7['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_7['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_7['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_7['content'] == '4'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4" selected>4分</option>
                              <option value="5">5分</option>
                            <?php }else if($record_7['content'] == '5'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5" selected>5分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <input type="text" class="form-control" name="mmse_7_text" placeholder="說明" value="<?php echo $record_7['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">回憶</h5>
                          <div class="col-md-2">
                            <select name="mmse_recall" class="select2 form-select" id="mmse_recall" onchange="sum()">
                            <?php if($record_recall['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_recall['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_recall['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_recall['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_recall_text" placeholder="說明" value="<?php echo $record_recall['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12">語言</h5>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>命名</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_name" class="select2 form-select" id="mmse_lan_name" onchange="sum()">
                            <?php if($record_lan_name['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                            <?php }else if($record_lan_name['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                            <?php }else if($record_lan_name['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_name_text" placeholder="說明" value="<?php echo $record_lan_name['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>複誦</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_repeat" class="select2 form-select" id="mmse_lan_repeat" onchange="sum()">
                            <?php if($record_lan_repeat['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                            <?php }else if($record_lan_repeat['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_repeat_text" placeholder="說明" value="<?php echo $record_lan_repeat['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>閱讀理解</label>
                          </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_read" class="select2 form-select" id="mmse_lan_read" onchange="sum()">
                            <?php if($record_lan_read['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                            <?php }else if($record_lan_read['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_read_text" placeholder="說明" value="<?php echo trim($record_lan_read['freetyping'])?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>書寫造句</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_write" class="select2 form-select" id="mmse_lan_write" onchange="sum()">
                            <?php if($record_lan_write['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                            <?php }else if($record_lan_write['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_write_text" placeholder="說明" value="<?php echo trim($record_lan_write['freetyping']) ?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>口語理解及行用能力</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_action" class="select2 form-select" id="mmse_action" onchange="sum()">
                            <?php if($record_act['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_act['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_act['content'] == '2'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2" selected>2分</option>
                              <option value="3">3分</option>
                            <?php }else if($record_act['content'] == '3'){ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3" selected>3分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <input type="text" class="form-control" name="mmse_action_text" placeholder="說明" value="<?php echo $record_act['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">建構力</h5>
                          <div class="col-md-2">
                            <select name="mmse_build" class="select2 form-select" id="mmse_build" onchange="sum()">
                            <?php if($record_build['content'] == '0'){ ?>
                              <option value="0" selected>0分</option>
                              <option value="1">1分</option>
                            <?php }else if($record_build['content'] == '1'){ ?>
                              <option value="0">0分</option>
                              <option value="1" selected>1分</option>
                            <?php }else{ ?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_build_text" placeholder="說明" value="<?php echo $record_build['freetyping']?>">
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                              <div class="mb-3 col-md-1 mt-3" style="text-align:center;"><br>
                                <label class="form-label"  style="font-size:16px;">原總分</label>
                                <h4><?php echo $record_mmse['total']?></h4>
                              </div>
                              <?php if (isset($record_mmse)){?>
                              <div class="mb-3 col-md-1 mt-3" style="text-align:center;">
                                <label class="form-label"  style="font-size:16px;">修改後<br>總分</label> 
                                <h4 id=total><?php echo $record_mmse['total']?></h4>
                              </div>
                              <?php }else{ ?>
                              <div class="mb-3 col-md-1 mt-3" style="text-align:center;">
                                <label class="form-label"  style="font-size:16px;">修改後<br>總分</label> 
                                <h4 id=total></h4>
                              </div>
                              <?php } ?>
                              <div class="mb-3 col-md-10 mt-3"><br>
                                  <label for="currency" class="form-label" style="font-size:16px;" >總結</label>
                                  <input type="text" class="form-control" name="mmse_freetyping" value="<?php echo trim($record_mmse['freetyping']) ?>" placeholder="總結">
                              </div>
                        <div class="mt-2" style='text-align:right;'>
                          <?php if(isset($record_revise['id'])){ ?>
                            <p style="display:inline-block;">上次修改時間&nbsp;&nbsp;<?php echo $record_revise['date'] ?>&nbsp;&nbsp;</p>
                            
                          <?php } ?>
                          <button type="submit" class="btn btn-primary me-2">修改</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{?>
            <?php if(empty($record_mmse['id'])){ ?>
            <script>
             swal({
                  title:'查無資料',
                  icon: 'info',
                  text:'請先新增量表資料',
                });
            </script>
            <?php } ?>
          <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-11"></div>
                      <i class='fas fa-cloud-download-alt col-md-1' style='font-size:24px' onclick=window.print()></i>
                    </div>
                    <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">MMSE簡易智能檢查</h3>
                        <div class="row align-items-top">
                          <div class="mb-3 col-md-2" style="text-align:center;margin-top:8px;">
                            <label for="firstName" class="form-label" style='font-size:16px;'>識字程度</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_reading" class="select2 form-select" id="mmse_reading" onchange="sum()" disabled>
                            <?php if (isset($record_mmse)){?><option value="<?php echo $record_mmse['reading'] ?>"><?php echo $record_mmse['reading'] ?></option> <?php }?>
                              <option value=""></option>
                              <option value="不識字">不識字</option>
                              <option value="可讀不能寫">可讀不能寫</option>
                              <option value="可以讀寫">可以讀寫</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-1" style="text-align:center;margin-top:8px;">
                            <label for="email" class="form-label" style='font-size:16px;'>慣用手</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_hand" class="select2 form-select" disabled>
                            <?php if (isset($record_mmse)){?><option value="<?php echo $record_mmse['hand'] ?>"><?php echo $record_mmse['hand'] ?></option> <?php }?>
                              <option value=""></option>
                              <option value="左手">左手</option>
                              <option value="右手">右手</option>
                            </select> 
                          </div>
                          <div class="mb-3 col-md-2"></div>
                          <div class="mb-3 col-md-1" style="text-align:center;margin-top:8px;">
                            <label for="email" class="form-label" style='font-size:16px;'>受測日期</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <input type="date" class="form-control" name="mmse_record_time"  value="<?php echo $record_mmse['record_time'] ?>" readonly>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12">定向感</h5>
                          <div class=" col-md-2"  style="text-align:center;margin-top:8px;">
                            <label class="form-label"style='font-size:16px;'>時間</label>
                          </div>
                          <div class=" col-md-2">
                            <div class="input-group input-group-merge">
                            <select name="mmse_time" class="select2 form-select" id="mmse_time" onchange="sum()" disabled>
                            <?php if (isset($record_time)){?><option value="<?php echo $record_time['content'] ?>"><?php echo $record_time['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            </select>
                            </div>
                          </div>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="mmse_time_text" placeholder="說明" value="<?php echo $record_time['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="state" class="form-label" style='font-size:16px;'>地方</label>
                          </div>
                          <div class=" col-md-2">
                            <select name="mmse_place" class="select2 form-select" id="mmse_place" onchange="sum()" disabled>
                            <?php if (isset($record_place)){?><option value="<?php echo $record_place['content'] ?>"><?php echo $record_place['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_place_text" placeholder="說明" value="<?php echo $record_place['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12">注意力</h5>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label class="form-label" for="country" style='font-size:16px;'>信息登錄</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_reg" class="select2 form-select" id="mmse_reg" onchange="sum()" disabled>
                            <?php if (isset($record_reg)){?><option value="<?php echo $record_reg['content'] ?>"><?php echo $record_reg['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_reg_text" placeholder="說明" value="<?php echo $record_reg['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div> 
                          <div class="mb-3 col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>系列減七</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_7" class="select2 form-select" id="mmse_7" onchange="sum()" disabled>
                            <?php if (isset($record_7)){?><option value="<?php echo $record_7['content'] ?>"><?php echo $record_7['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                              <option value="4">4分</option>
                              <option value="5">5分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <input type="text" class="form-control" name="mmse_7_text" placeholder="說明" value="<?php echo $record_7['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">回憶</h5>
                          <div class="col-md-2">
                            <select name="mmse_recall" class="select2 form-select" id="mmse_recall" onchange="sum()" disabled>
                            <?php if (isset($record_recall)){?><option value="<?php echo $record_recall['content'] ?>"><?php echo $record_recall['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_recall_text" placeholder="說明" value="<?php echo $record_recall['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-mb-12">語言</h5>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>命名</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_name" class="select2 form-select" id="mmse_lan_name" onchange="sum()" disabled>
                            <?php if (isset($record_lan_name)){?><option value="<?php echo $record_lan_name['content'] ?>"><?php echo $record_lan_name['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_name_text" placeholder="說明" value="<?php echo $record_lan_name['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>複誦</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_repeat" class="select2 form-select" id="mmse_lan_repeat" onchange="sum()" disabled>
                            <?php if (isset($record_lan_repeat)){?><option value="<?php echo $record_lan_repeat['content'] ?>"><?php echo $record_lan_repeat['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_repeat_text" placeholder="說明" value="<?php echo $record_lan_repeat['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>閱讀理解</label>
                          </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_read" class="select2 form-select" id="mmse_lan_read" onchange="sum()" disabled>
                            <?php if (isset($record_lan_read)){?><option value="<?php echo $record_lan_read['content'] ?>"><?php echo $record_lan_read['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_read_text" placeholder="說明" value="<?php echo trim($record_lan_read['freetyping'])?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="col-md-2"  style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>書寫造句</label>
                            </div>
                          <div class="col-md-2">
                            <select name="mmse_lan_write" class="select2 form-select" id="mmse_lan_write" onchange="sum()" disabled>
                            <?php if (isset($record_lan_write)){?><option value="<?php echo $record_lan_write['content'] ?>"><?php echo trim($record_lan_write['content']) ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            </select>
                          </div>
                          <div class=" col-md-8">
                            <input type="text" class="form-control" name="mmse_lan_write_text" placeholder="說明" value="<?php echo trim($record_lan_write['freetyping']) ?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <div class="mb-3 col-md-2" style="text-align:center;margin-top:8px;">
                            <label for="timeZones" class="form-label" style='font-size:16px;'>口語理解及行用能力</label>
                          </div>
                          <div class="mb-3 col-md-2">
                            <select name="mmse_action" class="select2 form-select" id="mmse_action" onchange="sum()" disabled>
                            <?php if (isset($record_act)){?><option value="<?php echo $record_act['content'] ?>"><?php echo $record_act['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                              <option value="2">2分</option>
                              <option value="3">3分</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-8">
                            <input type="text" class="form-control" name="mmse_action_text" placeholder="說明" value="<?php echo $record_act['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                          <h5 class="fw-bold pt-3 mb-3 col-md-2">建構力</h5>
                          <div class="col-md-2">
                            <select name="mmse_build" class="select2 form-select" id="mmse_build" onchange="sum()" disabled>
                            <?php if (isset($record_build)){?><option value="<?php echo $record_build['content'] ?>"><?php echo $record_build['content'] ?>分</option> <?php }?>
                              <option value="0">0分</option>
                              <option value="1">1分</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="mmse_build_text" placeholder="說明" value="<?php echo $record_build['freetyping']?>" readonly>
                            <label for="address" class="form-label">&nbsp;</label>
                          </div>
                              <div class="mb-3 col-md-2 mt-3" style="text-align:center;">
                                <label class="form-label" style="font-size:16px;">總分</label>
                                <h4 ><?php echo $record_mmse['total']?></h4>
                              </div>                  
                              <div class="mb-3 col-md-10 mt-3">
                                  <label for="currency" class="form-label" style="font-size:16px;" >總結</label>
                                  <input type="text" class="form-control" name="mmse_freetyping" value="<?php echo trim($record_mmse['freetyping']) ?>" placeholder="總結" readonly>
                              </div>
                            <div style='text-align:right;'>
                              <?php if(isset($record_revise['id'])){ ?>
                                  <p style="display:inline-block;">上次修改時間&nbsp;&nbsp;<?php echo $record_revise['date'] ?>&nbsp;&nbsp;</p>
                              <?php } ?>
                              </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
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
