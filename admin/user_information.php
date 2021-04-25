<?php
session_start();

if(!$_SESSION['username'])
{

    header("Location: ../admin/index.php");
}

?>

<?php
 include("includes/config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM accounts WHERE username =:username');
		$stmt_edit->execute(array(':username'=>$username));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
        ?>
        
<?php 
    require_once("includes/dbconnect.php");
    
    $account = "SELECT * FROM accounts";
    $user=mysqli_query($con,$account);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="icon" type="image/ico" href="assets/logo.png">
    <title>Accounts Information</title>
</head>
<body id="user">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'user'; include 'sidebar.php'; ?>
    <div class="user-content">
    	<h1 style="text-align: center;background: rgb(10,100,100); line-height: 55px; color: gold">USER ACCOUNT INFORMATION</h1>
        <div class="user-container">
            <div class="user-table">
                <table>
                    <tr>
                        <th style="width: 5%;">UID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                    <?php
                        while($rows = mysqli_fetch_array($user)) {
                            $uID = $rows['uid'];
                            $uFname = $rows['first_name'];
                            $uLname = $rows['last_name'];
                            $uAddress = $rows['address'];
                            $uContact = $rows['contact'];
                            $uEmail = $rows['email'];
                            $uUser = $rows['username'];
                            $uPass = $rows['password'];
                    ?>
                    <tr>
                        <td><?php echo $uID ?></td>
                        <td><?php echo $uFname." ".$uLname ?></td>
                        <td><?php echo $uAddress ?></td>
                        <td><?php echo $uContact ?></td>
                        <td><?php echo $uEmail ?></td>
                        <td><?php echo $uUser ?></td>
                    </tr>
                        <?php } ?>
                </table>
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