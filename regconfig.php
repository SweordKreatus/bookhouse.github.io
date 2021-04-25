<?php
session_start();

?>
<?php
include("connection.php");

if(isset($_POST['register']))
{
$user_fname = $_POST['fn'];
$user_lname = $_POST['ln'];
$user_address = $_POST['address'];
$user_contact = $_POST['contact'];
$user_email = $_POST['email'];
$user_username = $_POST['user'];
$user_password = $_POST['pass'];



$check_user="select * from accounts WHERE username='$user_username'";
    $run_query=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Username is already taken, Please try another one!')</script>";
 echo"<script>window.open('signup.php?register','_self')</script>";
exit();
    }
 
$saveaccount="insert into accounts (`uid`, `first_name`, `last_name`, `address`, `contact`, `email`, `username`, `password`, `status`) VALUE (NULL,'$user_fname', '$user_lname','$user_address','$user_contact','$user_email','$user_username','$user_password','USER')";
mysqli_query($dbcon,$saveaccount);
echo "<script>alert('Data successfully saved, You may now login!')</script>";				
echo "<script>window.open('index.php','_self')</script>";


				
	
			
		
	
		

}

?>
