<?php
    include('allMethods.php');
    $pid = $_GET['pid'];
    $response = deleteProduct($pid);
    if($response == 1)
    {
        echo "Delete Success";
    }
    else
    {
        echo "Delete Failed";
    }
?>