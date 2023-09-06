
<?php

$host= "127.0.0.1";//رقم الهوست
$user="root";//اليوزر
$password="";//الباسورد
$database="zosar";//اسم الداتا بيز

$connect= mysqli_connect($host,$user,$password,$database);//دالة الكونكت
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;900&family=Mochiy+Pop+P+One&family=Poppins&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>VotingSys - Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


  <div class="container-scroller">
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/royalui/"><i class="ti-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="ti-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="direction: rtl;">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="index.html"><img src="images/logoo.svg" class="me-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logoo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <!--  
        <ul class="navbar-nav navbar-nav-left">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="https://static.vecteezy.com/system/resources/previews/005/544/718/original/profile-icon-design-free-vector.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-left navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="testlogin.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        -->
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- --------------- -->

        <?php
    $adm = [];
    $query="SELECT * FROM admin2 where id=".$_GET['id'];
    $result=mysqli_query($connect,$query);
    $query2="SELECT * FROM admin2";
    $result2=mysqli_query($connect,$query2);
    if(! $result){
        die ("error in query");
    }
    while($row2=mysqli_fetch_assoc($result2)){
        array_push($adm,$row2['id']);
    }
    $admcalc = count($adm);
   ?>  
    <?php
    $row=mysqli_fetch_assoc($result);
    ?>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="font-family: 'Cairo', sans-serif;">
          
          <?php
          echo
          '<li class="nav-item">'.
          '<a class="nav-link" href="admin.php?id='.$_GET["id"].'">'.
              '<i class="ti-shield menu-icon"></i>'.
              '<span class="menu-title">لوحة التحكم</span>'.
            '</a>'.
          '</li>'.
          '<li class="nav-item">'.
          /*'<a class="nav-link" href="student.php?id='.$_GET["id"].'">'.*/
          '<a class="nav-link" href="#students">'.
              '<i class="ti-user menu-icon"></i>'.
              '<span class="menu-title">الطلاب</span>'.
           '</a>'.
          '</li>'.
          '<li class="nav-item">'.
          '<a class="nav-link" href="#candidate">'.
            '<i class="ti-user menu-icon"></i>'.
            '<span class="menu-title">المترشحين</span>'.
          '</a>'.
        '</li>'.
        '<li class="nav-item">'.
        '<a class="nav-link" href="#admins">'.
        '<i class="ti-crown menu-icon"></i>'.
          '<span class="menu-title">المسئولين</span>'.
        '</a>'.
      '</li>'.
      '<li class="nav-item">'.
        '<a class="nav-link" href="#date">'.
        '<i class="ti-calendar menu-icon"></i>'.
          '<span class="menu-title">تاريخ التصويت</span>'.
        '</a>'.
      '</li>'.
      '<li class="nav-item">'.
      '<a class="nav-link" href="election result.php?id='.$_GET["id"].'">'.
      '<i class="ti-bar-chart-alt menu-icon"></i>'.
        '<span class="menu-title">نتيجة التصويت</span>'.
      '</a>'.
    '</li>'.
    '<li class="nav-item">'.
    '<a class="nav-link" href="reset.php?id='.$_GET["id"].'">'.
    '<i class="ti-reload menu-icon"></i>'.
      '<span class="menu-title">إعادة ضبط</span>'.
    '</a>'.
  '</li>'.
  '<li class="nav-item">'.
  '<a class="nav-link" href="testlogin.php">'.
  '<i class="ti-power-off menu-icon"></i>'.
    '<span class="menu-title">تسجيل خروج</span>'.
    '</a>'.
    '</li>';
          ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel" style="font-family: 'Cairo', sans-serif;">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0"></h4>
                </div>
                <div>
                  <h4 class="font-weight-bold mb-0">لوحة التحكم</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-center">اجمالى الطلاب</p>
                  <div class="d-flex flex-wrap justify-content-evenly justify-content-md-center justify-content-xl-evenly align-items-center">
                  <!-- Students -->
                  <?php
                    $r=[];
                    $vs=[];
                    $can=[];
                    $query1="SELECT * FROM logins";
                    $result1=mysqli_query($connect,$query1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        array_push($r,$row1['id']);
                }
                //--------------------------------------------
                    $query2="SELECT * FROM vot";
                    $result2=mysqli_query($connect,$query2);
                    while($row2=mysqli_fetch_assoc($result2)){
                        array_push($vs,$row2['id2']);
                }
                $v= (array_count_values($vs));
                arsort($v);
                $w=max($v);
                $f= array_keys($v,$w);
                $q=gettype(@$f['1']);
                foreach($f as $m){
                    $query="SELECT * FROM admin1 where id in ($m) ";
                    $result=mysqli_query($connect,$query);
                    $row=mysqli_fetch_assoc($result);
                    if($q != "NULL"){
                      $draw = "Draw";
                } else{
                    $winname = $row['username'];
                }
            }
                //--------------------------------------------- 
                 
                $query3="SELECT * FROM admin1";
                $result3=mysqli_query($connect,$query3);
                while($row3=mysqli_fetch_assoc($result3)){
                    array_push($can,$row3['id']);
                }
                $stu = count($r);
                $num = count($r) + count($vs);
                $votedstu = count($vs);
                $cancalc = count($can);
                ?>  
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                    <?php echo $num;?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">الطلاب المصوتين</p>
                  <div class="d-flex flex-wrap justify-content-evenly justify-content-md-center justify-content-xl-evenly align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                        <?php echo $votedstu;?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">المترشحين</p>
                  <div class="d-flex flex-wrap justify-content-evenly justify-content-md-center justify-content-xl-evenly align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                        <?php echo $cancalc;?></h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">المسئولين</p>
                  <div class="d-flex flex-wrap justify-content-evenly justify-content-md-center justify-content-xl-evenly align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                        <?php echo $admcalc;?></h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card border-bottom-0">
                <div class="card-body pb-0">
                  <p class="card-title">نسبة المشاركة</p>
                  <p class="text-muted font-weight-light">هنا يتم عرض معدل المشاركة وإحصائيات الانتخابات الحالية حتى يتمكن المشرف من اتخاذ القرارات المناسبة</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="me-5 mt-3">
                      <p class="text-muted">نسبة المشاركة</p>
                      <?php
                      $prate = $votedstu/$num*100;
                      ?>
                      <h3><?php echo round($prate,1)."%";?></h3>
                    </div>
                    <div class="me-5 mt-3">
                      <p class="text-muted">اعداد التصويت</p>
                      <h3><?php echo $votedstu;?></h3>
                    </div>
                    <div class="me-5 mt-3">
                      <p class="text-muted">الفائز</p>
                      <h3><?php if($q != "NULL"){
                        echo "Draw";
                      }else{
                        echo $winname;
                      }
                      ?></h3>
                    </div>
                  </div>
                </div>
                <canvas id="order-chart" class="w-100"></canvas>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">نتيجة التصويت</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>المترشحين</th>
                          <th>الفرقة</th>
                          <th>النسبة المئوية</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($v as $key=>$value){
                            $query3="SELECT * FROM admin1 where id in ($key)";
                            $result3=mysqli_query($connect,$query3);
                            $row3=mysqli_fetch_assoc($result3);   
                            $percent = $value/$votedstu*"100";
                            echo 
                            '<tr>'.
                            '<td>'.
                            $row3['username'].
                            '</td>'.
                            '<td>'.
                            $row3['year'].
                            '</td>'.
                            '<td class="text-success">'.
                             round($percent,2).
                             "%". 
                             '<i class="ti-arrow-up">'.
                             '</i>'.
                             '</td>'.
                          '</tr>';  
                        }                        
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- Add Student -->
        <div class="row" id="students">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">
                        قم بـ اضافة او حذف طالب
                      </small>
                </div>
                <div>
                  <h3 class="font-weight-bold mb-0">الطلاب</h3>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">الطلاب</p>
                  <div class="table-responsive" style="overflow-x:hidden;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>الأسم</th>
                          <th>الفرقة</th>
                          <th>رقم</th>
                          <th>حذف</th>
                          <th>تعديل</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query1="SELECT * FROM logins";
                        $result1=mysqli_query($connect,$query1);
                        while($row1=mysqli_fetch_assoc($result1)){
                          $sc=$row1['username'];
                          $yc=$row1['year'];
                            echo 
                            '<tr>'.
                            '<td>'.
                            $row1['username'].
                            '</td>'.
                            '<td>'.
                            $row1['year'].
                            '</td>'.
                            '<td class="text-success">'.
                             $row1['id'].
                             '</td>'.
                             '<td>'.
                             "<a class='text-danger' style='text-decoration:none' href='deletescript_S.php?id1=".$row1['id'].'&id_d='.$_GET['id']."'>حذف</a> ".
                             '<i class="ti-trash text-danger">'.
                             '</i>'.
                             '</td>'.
                             '<td>'.
                             "<a class='text-primary' style='text-decoration:none' href=updata_s.php?id1=".
                             $row1['id'].
                             '&id2='.
                             $_GET['id'].
                             '&name='.urlencode($sc).
                              '&year='.urlencode($yc).
                             "'>تعديل</a> ".
                             '<i class="ti-export" style="color:darkblue"> '.
                             '</i>'.
                            '</td>'.
                             '</tr>'; 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">اضافة طالب</h4>
                  <p class="card-description">
                    قم بـ اضافة طالب
                  </p>
                  <form method='POST' class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">الرقم تعريفى</label>
                      <input name="id" type="number" class="form-control" id="exampleInputName1" placeholder="ID">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">الأسم</label>
                      <input name="user" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">الفرقة</label>
                        <select name="year" class="form-control" id="exampleSelectGender">
                          <option value="الفرقة الاولى">الفرقة الاولى</option>
                          <option value="الفرقة الثانية">الفرقة الثانية</option>
                          <option value="الفرقة الثالثة">الفرقة الثالثة</option>
                          <option value="الفرقة الرابعة">الفرقة الرابعة</option>
                        </select>
                      </div>
                    <button name="submit" type="submit" class="btn btn-primary me-2" href="admin.php">اضافة</button>
                <!-- php -->
                <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $user=$_POST['user'];
                    $year=$_POST['year'];
                    if ($id>0&&$id<200){
                    if($id != null & $user!=null & $year!=null ){
                        $query1="SELECT * FROM logins where id in ($id) ";
                        $result1=mysqli_query($connect,$query1);
                        $row1=mysqli_fetch_assoc($result1);
                        $query2="SELECT * FROM vot where id1=".$id;
                        $result2=mysqli_query($connect,$query2);
                        $row2=mysqli_fetch_assoc($result2);
                        if($id != @$row1['id']&&$id!= @$row2['id1']){  
                        $query3="INSERT INTO `logins` (`id`,`username`, `year`) VALUES ( '". $id. "','". $user. "','". $year."' )";
                        $result3=mysqli_query($connect,$query3);
                        if( $result3){
                          echo '<div class="alert alert-success" style="margin=20px">'.
                          'تم اضافة الطالب'.
                          '</div>';

                       echo "  <script>
                            window.location.href='admin.php?id=".$_GET['id']."';
                          </script>";

                        }else{
                          echo '<div class="alert alert-danger" style="margin=20px">'.
                          'لم يتم اضافة الطالب قم باعادة المحاولة'.
                          '</div>';
                        }
                   
                        }else{
                          echo '<div class="alert alert-danger" style="margin=20px">'.
                          'هذا الرقم التعريفى مأخوذ من قبل'.
                          '</div>';
                        }
                      
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'قم بكتابة جميع البيانات'.
                      '</div>';
                }
            
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'الرقم التعريفى يجب ان يكون ما بين ال 1 للـ 199'.
                      '</div>';
                }
                }
                 
               ?>              
            <!-- end php -->

                  </form>
                </div>
              </div>
            </div>
          </div>
