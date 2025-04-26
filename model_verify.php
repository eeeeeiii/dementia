<?php
    session_start();
    $id=$_SESSION['id'];
    $link = mysqli_connect("localhost", "root", "", "subject");
  
    $sql = "SELECT id, name , hsex FROM patient_basic where id='$id'";
    $result = mysqli_query($link, $sql);
    $record = mysqli_fetch_assoc($result); 

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
    <title>外部資料驗證</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
      .mb-3.col-md-2 {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      table{
      width:100%;
      table-layout: fixed;
      overflow-wrap: break-word;
      font-size:22px;
        
      }
      td{
        padding:15px;
        border:gray;
      }
    </style>
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
            <li class="menu-item active open">
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
                <li class="menu-item active">
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
         
            if ($_FILES['csv']['error'] === UPLOAD_ERR_OK){  
              $allowedMimeTypes = ['text/csv', 'text/plain', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
              if (in_array($_FILES['csv']['type'], $allowedMimeTypes)) {
                $file = $_FILES['csv']['tmp_name'];
                $_FILES['csv']['name']="external_data.csv";
                $dest = 'upload/' . $_FILES['csv']['name'];
                move_uploaded_file($file, $dest);
                $upload_success=1;
                echo '<script>
                      swal({
                        title:"上傳成功",
                        icon: "success",
                      });
                    </script>';
              }else{
                $upload_success=0;
                echo '<script>
                          swal({
                            title:"請選擇excel格式的檔案",
                            icon: "warning",
                          });
                      </script>';
              }
              
            } 
          
          ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card" style="max-height:max-content">
                    <div class="card-body">
                      <h3 class="fw-bold py-3 mb-4" style='text-align:center'><span class="text">外部資料驗證</span></h3>
                      <div class="mt-3" style='text-align:center;'>
                        <form method="post" enctype="multipart/form-data">
                          <div class="mb-4 row" style='justify-content: space-evenly'>
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="csv" accept=".xlsx, .csv, .xls">
                            </div>
                            <div class="col-md-2">
                              <button class="btn btn-primary me-2" style="font-size:16px;">上傳</button>
                              
                            </div>
                            <div class="col-md-3"></div>
                          </div>  
                        </form>
                        

                        <div class="row  align-items-center">
                        <div class="mb-4 col-md-12 "></div>
                        <div class="mb-4 col-md-3 "></div>
                          <div class="mb-4 col-md-2 " style="text-align:right;">
                            <label class="form-label"  style='font-size:16px;'>檔案名稱</label>
                          </div>
                          <div class="mb-4 col-md-2 ">
                            <input class="form-control" type="text" value="<?php if ($upload_success==1){echo $_FILES['csv']['name'];} ?>" readonly>
                          </div>
                          <div class="mb-4 col-md-5 " id=mean></div>
                          <div class="mb-4 col-md-3 "></div>
                          <div class="mb-4 col-md-2 " style="text-align:right;">
                            <label class="form-label"  style='font-size:16px;'>檔案類型</label>
                          </div>
                          <div class="mb-4 col-md-2 ">
                            <input class="form-control" type="text" value="<?php  if ($upload_success==1){ echo $_FILES['csv']['type'];}?>" readonly>
                          </div>
                          <div class="mb-4 col-md-5 "></div>
                          <div class="mb-4 col-md-3 "></div>
                          <div class="mb-4 col-md-2 " style="text-align:right;">
                            <label class="form-label"  style='font-size:16px;'>檔案大小</label>
                          </div>
                          <div class="mb-4 col-md-2 ">
                            <input class="form-control" type="text" value="<?php if ($upload_success==1){echo intval(($_FILES['csv']['size'] / 1024)),"KB";}?>" readonly>
                          </div>
                          <div class="mb-4 col-md-3 "></div>
                          <div class="mb-4 col-md-3 "></div>
                          <div class="mb-4 col-md-2 " style="text-align:right;">
                            <label class="form-label"  style='font-size:16px;'>資料筆數</label>
                          </div>
                          <div class="mb-4 col-md-2 ">
                            <input class="form-control" type="text" id="data_nums" value="" readonly>
                          </div>
                          <div class="mb-4 col-md-2 "><button id="evaluate" class="btn btn-primary me-2" style="font-size:16px;">評估</button></div>
                          <div class="mb-4 col-md-2 "></div>
                          <script>
                            $(document).ready(function() {
                              $("#evaluate").on("click", function() {
                                
                                axios.post('http://127.0.0.1:8000/verify')
                                .then(response => {
                                  //python回傳結果
                                  //CART
                                  function addValue(value,element) {
                                    element.innerHTML = value;
                                  }

                                  addValue(response.data.acc_verify,document.getElementById('testing_acc_cart'));
                                  addValue(response.data.f1s_verify,document.getElementById('testing_f1s_cart'));
                                  addValue(response.data.pre_verify,document.getElementById('testing_pre_cart'));
                                  addValue(response.data.sen_verify,document.getElementById('testing_sen_cart'));
                                  addValue(response.data.spe_verify,document.getElementById('testing_spe_cart'));

                                  addValue(response.data.old_acc,document.getElementById('old_acc'));
                                  addValue(response.data.old_f1s,document.getElementById('old_f1s'));
                                  addValue(response.data.old_pre,document.getElementById('old_pre'));
                                  addValue(response.data.old_sen,document.getElementById('old_sen'));
                                  addValue(response.data.old_spe,document.getElementById('old_spe'));

                                  const data_nums  = document.getElementById("data_nums");
                                  data_nums.value =  response.data.de_ex_nums;

                                  function statistics(field) {
                                    const avg = document.getElementById(`avg_${field}`);
                                    avg.innerHTML = response.data[`avg_${field}`];

                                    const max = document.getElementById(`max_${field}`);
                                    max.innerHTML = response.data[`max_${field}`];

                                    const min = document.getElementById(`min_${field}`);
                                    min.innerHTML = response.data[`min_${field}`];

                                    const std = document.getElementById(`std_${field}`);
                                    std.innerHTML = response.data[`std_${field}`];

                                    const variable= document.getElementById(`var_${field}`);
                                    variable.innerHTML = response.data[`var_${field}`];

                                    const median = document.getElementById(`median_${field}`);
                                    median.innerHTML = response.data[`median_${field}`];
                                  }

                                  const fields = [
                                    'age',
                                    'memory',
                                    'orientation',
                                    'judgment',
                                    'community',
                                    'hobbies',
                                    'personal_care',
                                    'mmse_ori',
                                    'mmse_time',
                                    'mmse_place',
                                    'mmse_reg',
                                    'mmse_att',
                                    'mmse_recall',
                                    'mmse_lang'
                                  ];

                                  for (let i = 0; i < fields.length; i++) {
                                    statistics(fields[i]);
                                  }


                                });
                                const divcontent = document.getElementById("output");
                                divcontent.style.display = "block";
                            });

                          });
                          </script>
                        <div id="output" style="display:none;margin-top:5%">
                          <table>
                            <tr>
                              <th style="border-bottom:solid 2px #E0E0E0;"></th>
                              <th style="border-left:solid 2px #E0E0E0;border-bottom:solid 2px #E0E0E0;padding-left:1%">Testing <br>ACC</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">Testing <br>F1S</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">Testing <br>PRE</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">Testing <br>SEN</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">Testing <br>SPE</th>
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">CART</th>
                              <td id="testing_acc_cart"></td>
                              <td id="testing_f1s_cart"></td>
                              <td id="testing_pre_cart"></td>
                              <td id="testing_sen_cart"></td>
                              <td id="testing_spe_cart"></td>
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">原本模型</th>
                              <td id="old_acc"></td>
                              <td id="old_f1s"></td>
                              <td id="old_pre"></td>
                              <td id="old_sen"></td>
                              <td id="old_spe"></td>
                            </tr>
                          </table>
                          <br><br>
                          <table>
                            <tr>
                              <th style="border-bottom:solid 2px #E0E0E0;">敘述統計</th>
                              <th style="border-left:solid 2px #E0E0E0;border-bottom:solid 2px #E0E0E0;padding-left:1%">平均值</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">最大值</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">最小值</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">標準差</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">變異數</th>
                              <th style="border-bottom:solid 2px #E0E0E0;">中位數</th>
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">AGE</th>
                              <td id="avg_age"></td>
                              <td id="max_age"></td>
                              <td id="min_age"></td>
                              <td id="std_age"></td>
                              <td id="var_age"></td>
                              <td id="median_age"></td>  
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">memory</th>
                              <td id="avg_memory"></td>
                              <td id="max_memory"></td>
                              <td id="min_memory"></td>
                              <td id="std_memory"></td>
                              <td id="var_memory"></td>
                              <td id="median_memory"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">orientation</th>
                              <td id="avg_orientation"></td>
                              <td id="max_orientation"></td>
                              <td id="min_orientation"></td>
                              <td id="std_orientation"></td>
                              <td id="var_orientation"></td>
                              <td id="median_orientation"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">judgment</th>
                              <td id="avg_judgment"></td>
                              <td id="max_judgment"></td>
                              <td id="min_judgment"></td>
                              <td id="std_judgment"></td>
                              <td id="var_judgment"></td>
                              <td id="median_judgment"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">community</th>
                              <td id="avg_community"></td>
                              <td id="max_community"></td>
                              <td id="min_community"></td>
                              <td id="std_community"></td>
                              <td id="var_community"></td>
                              <td id="median_community"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">hobbies</th>
                              <td id="avg_hobbies"></td>
                              <td id="max_hobbies"></td>
                              <td id="min_hobbies"></td>
                              <td id="std_hobbies"></td>
                              <td id="var_hobbies"></td>
                              <td id="median_hobbies"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">personal_care</th>
                              <td id="avg_personal_care"></td>
                              <td id="max_personal_care"></td>
                              <td id="min_personal_care"></td>
                              <td id="std_personal_care"></td>
                              <td id="var_personal_care"></td>
                              <td id="median_personal_care"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">mmse_ori</th>
                              <td id="avg_mmse_ori"></td>
                              <td id="max_mmse_ori"></td>
                              <td id="min_mmse_ori"></td>
                              <td id="std_mmse_ori"></td>
                              <td id="var_mmse_ori"></td>
                              <td id="median_mmse_ori"></td>  
                            </tr>

                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">mmse_time</th>
                              <td id="avg_mmse_time"></td>
                              <td id="max_mmse_time"></td>
                              <td id="min_mmse_time"></td>
                              <td id="std_mmse_time"></td>
                              <td id="var_mmse_time"></td>
                              <td id="median_mmse_time"></td> 
                            </tr>
                            
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">MMSE_place</th>
                              <td id="avg_mmse_place"></td>
                              <td id="max_mmse_place"></td>
                              <td id="min_mmse_place"></td>
                              <td id="std_mmse_place"></td>
                              <td id="var_mmse_place"></td>
                              <td id="median_mmse_place"></td>  
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">MMSE_reg</th>
                              <td id="avg_mmse_reg"></td>
                              <td id="max_mmse_reg"></td>
                              <td id="min_mmse_reg"></td>
                              <td id="std_mmse_reg"></td>
                              <td id="var_mmse_reg"></td>
                              <td id="median_mmse_reg"></td>  
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">MMSE_att</th>
                              <td id="avg_mmse_att"></td>
                              <td id="max_mmse_att"></td>
                              <td id="min_mmse_att"></td>
                              <td id="std_mmse_att"></td>
                              <td id="var_mmse_att"></td>
                              <td id="median_mmse_att"></td>  
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">MMSE_recall</th>
                              <td id="avg_mmse_recall"></td>
                              <td id="max_mmse_recall"></td>
                              <td id="min_mmse_recall"></td>
                              <td id="std_mmse_recall"></td>
                              <td id="var_mmse_recall"></td>
                              <td id="median_mmse_recall"></td>  
                            </tr>
                            <tr>
                              <th style="border-right:solid 2px #E0E0E0;">MMSE_lang</th>
                              <td id="avg_mmse_lang"></td>
                              <td id="max_mmse_lang"></td>
                              <td id="min_mmse_lang"></td>
                              <td id="std_mmse_lang"></td>
                              <td id="var_mmse_lang"></td>
                              <td id="median_mmse_lang"></td>  
                            </tr>
                        </table>
                          <div class="mt-2" style='text-align:right;'>
                                <p style="display:inline-block;" >原模型建模時間:</p>
                                <p style="display:inline-block;" >2023-03-11</p>
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
