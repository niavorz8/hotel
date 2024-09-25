<?php
    include('../inc/Function.php');

    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $result = login($email, $pwd);

    if ($result == null) {
        header('Location:../index.php');
    }
    
    header('Location:../Pages/client.php');

?>