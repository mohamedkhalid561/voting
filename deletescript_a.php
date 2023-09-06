
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

<?php
    
    
    $query="delete  FROM admin2 where id=" .$_GET['id1'] ;
    $result=mysqli_query($connect,$query);
    if( $result){
         header("Location: admin.php?id=".$_GET['id_d']);
    }else{

        die ("error in query");
    }
   ?>  


<?php
mysqli_close($connect);

?>