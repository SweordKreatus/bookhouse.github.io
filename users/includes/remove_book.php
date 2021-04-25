<?php
    include_once("dbconnect.php");
    $DelBook="UPDATE `user_books` SET `ub_Status` ='REMOVED' WHERE `ub_BIDN`='".$_GET['book_id']."'";
    $query=mysqli_query($con,$DelBook) or die($DelBook);
    //header("Location: ../orders.php");
    echo "<script>alert('Your Book is now deleted!')</script>";	
    echo "<script>window.open('../myShop.php','_self')</script>";
?>