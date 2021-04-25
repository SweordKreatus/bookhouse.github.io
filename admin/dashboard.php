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
    $bCount = "SELECT count(ub_BIDN) as bNo FROM `user_books` WHERE `ub_Status`='ON SALE' OR `ub_Status`='RESERVED'";
    $bResult=mysqli_query($con,$bCount);

    $bSum = "SELECT sum(bo_Qty) as QTY FROM `book_orders`";
    $sResult=mysqli_query($con,$bSum);

    $bUser = "SELECT count(uid) as uSer FROM `accounts` where `status`='USER'";
    $uResult=mysqli_query($con,$bUser);
    
    $book = "SELECT sum(bo.bo_Qty) as Quantity, ub.ub_Title, ub.ub_Author,bc.Category,sum(bo.bo_Price)as Price,ub.ub_BCover,ub.ub_Seller, uc.uc_BIDN FROM book_orders as bo inner join user_cart as uc on bo.bo_CartNo=uc.uc_CartNo inner join user_books as ub on bo.bo_BIDN=ub.ub_BIDN inner join book_category as bc on ub.ub_Category=bc.Refno group by bo_BIDN order by Quantity DESC limit 3";
    $all=mysqli_query($con,$book);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="icon" type="image/ico" href="assets/logo.png">
    <title>Dashboard</title>
</head>
<body id="dash">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'dash'; include 'sidebar.php'; ?>
    <div class="dash-content">
    	<h1 style="text-align: center;background: rgb(10,100,100); line-height: 55px; color: gold">NBOOK - Dashboard</h1>
        <div class="dash-container">
            <div class="dash-board">
                <ul>
                    <?php
                        while($rows = mysqli_fetch_array($bResult)){
                            $Books = $rows['bNo'];
                    
                        while($rows = mysqli_fetch_array($sResult)){
                            $Qty = $rows['QTY'];

                        while($rows = mysqli_fetch_array($uResult)){
                            $User = $rows['uSer'];
                    ?>
                    <li style="width: 30.5%;"><p>No. of Books</p><br><h3><?php echo $Books ?></h3></li> <?php } ?>
                    <li style="width: 30.5%;"><p>No. of Purchased Books</p><br><h3><?php echo $Qty ?></h3></li> <?php } ?>
                    <li style="width: 30.5%;"><p>No. of Registered Users</p><br><h3><?php echo $User ?></h3></li> <?php } ?>
                    
                </ul>
            </div><hr>
		    <h1><span>TOP SELLING BOOKS</h1></span>
            <div class="dash-wrapper">
                <ul class="dash-wrapper-box">
                    <?php
                        while($rows = mysqli_fetch_array($all)) {
                            $bIDN = $rows['uc_BIDN'];
                            $bTitle = $rows['ub_Title'];
                            $bGenre = $rows['Category'];
                            $bAuthor = $rows['ub_Author'];
                            $bQty = $rows['Quantity'];
                            $bPrice = $rows['Price'];
                            $bCover = $rows['ub_BCover'];
                            $bSeller = $rows['ub_Seller'];
                    ?>
                    <li><img src="../users<?php echo $bCover ?>" alt="Book Cover" >
                        <h3 style="border-bottom: 2px solid #ffffff;color: gold; min-height: 45px; margin: 0px 10px;"><?php echo $bTitle ?></h3>
                        <h4 style="color: #ffffff">Author: <?php echo $bAuthor ?></h4>
                        <h4 style="color: #ffffff">Category: <?php echo $bGenre ?></h4>
                        <p style="color: #ffffff">Total Copy Sold: <?php echo $bQty ?></p>
                    </li>
                    
                    <?php
                        }
                    ?>
                </ul>
            </div><hr>	
		</div>
    <div class="footer">
        <div class="footer-content">
            <h5>© All Rights Reserved 2020 | Designed by: <strong>iMagoKreatus Arts & Designs</strong></h5>
        </div>    
    </div>
    </div>
</body>
</html>