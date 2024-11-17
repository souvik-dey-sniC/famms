<?php
    include('allMethods.php');

    $pid = $_GET['pid'];

    session_start();

    $email = "";

    if($_SESSION['email']) {
        $email = $_SESSION['email'];
        $qnt = 1;
        $res = addToCart($pid, $email);

        header('location: index.php?message='.$res);
    }
    else {
        header('location: userLogin.php');
    }

    
?>