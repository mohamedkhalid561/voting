
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;900&family=Mochiy+Pop+P+One&family=Poppins&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطأ</title>
</head>
<!-- css style -->
<style>
    body{
        background-color: #dddce1;
    }
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

<?php
    $query2="Select * FROM vot where id2=".$_GET['id1'];
    $result2=mysqli_query($connect,$query2);
    $row2=mysqli_fetch_assoc($result2);
    if($_GET['id1']==$row2['id2']){
        echo '
        <div class="card text-center">
  <div class="card-header">
خطأ  </div>
  <div class="card-body">
    <h5 class="card-title">خطأ!</h5>
    <p class="card-text">هذا المترشح لا يمكن حذفه, لقد تم التصويت له بالفعل</p>'.
    '<a href="admin.php?id='.$_GET['id_d']. '"class="btn btn-primary">لوحة التحكم</a>
  </div>
  <div class="card-footer text-muted">
   لا يمكن حذف مترشح بعد ان يتم التصويت له
  </div>
</div>
        ';
    }else{
    $query="delete  FROM admin1 where id=" .$_GET['id1'] ;
    $result=mysqli_query($connect,$query);
    header("Location: admin.php?id=".$_GET['id_d']);
    }
   ?>  


<?php
mysqli_close($connect);

?>
</body>
</html>