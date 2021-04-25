<?php
session_start();

?>
<?php

include("connection.php");

if(isset($_POST['user_login']))
{

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
	

    $check_user="select * from accounts WHERE username='".$_SESSION['username']."' AND password ='".$_SESSION['password']."' AND status ='ADMIN'";

 
    $run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>alert('You're successfully login!')</script>";
        echo "<script>window.open('../dashboard.php','_self')</script>";
        $_SESSION['username']= $_POST['username'];
        $_SESSION['idn']=$_POST['uid'];
    }
    else
    {
        echo "<script>alert('Username or Password is incorrect!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
		 exit();
		
    }
}
?>