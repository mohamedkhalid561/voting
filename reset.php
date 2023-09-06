<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1> للنظام reset هل تريد عمل  </h1>

    <?php
    echo  '<a href="reset1.php?id='.$_GET["id"].'">نعم</a>';
    echo "<br> ";
     echo  '<a href="admin.php?id='.$_GET["id"].'">لا</a>';
?>

</body>
</html>