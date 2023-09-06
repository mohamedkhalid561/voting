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
    
    $query1="SELECT * FROM vot";
    $result1=mysqli_query($connect,$query1);
    $row1=mysqli_fetch_assoc($result1);
    // echo $row1['id1'];

    if(@$row1['id1']!=null ){

    $query="SELECT * FROM vot";
    $result=mysqli_query($connect,$query);
    if(! $result){
        die ("error in query");
    }
   ?>  
   <ul>
    <?php
    $r=[];
    
    while($row=mysqli_fetch_assoc($result)){

        // echo '<li>id '. $row['id1']. '<br>' .'username:'. $row['id2']. "<br>";


        array_push($r,$row['id2']);
 

        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

 }
    
    echo "<pre>";
     $v= (array_count_values($r));
     arsort($v);
     print_r($v);
    echo "</pre>";
      

      $w=max($v);

    
     $f= array_keys($v,$w);
     
     $q=gettype(@$f['1']);
    

     foreach($f as $m){
        $query="SELECT * FROM admin1 where id in ($m) ";
        $result=mysqli_query($connect,$query);
        $row=mysqli_fetch_assoc($result);
        if($q != "NULL"){
            echo " تعدل <br>";
         }else{
            echo " فوز المرشح"."<br>";
         }
          echo 'id '. $row['id']. '<br>' .'username:'. $row['username']. "<br>"
            .$row['year']."<br>" ;
     }

     

    
    ?>
    </ul>
     <?php
    echo  '<a href="admin.php?id='.$_GET["id"].'">العودة للصفحة الرئيسية</a>';
    ?>
    <?php

    mysqli_free_result($result);

    ?>
</body>
</html>

<?php
mysqli_close($connect);

    }else{
        echo "<br>";
        echo "لايوجد بيانات";
        echo "<br>";
        echo  '<a href="admin.php?id='.$_GET['id'].'">العودة للصفحة الرئيسية</a>';

    }
?>