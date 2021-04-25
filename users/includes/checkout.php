<?php
    session_start();

?>

<link rel="icon" type="image/ico" href="../assets/logo.png">
<?php
    include "dbconnect.php";

    //Config Code for Add Campus ------------------------------
        if(isset($_POST['chkout']))
        {
        $coCart = $_POST['chkCart'];
        $coBIDN = $_POST['chkBIDN'];
        $coMax = $_POST['maxQty'];
        $coQty = $_POST['chkQty'];
        $coPrice = $_POST['chkPrice'];
        $upQty = $coMax - $coQty;
        
        
        $upCart="UPDATE `user_cart` SET `uc_Status`='PURCHASED' WHERE `uc_CartNo`='$coCart'";
        mysqli_query($con,$upCart);
        $upBooks="UPDATE `user_books` SET `ub_Qty`=$upQty WHERE `ub_BIDN`='$coBIDN'";
        mysqli_query($con,$upBooks);
        $order="INSERT INTO `book_orders`(`bo_CartNo`, bo_BIDN, `bo_Qty`, `bo_Price`) VALUES('$coCart','$coBIDN','$coQty','$coPrice')";
        mysqli_query($con,$order);
        echo "<script>alert('Purchased successfully!')</script>";				
        echo "<script>window.open('../orders.php','_self')</script>";
        
        if($upQty==0){
            $upBooks="UPDATE `user_books` SET `ub_Status`='OUT OF STOCK' WHERE `ub_BIDN`='$coBIDN'";
            mysqli_query($con,$upBooks);
        }
        }
        
        

?>