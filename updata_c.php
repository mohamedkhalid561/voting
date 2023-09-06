<?php

$host= "127.0.0.1";//رقم الهوست
$user="root";//اليوزر
$password="";//الباسورد
$database="zosar";//اسم الداتا بيز

$connect= mysqli_connect($host,$user,$password,$database);//دالة الكونكت

if(mysqli_connect_errno()){//لو لا يمكن الاتصال ارسل no connect و اسم الايرور
    die("no connect". mysqli_connect_error ());
}else{
    echo "data is connect";//فى حالة الاتصال اطبع 
}
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
  <title>Update Candidates</title>
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
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="https://static.vecteezy.com/system/resources/previews/005/544/718/original/profile-icon-design-free-vector.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
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
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="font-family: 'Cairo', sans-serif;">

        <!-- php -->
        <?php
        if(isset($_POST['cansubmit'])){
          $tm=md5(time());
          $fnm=$_FILES["pic"]["name"];
          $dst="./pics/".$tm.$fnm;
          $dst1="pics/".$tm.$fnm;
          move_uploaded_file($_FILES["pic"]["tmp_name"],$dst);
            $canuser=$_POST['canname'];
            $canid=$_POST['canid'];
            $canyear=$_POST['canyear'];
            if ($canid>100&&$canid<300){
            if($canid != null & $canuser!=null & $canyear!=null & $dst1!=null){
                $query1="SELECT * FROM admin1 where id in ($canid) ";
                $result1=mysqli_query($connect,$query1);
                $row1=mysqli_fetch_assoc($result1);
                if($canid != @$row1['id']|| $canid==$_GET['id1']){
                $query1="SELECT * FROM admin1 where id in ($canid) ";
                $result1=mysqli_query($connect,$query1);
                $row1=mysqli_fetch_assoc($result1);

            $query="update `admin1` set id= '".$canid."', username='". $canuser. "', year='".$canyear. "', images='".$dst1."' where id=".$_GET['id1'] ;
            $result=mysqli_query($connect,$query);
            if( $result){
                echo "</br>data is inerted";
                header("Location: admin.php?id=".$_GET['id2']);
            }else{
                echo "data not inerted";
            }
        }else{
            echo "id مدخل من قبل";
        }
            }else{
                echo "ادخل البيانات";
            }
        }else{
            echo "300 النطاق من 200 الي<br>خارج النطاق";
        }

        }
        ?>
            <!-- end php -->
 
    <?php
            $query2="SELECT * FROM vot";
            $result2=mysqli_query($connect,$query2);
            $row2=mysqli_fetch_assoc($result2);
    
          echo
          '<li class="nav-item">'.
          '<a class="nav-link"'.
          'href=admin.php?id='.
          $_GET['id2'].
          '>'.
              '<i class="ti-shield menu-icon"></i>'.
              '<span class="menu-title">لوحة التحكم</span>'.
            '</a>'.
          '</li>'.
            '<li class="nav-item">'.
            '<a class="nav-link" href="testlogin.php">'.
            '<i class="ti-power-off menu-icon"></i>'.
                '<span class="menu-title">تسجيل الخروج</span>'.
                '</a>'.
                '</li>';
          ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel" style="direction: rtl; font-family: 'Cairo', sans-serif;">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0">تعديل</h3>
                </div>
              </div>
            </div>
          </div>


        <!-- update Candidate -->
        <div class="row">
            <!-- update -->
            <div class="col-md-6 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">تعديل المترشحين</h4>
                  <p class="card-description">
                    قم بتعديل بيانات المترشح
                  </p>
                  <form method='POST' class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">الرقم التعريفى</label>
                      <?php
                      echo '<input value="'.$_GET['id1'].'" name="canid" type="number" class="form-control" id="exampleInputName1" placeholder="ID">'
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">الأسم</label>
                      <?php
                      echo '<input value="'.$_GET['name']. ' " name="canname" type="text" class="form-control" id="exampleInputName1" placeholder="Name">';
                    ?>
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
                    <button name="cansubmit" type="submit" class="btn btn-primary me-2" href="admin.php">تعديل</button>
                  </form>
                </div>
              </div>
            </div>

            <!--  -->
          </div>
<!-- end students -->

        <!-- end add student -->
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
<?php
mysqli_close($connect);

?>
