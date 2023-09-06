
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

$id1;
$id2;
    
    // print_r($_GET);
    // echo "<br>";
    $id1=$_GET['id1'];
//     echo "your cod ". $id1;
//    echo "<br>";
  $id2=$_GET['id2'];
//   echo "vot cod " .$id2;
//    echo "<br>";
//    echo "name voting ". $_GET['name'];


   $query="INSERT INTO `vot` (`id1`, `id2`) VALUES ('".$id1. "','". $id2."' )";
   $result=mysqli_query($connect,$query);

    if( $result){
        echo "<br> record is vot ";
    }else{

        die ("error in query");
    }
   ?>  

<?php
    
    $query1="SELECT * FROM admin1";
    $result1=mysqli_query($connect,$query1);
    if(! $result1){
        die ("error in query");
    }
   ?>  
   <ul>
    <?php

    print_r($_GET);

    while($row1=mysqli_fetch_assoc($result1)){

        echo '<li>id '. $row1['id']. '<br>' .'username:'. $row1['username']. "<br>"
        . "year:". $row1['year']. "<br>" ;
        if($row1['id']==$_GET['id2']){
          echo  "<a > vot احمر</a>";
        }else{
            echo  "<a > vot ازرق</a>";
        }

    }
    $query2="delete  FROM logins where id=" .$_GET['id1'] ;
    $result2=mysqli_query($connect,$query2);
    if( $result2){
        echo "</br>data is inerted";
        header("Location: vot_d.php?id=".$_GET['id1']);
    }

    ?>
    </ul>
    

    <a href="testlogin.php">تسجيل خروج</a>

    <?php

    mysqli_free_result($result1);

    ?>
</body>
</html>



<?php
mysqli_close($connect);

?>