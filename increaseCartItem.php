<?php
    include('allMethods.php');
    $cartid = $_GET['cartid'];

    $res = increaseCart($cartid);

    header('location: cart.php');
?>