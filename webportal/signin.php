<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['username'];
    $password =$_POST['password'];

    $check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `Username` = '$login' AND `Password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['Id'],
            "Name" => $user['Name'],
            "Surname" => $user['Surname'],
            "Username" => $user['Username'],
            "Password" =>$user['Password'],
            "Status" =>$user["Status"]
        ];

        header('Location: profile.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: loginwebportal.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
