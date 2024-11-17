<?php
    include('allMethods.php');
    $cartid = $_GET['cartid'];
    $qnt = $_GET['qnt'];

    if($qnt == 1) {
        deleteCartByCartid($cartid);
    }
    else {
        $res = decreaseCart($cartid);
    }

    header('location: cart.php');
?>