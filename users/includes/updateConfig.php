<?php
    session_start();
?>

<?php
include "dbconnect.php";

    //Config Code for Update Profile ------------------------------
    if(isset($_POST['namedit']))
    {
    $uID = $_POST['eID'];
    $ufname = $_POST['eFname'];
    $ulname = $_POST['eLname'];

    $nameDate = "UPDATE `accounts` SET `first_name`='$ufname',`last_name`='$ulname' WHERE `uid`=$uID";
    mysqli_query($con,$nameDate);
        echo "<script>alert('Update Profile has been changed successfully!')</script>";				
        echo "<script>window.open('../myAccount.php','_self')</script>";
    }

    //Config Code for Email ------------------------------
    if(isset($_POST['cEmail']))
    {
    $uID = $_POST['eID'];
    $uEmail = $_POST['eEmail'];

    $emailDate = "UPDATE `accounts` SET `email`='$uEmail' WHERE `uid`='$uID'";
    mysqli_query($con,$emailDate);
        echo "<script>alert('New Email has been changed successfully!')</script>";				
        echo "<script>window.open('../myAccount.php','_self')</script>";
    }

    
    //Config Code for Address ------------------------------
    if(isset($_POST['cAddress']))
    {
    $uID = $_POST['eID'];
    $uAddress = $_POST['eAddress'];

    $emailDate = "UPDATE `accounts` SET `address`='$uAddress' WHERE `uid`='$uID'";
    mysqli_query($con,$emailDate);
        echo "<script>alert('New Address has been changed successfully!')</script>";				
        echo "<script>window.open('../myAccount.php','_self')</script>";
    }

    //Config Code for Username ------------------------------
    if(isset($_POST['cUser']))
    {
    $uID = $_POST['eID'];
    $eUsername = $_POST['eUsername'];

    $userDate = "UPDATE `accounts` SET `username`='$eUsername' WHERE `uid`='$uID'";
    mysqli_query($con,$userDate);
        echo "<script>alert('New Username has been changed successfully. You will be signed out automatically to apply the changes.')</script>";				
        echo "<script>window.open('../logout.php','_self')</script>";
    }
    

    //Config Code for Password ------------------------------
    if(isset($_POST['cPass']))
    {
    $uID = $_POST['eID'];
    $uOld = $_POST['eOldpass'];
    $uNPass = $_POST['eNewpass'];
    $uRPass = $_POST['eRepass'];

    $check_pass="select * from accounts WHERE uid='$uID' AND password='$uOld'";
    $run_query=mysqli_query($con,$check_pass);

    if(mysqli_num_rows($run_query)>0)
    {
        if($uRPass==$uNPass){
            $passDate = "UPDATE `accounts` SET `password`='$uNPass' WHERE `uid`='$uID'";
            mysqli_query($con,$passDate);
                echo "<script>alert('New Password has been changed successfully!')</script>";				
                echo "<script>window.open('../myAccount.php','_self')</script>";
        }
        else{
            echo"<script>alert('Password not match. Please try again!')</script>";	
            echo "<script>window.open('../myAccount.php','_self')</script>";
        }
    
    }else{
        echo "<script>alert('Password is Incorrect!')</script>";
        echo "<script>window.open('../myAccount.php','_self')</script>";	
        exit();	
    }
        
    }

    //Config Code for Book Update ------------------------------
        if(isset($_POST['updatebtn']))
        {
        $ubIDN = $_POST['bkIDN'];
        $ubTitle = $_POST['bkTitle'];
        $ubStatus = $_POST['bkStatus'];
        $ubPrice = $_POST['bkPrice'];
        $ubQty = $_POST['bkQty'];

        $upBook = "UPDATE user_books SET ub_Title='$ubTitle', ub_Qty=$ubQty ,ub_Price=$ubPrice,ub_Status= '$ubStatus'  WHERE ub_BIDN=$ubIDN";
        mysqli_query($con,$upBook);
            echo "<script>alert('Your Book is now updated!')</script>";		
            echo "<script>window.open('../myShop.php','_self')</script>";
        }
?>