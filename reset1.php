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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
       $query="TRUNCATE TABLE admin1;";
       $result=mysqli_query($connect,$query);
       if($result){
           echo "ok";
       }else{
           echo 'error';
       }
       $query1="TRUNCATE TABLE logins;";
       $result1=mysqli_query($connect,$query1);
       if($result1){
           echo "ok";
       }else{
           echo 'error';
       }
        $query2="TRUNCATE TABLE vot;";
        $result2=mysqli_query($connect,$query2);
        if($result2){
            echo "ok";
        }else{
            echo 'error';
        }
        header("Location: admin.php?id=".$_GET['id']);
        

    ?>
     

</body>
</html>

<?php
mysqli_close($connect);

?>