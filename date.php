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

       $query2="SELECT * FROM date1";
       $result2=mysqli_query($connect,$query2);
       $row2=mysqli_fetch_assoc($result2);

       echo @$row2['date'];

if(isset($_POST['submit'])){
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
            header("Location: date.php?id=".$_GET['id']);
        }
    }else{

        echo 'ادخل البيانات';
    }
    


}


?>



<form  method='POST'>
date <input type='date' name='date'>
</br>
<input type='submit' name='submit' value='inerted'>

</form>

<?php

echo  '<a href="admin.php?id='.$_GET['id'].'">العودة للصفحة الرئيسية</a>';



?>



     

</body>
</html>

<?php
mysqli_close($connect);

?>