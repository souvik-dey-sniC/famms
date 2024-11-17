<?php
    include('allMethods.php');
    $cartid = $_GET['cartid'];
    $response = deleteCartByCartid($cartid);
    
    header("location: cart.php");
?>