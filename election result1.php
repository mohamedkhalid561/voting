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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>
<body>
<style>
    body{
        background-color: #dddce1;
        }
    *{
        margin: 0;
        padding: 0;
    }
    #contento{
            margin: 4px;
            padding: 5px;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    #content{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            margin: 4px;
        }
    </style>


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
        array_push($r,$row['id2']);
 }
    $num = count($r);
    $v= (array_count_values($r));
    arsort($v);
      
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
          echo '<center>
          <div class="content" id="content">
          <div class="card w-50" >
          <div class="card-body">'.
          "<h3>".
          "The Winner is".
          "<br>".
          $row['username'].
          "<br>".
          $row['year'].
          "</h3>".
          '<a class="btn btn-primary" href="testlogin.php">تسجيل خروج</a>
          </div>
          </div>
         </div>
         </center>';     
     }
    }


    foreach($v as $key=>$value){
        $query3="SELECT * FROM admin1 where id in ($key)";
        $result3=mysqli_query($connect,$query3);
        $row3=mysqli_fetch_assoc($result3);   
        $percent = $value/$num*"100";
        echo '<center>
        <div class="content" id="content">
        <div class="card w-50" >
        <div class="card-body">'.
        "Name : ".
        $row3['username'].
        "<br>".
        "ID : ".
        $key.
        "<br>".
        "Votes : ".
        $value.
        "<br>".
        '<div class="progress">'.
        '<div class="progress-bar" role="progressbar"
        style='.
        "width:".
        round($percent,2).
        '%;"'.
        'aria-valuenow='.
        round($percent,2).
        'aria-valuemin="0"'.
        'aria-valuemax="100">'.
        round($percent,2). "%".
        '</div>
        </div>'.
        "% : ".
        round($percent,2).
        "<br>".
        '</div>
     </div>
    </div>
    </center>';
    }


     

    
    ?>
    </ul>
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
        echo  '<a href="testlogin.php">العودة للصفحة الرئيسية</a>';

    }
?>