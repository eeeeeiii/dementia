<?php
  session_start();
  $link = mysqli_connect("localhost", "root", "", "subject");

  $sql_user = "SELECT * FROM user";
  $result_user = mysqli_query($link, $sql_user);
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
    <title>管理人員</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   

  </head>

  <body>

  <style>
    table{
      table-layout: fixed;
    }
    form{
      display: inline;
    }
  </style>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <div class="layout col-12">
          <nav
            class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style='font-size:23px; color:#566a7f'>失智症輔助系統</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

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
                <?php echo $_SESSION['name']; ?>&nbsp;&nbsp;&nbsp;
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
            <div class="flex-grow-1 container-p-y">
                <div style="margin-right:1.5%; margin-left:1.5%;"> 
                  <div class="card">
                    <div class="card-body">
                      <div class="row" style="justify-content: flex-end">
                          
                          <button type="submit" style="width:130px;" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalInsert">新增人員</button>
                      </div>
                        <br><br>
                        <div align="center"><h3><b>人員管理</b></h3></div>
                        <table id="myDataTable" class="row-border" style="text-align:center;" >
                          <thead>
                            <tr>
                              <th><font size="3" >帳號</font></th>
                              <th><font size="3" >姓名</font></th>
                              <th><font size="3" >信箱</font></th>
                              <th><font size="3" >電話</font></th>
                              <th><font size="3" >服務單位</font></th>
                              <th><font size="3" >權限</font></th>
                              <th><font size="3" >狀態</font></th>
                              <th><font size="3" >操作</font></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while($record_user = mysqli_fetch_assoc($result_user)){ ?>
                              <tr>
                                <td><font size="3" ><?php echo $record_user['account'];?></font></td>
                                <td><font size="3" ><?php echo $record_user['name'];?></font></td>
                                <td><font size="3" ><?php echo $record_user['email'];?></font></td>
                                <td><font size="3" ><?php echo $record_user['phone'];?></font></td>
                                <td><font size="3" ><?php echo $record_user['service'];?></font></td>
                                <td><font size="3" >
                                <?php
                                  if($record_user['manager'] == 1){
                                    echo "管理者";
                                  }else{
                                    if ($record_user['doctor'] == 1) {
                                      if ($record_user['personal_manager'] == 1) {
                                          if ($record_user['nurse'] == 1) {
                                              if ($record_user['psychologist'] == 1) {
                                                  echo "醫師、個管師、護理師、心理師";
                                              } else {
                                                  echo "醫師、個管師、護理師";
                                              }
                                          } elseif ($record_user['psychologist'] == 1) {
                                              echo "醫師、個管師、心理師";
                                          } else {
                                              echo "醫師、個管師";
                                          }
                                      } elseif ($record_user['nurse'] == 1) {
                                          if ($record_user['psychologist'] == 1) {
                                              echo "醫師、護理師、心理師";
                                          } else {
                                              echo "醫師、護理師";
                                          }
                                      } elseif ($record_user['psychologist'] == 1) {
                                          echo "醫師、心理師";
                                      } else {
                                          echo "醫師";
                                      }
                                  } elseif ($record_user['personal_manager'] == 1) {
                                      if ($record_user['nurse'] == 1) {
                                          if ($record_user['psychologist'] == 1) {
                                              echo "個管師、護理師、心理師";
                                          } else {
                                              echo "個管師、護理師";
                                          }
                                      } elseif ($record_user['psychologist'] == 1) {
                                          echo "個管師、心理師";
                                      } else {
                                          echo "個管師";
                                      }
                                  } elseif ($record_user['nurse'] == 1) {
                                      if ($record_user['psychologist'] == 1) {
                                          echo "護理師、心理師";
                                      } else {
                                          echo "護理師";
                                      }
                                  } elseif ($record_user['psychologist'] == 1) {
                                      echo "心理師";
                                  } else {
                                      echo "";
                                  }
                                  }
                                  ?>
                                </font></td>	
                                <td><font size="3" >
                                <?php 
                                  if($record_user['pass'] == 0){echo '<div style="background-color: #FFD5C9;">未認證</div>';}
                                  else{echo '<div style="background-color: 	#E0E0E0">已認證</div>';}
                                ?>
                                </font></td>
                                <td>
                                  <font size="3" >
                                    <button id="openModalButton" class="btn" data-bs-toggle="modal" data-bs-target="#modalUpdate" onclick="openModal(this)" data-value="<?php echo $record_user['account'] ?>"><i class='fas fa-edit'></i></button>
                                    <form action="manage_deleteSure.php" method="POST">
                                      <button type="submit" class="btn" name="account_index" value="<?php echo $record_user['account'] ?>"><i class='fas fa-trash'></i></button>
                                    </form>
                                  </font>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- modalUpdate -->
  <form id="updateForm" action="revise.php" method="POST">
  <div class="modal fade" id="modalUpdate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalCenterTitle"><b>修改人員(<span id="modalValue"></span>)</b></h3>
          <input type="hidden" name="modalValue" id="modalValueInput">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="revise" value="user"> 
          <p class="modal-title" id="modalCenterTitle">權限</p>
          <input type="checkbox" name="doctor_update" class="btn-check" value="1" id='doctor_update' autocomplete="off" />
          <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="doctor_update">醫師</label> 
          <input type="checkbox" name="personal_manager_update" class="btn-check" value="1" id='personal_manager_update' autocomplete="off" />
          <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="personal_manager_update">個管師</label> 
          <input type="checkbox" name="psychologist_update" class="btn-check" value="1" id='psychologist_update' autocomplete="off" />
          <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="psychologist_update">心理師</label> 
          <input type="checkbox" name="nurse_update" class="btn-check" value="1" id='nurse_update' autocomplete="off" />
          <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="nurse_update">護理師</label> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary">修改</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function openModal(button) {
    const value = button.getAttribute('data-value');
    document.getElementById('modalValue').textContent = value;
    document.getElementById('modalValueInput').value = value;
    document.getElementById('modalUpdate').style.display = 'block';
  }

  const openModalButtons = document.querySelectorAll('.openModalButton');
  openModalButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      openModal(this);
    });
  });
