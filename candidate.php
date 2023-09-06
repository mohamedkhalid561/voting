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
    
    $query="SELECT * FROM admin1";
    $result=mysqli_query($connect,$query);
    if(! $result){
        die ("error in query");
    }
   ?>  
   <ul>
    <?php

   

    echo "<a href=insert_c.php?id=".$_GET['id'].">insert</a>"."<br>";
   

    while($row=mysqli_fetch_assoc($result)){

        echo 'id '. $row['id']. '<br>' .'username:'. $row['username']. "<br>"
        . 'year: '.$row['year']."<br>"
        ."<a href=updata_c.php?id1=".$row['id'].'&name='.$row['username'].'&id2='.$_GET['id'].'&year='.$row['year']."'>updata</a>"."<br>"
        ."<a href=' deletescript_c.php?id1=".$row['id'].'&id_d='.$_GET['id']."'>del</a> ".
        "<br>";
    }

        echo  '<a href="admin.php?id='.$_GET['id'].'">العودة للصفحة الرئيسية</a>';
    ?>
    
    </ul>

    <?php

    mysqli_free_result($result);

    ?>
</body>
</html>

<?php
mysqli_close($connect);

?>