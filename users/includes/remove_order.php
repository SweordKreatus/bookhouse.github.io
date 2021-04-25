<?php
    include_once("dbconnect.php");
    $upDate="UPDATE `user_cart` SET`uc_Status`='REMOVED' WHERE `uc_CartNo`='".$_GET['order_id']."'";
    $query=mysqli_query($con,$upDate) or die($upDate);
    //header("Location: ../orders.php");
    echo "<script>alert('Your Order is now Cancelled.')</script>";	
    echo "<script>window.open('../orders.php','_self')</script>";
?>