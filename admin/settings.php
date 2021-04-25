<?php
session_start();

if(!$_SESSION['username'])
{

    header("Location: ../index.php");
}

?>

<?php
 include("../admin/includes/config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM accounts WHERE username =:username');
		$stmt_edit->execute(array(':username'=>$username));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
        ?>
        
<?php 
    $_SESSION['username']=$username;
	$bUser = $_SESSION['username'];
    require_once("../admin/includes/dbconnect.php");
    $user = "SELECT * FROM `accounts` WHERE username='$bUser'";
    $useresult=mysqli_query($con,$user);

    /*$book = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo ORDER BY ub.ub_BIDN DESC limit 3;";
    $all=mysqli_query($con,$book);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>Account Settings</title>
</head>
<body id="settings">
    <?php include 'navbar-header.php'; ?>
    <?php $page = 'setting'; include 'sidebar.php'; ?>
    <?php
        while($rows = mysqli_fetch_array($useresult)) {
            $uID = $rows['uid'];
            $uFname = $rows['first_name'];
            $uLname = $rows['last_name'];
            $uAddress = $rows['address'];
            $uContact = $rows['contact'];
            $uEmail = $rows['email'];
            $uUser = $rows['username'];
            $uPass = $rows['password'];
    ?>
    <?php include 'editName.php'; ?>
    <?php include 'editEmail.php'; ?>
    <?php include 'editAddress.php'; ?>
    <?php include 'editPassword.php'; ?>
    <?php include 'editUsername.php'; ?>
    <?php include 'includes/updateConfig.php'; ?>

    <div class="settings-content">
    	<h1 style="text-align: center;background: #d1d1d1; line-height: 60px;color: rgb(10,90,90)">ACCOUNT SETTINGS</h1>
        <div class="settings-container">
            <div class="settings-details">
            <h2 style="text-align:center;">Profile Information</h2>
                <table style="width: 100%; background: #ddd;border-collapse: collapse">
                    <tr>
                        <th style="width: 80%;"></th>
                        <th style="width: 20%;"></th>
                    </tr>
                    
                    <tr>
                        <td style="padding: 0px 10px;">
                            <h3 style="color:rgb(10,100,100)">Name</h3>
                            <h3><?php echo $uFname." ".$uLname?></h3></td>
                        <td style="text-align: center;"><a style="text-decoration:none;color: rgb(10,100,100);" href="#update_profile" onclick="document.getElementById('eName').style.display='block'">Edit</a></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 10px;">
                            <h3 style="color:rgb(10,100,100)">Email Address</h3>
                            <h3><?php echo $uEmail?></h3></td>
                        <td style="text-align: center;"><a style="text-decoration:none;color: rgb(10,100,100);" href="#update_email_address" onclick="document.getElementById('eMail').style.display='block'">Edit</a></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 10px;">
                            <h3 style="color:rgb(10,100,100)">Address</h3>
                            <h3><?php echo $uAddress?></h3></td>
                        <td style="text-align: center;"><a style="text-decoration:none;color: rgb(10,100,100);" href="#update_location_address" onclick="document.getElementById('AdRest').style.display='block'">Edit</a></td>
                    </tr>
                </table><hr style="margin: 10px 0px;">
                <h2 style="text-align:center;">Security Password</h2>
                <table style="width: 100%; background: #ddd;border-collapse: collapse">
                    <tr>
                        <th style="width: 70%;"></th>
                        <th style="width: 30%;"></th>
                    </tr>
                    <tr>
                        <td style="padding: 0px 10px;">
                            <a style="text-decoration:none;color: rgb(10,100,100);" href="#change_password" onclick="document.getElementById('mPass').style.display='block'"><h3>Change my Password</h3></a></td>
                        <td style="text-align: center;"></td>
                    </tr>
                </table>
                <?php
                    }
                    ?>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <h5>© All Rights Reserved 2020 | Designed by: <strong>iMagoKreatus Arts & Designs</strong></h5>
            </div>    
        </div>
    </div>
</body>
</html>