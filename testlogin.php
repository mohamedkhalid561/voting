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
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;900&family=Mochiy+Pop+P+One&family=Poppins&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  </head>
<!-- css style -->
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .form{
        margin: 50px;
        padding: 20px;
    }
</style>
<body style="font-family: 'Cairo', sans-serif;
">

<!-- 
    <form  method='POST' class="form">

id:<input type='number' name='user'>
</br>

<input type='submit' name='submit' value='log in'>

</form> 
 -->

<!-- 
    <form method='POST'> 
  <div class="form">
    <label for="InputID" class="form-label">Insert ID :</label>
    <input type="number" name='user' class="form-control" id="InputID" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your ID with anyone else.</div>
    <input type='submit' name='submit' class="btn btn-primary" value='log in'>
  </div>
</form>
-->
<section class="vh-100" style="
background-color: #dddce1;
background-position: center;
background-size: cover;
">
  <div class="container py-5 h-100" style="z-index=2;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/logimg.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center" style="direction: rtl;">
              <div class="card-body p-4 p-lg-5 text-black">
                <!-- CODE -->
                <form method='POST'>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">معهد زوسر</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">قم بأدخال الرقم التعريفى الخاص بك للتصويت.</h5>

                  <div class="form-outline mb-4">
                    <input type="number" name='user' id="form2Example17" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button name='submit' type='submit' class="btn btn-dark btn-lg btn-block" type="button">تسجيل دخول</button>
                  </div>
                  <!--  -->
                  <?php

                if(isset($_POST['submit'])){
                     $user=$_POST['user'];

                    if($user!= null){
                        $query="SELECT * FROM logins where id in ($user) ";
                        $result=mysqli_query($connect,$query);
                        $query1="SELECT * FROM  admin2 where id in ($user)";
                        $result1=mysqli_query($connect,$query1);
                        $query2="SELECT * FROM  vot where id1 in ($user)";
                        $result2=mysqli_query($connect,$query2);
                    }else{
                        header("Location: testlogin.php");
                    }
                    
                    if(! $result  ){
                        die ("error in query");
                    }
                
                    $row=mysqli_fetch_assoc($result);
                    $row1=mysqli_fetch_assoc($result1);
                    $row2=mysqli_fetch_assoc($result2);


                
                

                    if($row != null ){
                      date_default_timezone_set("Africa/Cairo");
                      $query2="SELECT * FROM date1";
                      $result2=mysqli_query($connect,$query2);
                      $row2=mysqli_fetch_assoc($result2);
                      if(date("Y-m-d")>=$row2['date']){
                         header("Location: election result1.php?id=$user");
                      }else{
                        header("Location: user.php?id=$user");
                     }
                       
                        }
                    elseif($row1 != null ){
                        header("Location: admin.php?id=$user");
                    }elseif($row2 != null){ 
                      date_default_timezone_set("Africa/Cairo");
                      $query2="SELECT * FROM date1";
                      $result2=mysqli_query($connect,$query2);
                      $row2=mysqli_fetch_assoc($result2);
                      if(date("Y-m-d")>=$row2['date']){
                        header("Location: election result1.php?id=$user");
                      }else{
                        header("Location: vot_d.php?id=$user");
                      }
                    }
                    else{
                            echo '<div class="alert alert-danger"> الرقم غير صحيح </div>';
                    }
                    

                    mysqli_free_result($result);
                    mysqli_free_result($result1);

                    }                               

                    ?>
                  <!-- /CODE -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
</body>

</html>

<?php
mysqli_close($connect);

?>