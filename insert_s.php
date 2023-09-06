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
            $query="INSERT INTO `logins` (`id`,`username`, `year`) VALUES ( '". $id. "','". $user. "','". $year."' )";
            $result=mysqli_query($connect,$query);
            if( $result){
                echo "</br>data is inerted";
                header("Location: student.php?id=".$_GET['id']);
           
       
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
        echo "199 النطاق من 0 الي<br>خارج النطاق";
    }

        }

      

   
   ?>  



<form  method='POST'>

id: <input type='number' name='id'>

name:<input type='text' name='user'>
</br>
year : <select name="year">
    <option value="الفرقة الاولة"> الفرقة الاولة</option>
    <option value="الفرقة الثانية">الفرقة الثانية</option>
    <option value="الفرقة الثالثة"> الفرقة الثالثة</option>
    <option value="الفرقة الرابعة">الفرقة الرابعة</option>
</select>
</br>
<input type='submit' name='submit' value='inerted'>

</form>


  
</body>
</html>

<?php
    echo  '<a href="student.php?id='.$_GET['id'].'">العودة للصفحة البيانات</a>';

mysqli_close($connect);

?>