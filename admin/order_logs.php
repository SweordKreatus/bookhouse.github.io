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
    
    $ordered = "SELECT * FROM book_orders as bo inner join user_cart as uc on bo.bo_CartNo=uc.uc_CartNo inner join user_books as ub on uc.uc_BIDN = ub.ub_BIDN ORDER BY bo.bo_Date DESC;";
    $logs=mysqli_query($con,$ordered);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="icon" type="image/ico" href="assets/logo.png">
    <title>Logs History</title>
</head>
<body id="user">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'logs'; include 'sidebar.php'; ?>
    <div class="user-content">
    	<h1 style="text-align: center;background: rgb(10,100,100); line-height: 55px; color: gold">ORDERED BOOK HISTORY</h1>
        <div class="user-container">
            <div class="user-table">
                <table style="width: 100%">
                    <tr>
                        <th>Time</th>
                        <th style="width: 10%">Date</th>
                        <th>OrNo</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Seller</th>
                        <th>Buyer</th>
                    </tr>
                    <?php
                        while($rows = mysqli_fetch_array($logs)) {
                            $rCNo = $rows['bo_CartNo'];
                            $rTitle = $rows['ub_Title'];
                            $rAuthor = $rows['ub_Author'];
                            $rSeller = $rows['ub_Seller'];
                            $rQty = $rows['bo_Qty'];
                            $rPrice = $rows['bo_Price'];
                            $rDate = $rows['bo_Date'];
                            $rBuyer = $rows['uc_Buyer'];
                            $newTime = date("h:m:sa", strtotime($rDate));
                            $newDate = date("M d,Y", strtotime($rDate));
                    ?>
                    <tr>
                        <td><?php echo $newTime?></td>
                        <td><?php echo $newDate?></td>
                        <td><?php echo $rCNo ?></td>
                        <td><?php echo $rTitle ?></td>
                        <td><?php echo $rAuthor ?></td>
                        <td><?php echo $rQty ?></td>
                        <td><?php echo $rSeller ?></td>
                        <td><?php echo $rBuyer ?></td>
                    </tr>
                    <?php 
                        }
                    ?>
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