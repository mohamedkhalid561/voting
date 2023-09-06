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
  <title>Vote</title>
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

    <?php
            $query2="SELECT * FROM vot";
            $result2=mysqli_query($connect,$query2);
            $row2=mysqli_fetch_assoc($result2);
    
          echo
         
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
        <!--  -->
        <?php
        $query="SELECT * FROM logins where id=".$_GET['id'];
        $result=mysqli_query($connect,$query);
        if(! $result){
            die ("error in query");
        }
       ?>  
        <?php
        $row=mysqli_fetch_assoc($result);
        ?>

        <?php
        
        echo 
        '<div class="row">'.
        '<div class="col-md-12 grid-margin">'.
          '<div class="d-flex justify-content-between align-items-center">'.
            '<div>'.
              '<h3 class="font-weight-bold mb-0">'.'مرحباً '.$row['username'].'</h3>'.
            '</div>'.
            '<div>'.
            '<small class="text-muted">'.
            $row['year'].
                  '</small>'.
            '</div>'.
          '</div>'.
        '</div>'.
      '</div>';
         
            $query3="SELECT * FROM admin1";
            $result3=mysqli_query($connect,$query3);
            if(! $result3){
                die ("error in query");
            }
           ?> 
           <div class="row">
            <?php
            while($row3=mysqli_fetch_assoc($result3)){
                echo 
                '<div class="col-md-3 grid-margin stretch-card">'.
                '<div class="card" style="width: 18rem;">'.
                '<img src="'.$row3['images'].'" class="card-img-top" style="max-width:800px; height:auto;" alt="...">'.
                '<div class="card-body">
                <h5 class="card-title">'.
                $row3['username'].
                '</h5>
                <p class="card-text">'.
                $row3['year'].
                '</p>'.
                '<a class="btn btn-primary"'. "href='votscript.php?id1=".
                $_GET['id'].
                '&'.
                "id2=".
                $row3['id'].
                '&'. 
                "name=".
                $row3['username'].
                "'>صوت</a>".
                "</div>
                </div>
                </div>
                ";
            }
            ?>
            </center>
            <?php  
  mysqli_free_result($result);
  ?>

        <!--  -->
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

</html>