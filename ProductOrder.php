<?php
include('allMethods.php');

$response = orderProduct($_POST);

if($response > 0) {
    echo "Order Data Added";
}
else {
    echo "Something Error!";
}

?>