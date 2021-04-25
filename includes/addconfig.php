
<link rel="icon" type="image/ico" href="../assets/logo.png">
<?php
    include "dbconnect.php";

    //Config Code for Feedback/Messages ------------------------------
        if(isset($_POST['contact']))
        {
        $fd_name = $_POST['name'];
        $fd_email = $_POST['email'];
        $fd_message = $_POST['message'];
        
        
        $contact="INSERT INTO `feedback`( `fd_name`, `fd_email`, `fd_message`, `fd_type`, `fd_status`) VALUES ('$fd_name','$fd_email','$fd_message','MESSAGE','UNREAD')";
            mysqli_query($con,$contact);
            echo "<script>alert('Your Feedback/Message has been sent! Thank you for messaging us.')</script>";				
            echo "<script>window.open('../index.php#contact','_self')</script>";
        }
?>