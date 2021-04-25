<?php
    session_start();

?>

<link rel="icon" type="image/ico" href="../assets/logo.png">
<?php
    include "dbconnect.php";

    //Config Code for Feedback/Messages ------------------------------
        if(isset($_POST['genreg']))
        {
        $nGenre = $_POST['genre'];
        
        
        $genre="INSERT INTO `book_category`(`Category`) VALUES ('$nGenre')";
            mysqli_query($con,$genre);
            echo "<script>alert('New Book Category has been added!')</script>";				
            echo "<script>window.open('../manage_page.php#book_category','_self')</script>";
        }

    //Config Code for Feedback/Messages [Mark as Read]------------------------------
        if(isset($_POST['vMMaR']))
        {
        $RefNo = $_POST['refNO'];
        $date = date_default_timezone_get();
        
        $MaRead="UPDATE feedback SET fd_type='FEEDBACK',fd_status='READ',fd_readDate='$date' WHERE fd_RefNo=$RefNo";
            mysqli_query($con,$MaRead);			
            echo "<script>alert('Messages has been Mark as Read')</script>";	
            echo "<script>window.open('../manage_page.php#feedback&messages','_self')</script>";
        }

    //Config Code for Feedback/Messages [Display as Feedback]------------------------------
        if(isset($_POST['vMFeed']))
        {
        $RefNo = $_POST['refNO'];
        
        
        $MaRead="UPDATE feedback SET fd_type='FEEDBACK',fd_status='READ' WHERE fd_RefNo=$RefNo";
            mysqli_query($con,$MaRead);		
        $MaRead="INSERT INTO `feedmsg`(`fd_RefNo`, `fm_Name`, `fm_Email`, `fm_Message`, `fm_Type`) SELECT `fd_RefNo`, `fd_name`, `fd_email`, `fd_message`, `fd_type` FROM `feedback` WHERE `fd_Refno`=$RefNo";
            mysqli_query($con,$MaRead);		
            echo "<script>window.open('../manage_page.php','_self')</script>";
        }
?>