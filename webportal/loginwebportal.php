<?php
session_start();
require 'connect.php';
if(empty($_SESSION['user'])){
    $sql="SELECT * FROM users";
    $res=mysqli_query($conn,$sql);
    if($res===false){
    echo mysqli_error($conn);
}
else{
    $User=mysqli_fetch_all($res,MYSQLI_ASSOC);
}
}

else{
    header('Location: profile.php');
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style8.css">
    <style>
            .box p.message{
            border: 2px solid #ffa908;
            border-radius: 3px;
            padding:10px;
            text-align: center;
            font-weight: bold;
            color: white;
            }
    </style>
</head>
<body>
    <form class="box" action="signin.php" method="POST">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="button" value="Login">
    <?php
            
            if(empty($_SESSION['message'])){
                echo"";
            }
            else if ($_SESSION['message']) {
                echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>