<!-- end students -->

            <!-- add can -->
            <div class="row" id="candidate">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">
                قم ب اضافة او حذف مترشح
                      </small>
                </div>

                <div>
                  <h3 class="font-weight-bold mb-0">المترشحين</h3>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card" id="can">
                <div class="card-body">
                  <p class="card-title mb-0">المترشحين</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>الأسم</th>
                          <th>الفرقة</th>
                          <th>رقم</th>
                          <th>حذف</th>
                          <th>تعديل</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query1="SELECT * FROM admin1";
                        $result1=mysqli_query($connect,$query1);
                        while($row1=mysqli_fetch_assoc($result1)){
                          $sc=$row1['username'];
                          echo 
                          '<tr>'.
                          '<td>'.
                          $row1['username'].
                          '</td>'.
                          '<td>'.
                          $row1['year'].
                          '</td>'.
                          '<td class="text-success">'.
                           $row1['id'].
                           '</td>'.
                           '<td>'.
                           "<a class='text-danger' style='text-decoration:none' href='deletescript_c.php?id1=".$row1['id'].'&id_d='.$_GET['id']."'>حذف</a> ".
                           '<i class="ti-trash text-danger">'.
                           '</i>'.
                           '</td>'.
                           '<td>'.
                           "<a class='text-primary' style='text-decoration:none;' href=updata_c.php?id1=".
                           $row1['id'].
                           '&id2='.
                           $_GET['id'].
                           '&images='.$row1['images'].
                           '&name='.urlencode($sc).
                           '&year='.$row1['year'].
                           "'>تعديل </a>".
                           '<i class="ti-export" style="color:darkblue">'.
                           '</i>'.
                          '</td>'.
                           '</tr>'; 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <div class="col-md-6 grid-margin stretch-card" style="direction: rtl;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">اضافة مترشح</h4>
                  <p class="card-description">
                  قم بـ اضافة مترشح
                  </p>
                  <form method='POST' class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">الرقم التعريفى</label>
                      <input name="canid" type="number" class="form-control" id="exampleInputName1" placeholder="ID">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">الأسم</label>
                      <input name="canuser" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">الفرقة</label>
                        <select name="canyear" class="form-control" id="exampleSelectGender">
                        <option value="الفرقة الثانية">الفرقة الثانية</option>
                          <option value="الفرقة الثالثة">الفرقة الثالثة</option>
                          <option value="الفرقة الرابعة">الفرقة الرابعة</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputName1">صورة المترشح</label>
                      <input name="pic" type="file" required="" class="form-control" id="exampleInputfile1" placeholder="Image">
                    </div>
                    <button name="cansubmit" type="submit" class="btn btn-primary me-2" href="admin.php">اضافة</button>
            <!-- php -->
          <?php
             if(isset($_POST['cansubmit'])){
                $tm=md5(time());
                $fnm=$_FILES["pic"]["name"];
                $dst="./pics/".$tm.$fnm;
                $dst1="pics/".$tm.$fnm;
                move_uploaded_file($_FILES["pic"]["tmp_name"],$dst);
                 $canid=$_POST['canid'];
                 $canuser=$_POST['canuser'];
                 $canyear=$_POST['canyear'];
                 if ($canid>100&&$canid<300){
                 if($canid != null & $canuser!=null & $canyear!=null ){
                     $query1="SELECT * FROM admin1 where id in ($canid) ";
                     $result1=mysqli_query($connect,$query1);
                     $row1=mysqli_fetch_assoc($result1);
                     if($canid != @$row1['id']){
                         
                     $query="INSERT INTO `admin1` (`id`,`username`, `year`, `images`) VALUES ( '". $canid. "','". $canuser. "','". $canyear."','". $dst1."')";
                     $result=mysqli_query($connect,$query);
                     if( $result){
                      echo '<div class="alert alert-success" style="margin=20px">'.
                      'تمت اضافة مترشح'.
                      '</div>';
                      echo "  <script>
                      window.location.href='admin.php?id=".$_GET['id']."';
                    </script>";
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'لم تتم الاضافة حاول مجددا'.
                      '</div>';
                    }
               
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'الرقم التعريفى مأخوذ بالفعل'.
                      '</div>';
                    }
                  
                }else{
                  echo '<div class="alert alert-danger" style="margin=20px">'.
                  'ادخل البيانات كاملة'.
                  '</div>';
            }
        
                }else{
                  echo '<div class="alert alert-danger" style="margin=20px">'.
                  'يجب ان يكون الرقم التعريفى من 200 ل 299'.
                  '</div>';
            }
            }
             
            ?>  
         
          <!-- end php -->
                  </form>
                </div>
              </div>
            </div>

            <!-- end can -->
            <!-- add admin -->
            <div class="row" id="admins">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">
                قم بـ اضافة او حذف مسؤول
                      </small>
                </div>
                <div>
                  <h3 class="font-weight-bold mb-0">المسؤولين</h3>
                </div>
              </div>
            </div>
          </div>

            <div class="row">
            <div class="col-md-7 grid-margin stretch-card" style="direction: rtl;">
              <div class="card" id="can">
                <div class="card-body">
                  <p class="card-title mb-0">المسؤولين</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>الأسم</th>
                          <th>الدور</th>
                          <th>رقم</th>
                          <th>حذف</th>
                          <th>تعديل</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query1="SELECT * FROM admin2";
                        $result1=mysqli_query($connect,$query1);
                        while($row1=mysqli_fetch_assoc($result1)){
                          $sc=$row1['username'];
                          echo 
                          '<tr>'.
                          '<td>'.
                          $row1['username'].
                          '</td>'.
                          '<td>'.
                          $row1['job'].
                          '</td>'.
                          '<td class="text-success">'.
                           $row1['id'].
                           '</td>'.
                           '<td>'.
                           "<a class='text-danger' style='text-decoration:none' href='deletescript_a.php?id1=".$row1['id'].'&id_d='.$_GET['id']."'>حذف</a> ".
                           '<i class="ti-trash text-danger">'.
                           '</i>'.
                           '</td>'.
                           '<td>'.
                           "<a class='text-primary' style='text-decoration:none' href=updata_a.php?id1=".
                           $row1['id'].
                           '&id2='.
                           $_GET['id'].
                           '&name='.urlencode($sc).
                           '&job='.
                           $row1['job'].
                           "'>تعديل</a> ".
                           '<i class="ti-export" style="color:darkblue"> '.
                           '</i>'.
                          '</td>'.
                           '</tr>'; 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <div class="col-md-5 grid-margin stretch-card" style="direction: rtl;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">اضافة مسؤول</h4>
                  <p class="card-description">
                  قم بـ اضافة مسؤول
                  </p>
                  <form method='POST' class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">الرقم التعريفى</label>
                      <input name="admid" type="number" class="form-control" id="exampleInputName1" placeholder="ID">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">الأسم</label>
                      <input name="admuser" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">الدور</label>
                        <select name="admjob" class="form-control" id="exampleSelectGender">
                          <option value="Admin">مسؤول</option>
                        </select>
                      </div>
                    <button name="admsubmit" type="submit" class="btn btn-primary me-2" href="admin.php">اضافة</button>
                                          <!-- php -->
          <?php
             if(isset($_POST['admsubmit'])){
                 $admid=$_POST['admid'];
                 $admuser=$_POST['admuser'];
                 $admjob=$_POST['admjob'];
                 if ($admid>300&&$admid<400){
                 if($admid != null & $admuser!=null & $admjob!=null ){
                     $query1="SELECT * FROM admin2 where id in ($admid) ";
                     $result1=mysqli_query($connect,$query1);
                     $row1=mysqli_fetch_assoc($result1);
                     if($admid != @$row1['id']){
                         
                     $query="INSERT INTO `admin2` (`id`,`username`, `job`) VALUES ( '". $admid. "','". $admuser. "','". $admjob."' )";
                     $result=mysqli_query($connect,$query);
                     if( $result){
                      echo '<div class="alert alert-success" style="margin=20px">'.
                      'تم اضافة مسؤول'.
                      '</div>';
                      echo "  <script>
                      window.location.href='admin.php?id=".$_GET['id']."';
                      </script>";
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'لم يتم الاضافة حاول مجدداً'.
                      '</div>';
                    }
               
                    }else{
                      echo '<div class="alert alert-danger" style="margin=20px">'.
                      'الرقم التعريفى مأخوذ بالفعل'.
                      '</div>';
                    }
                  
                }else{
                  echo '<div class="alert alert-danger" style="margin=20px">'.
                  'قم ب ادخال جميع البيانات'.
                  '</div>';
            }
        
                }else{
                  echo '<div class="alert alert-danger" style="margin=20px">'.
                  'الرقم التعريفى يجب ان يكون ما بين الـ 300 الى 399'.
                  '</div>';
            }
            }
             
            ?>  
         
          <!-- end php -->
                  </form>
                </div>
              </div>
            </div>
            <!-- end admin -->
                        <!-- add date -->

          <!-- php -->
          <?php

          $query5="SELECT * FROM date1";
          $result5=mysqli_query($connect,$query5);
          $row5=mysqli_fetch_assoc($result5);


          if(isset($_POST['datesubmit'])){
          $date=$_POST['date'];
          if($date!= null){
          $query1="SELECT * FROM date1";
          $result1=mysqli_query($connect,$query1);
          $row1=mysqli_fetch_assoc($result1);
          if($row1==null){
              $query="INSERT INTO `date1` (`date`) VALUES ( '". $date. "' )";
              $result=mysqli_query($connect,$query);
          }else{
              $query="UPDATE `date1` SET `date` = '".$date."' WHERE `date1`.`date` = '".$row1['date']."'";
              $result=mysqli_query($connect,$query);
          }
          }else{

          echo 'ادخل البيانات';
          }



          }


          ?>
  
          <!-- end php -->
            <div class="row" id="date">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted">
                ظبط تاريخ لانتهاء عملية التصويت
                      </small>
                </div>
                <div>
                  <h3 class="font-weight-bold mb-0">التاريخ</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
          <form class="form-control"  method='POST' style="direction: rtl;" >
        <input class="form-control" type='date' name='date'>
        </br>
        <input class="btn btn-primary" type='submit' name='datesubmit' value='اضافة'>
        <?php
        echo '<div class="alert alert-light" role="alert">'.
        "تنتهى عملية التصويت يوم  ". @$row5['date'].
      '</div>';
        ?>
        </form>

          </div>
<!--  -->
            <!-- end Date -->
        <!-- end add student -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>