</script>

    <!-- modalInsert -->
  <div class="modal fade" id="modalInsert" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalCenterTitle"><b>新增人員</b></h3>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <form action="insert.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="insert" value="user">
            <input type="text" class="form-control" name="email" style="border-color: #8592a3;" placeholder="信箱" required>
            <br>
            <input type="text" class="form-control" name="account" style="border-color: #8592a3;" placeholder="帳號" required>
            <hr>
            <p class="modal-title" id="modalCenterTitle">權限</p>
            <input type="checkbox" name="doctor_insert" class="btn-check" value="1" id='doctor_insert' autocomplete="off" />
            <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="doctor_insert">醫師</label> 
            <input type="checkbox" name="personal_manager_insert" class="btn-check" value="1" id='personal_manager_insert' autocomplete="off" />
            <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="personal_manager_insert">個管師</label> 
            <input type="checkbox" name="psychologist_insert" class="btn-check" value="1" id='psychologist_insert' autocomplete="off" />
            <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="psychologist_insert">心理師</label> 
            <input type="checkbox" name="nurse_insert" class="btn-check" value="1" id='nurse_insert' autocomplete="off" />
            <label class="btn btn-outline-secondary mb-2 d-grid w-100" for="nurse_insert">護理師</label> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              取消
            </button>
            <button type="submit" class="btn btn-primary">新增</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        "columnDefs": [
            {
                "targets": 0, // 第1列
                "width": "10%" // 設置寬度
            },
            {
                "targets": 1, // 第2列
                "width": "10%" // 設置寬度
            },
            {
                "targets": 2, // 第3列
                "width": "27%" // 設置寬度
            },
            {
                "targets": 3, // 第4列
                "width": "8%" // 設置寬度
            },
            {
                "targets": 4, // 第5列
                "width": "14%" // 設置寬度
            },
            {
                "targets": 5, // 第6列
                "width": "15%" // 設置寬度
            },
            {
                "targets": 6, // 第7列
                "width": "8%" // 設置寬度
            },
            {
                "targets": 7, // 第8列
                "width": "9%" // 設置寬度
            },
        ],
        "language": {
        "lengthMenu": "顯示 _MENU_ 項結果",
        "zeroRecords": "沒有符合的結果",
        "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
        "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
        "search": "搜尋：",
        "paginate": {
            "first": "首頁",
            "previous": "上一頁",
            "next": "下一頁",
            "last": "末頁"
        },
      },
      lengthMenu: [10, 25, 50, 100],
      })
    });
  </script>

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
