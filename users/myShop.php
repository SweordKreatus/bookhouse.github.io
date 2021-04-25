<?php
session_start();

if(!$_SESSION['username'])
{

    header("Location: ../index.php");
}

?>

<?php
 include("config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM accounts WHERE username =:username');
		$stmt_edit->execute(array(':username'=>$username));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
?>

<?php 
	$_SESSION['username']=$username;
	$bUser = $_SESSION['username'];
	require_once("includes/dbconnect.php");
    $book = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Seller='$username' AND ub.ub_Status='ON SALE' OR ub.ub_Seller='$username' AND ub.ub_Status='OUT OF STOCK' OR ub.ub_Seller='$username' AND ub.ub_Status='RESERVED' ORDER BY ub.ub_BIDN DESC";
    $result=mysqli_query($con,$book);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/includes/style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>My Shop</title>
</head>
<body id="myShop">

    <?php include 'navbar-header.php'; ?>
	<?php $page = 'shop'; include 'sidebar.php'; ?>
	<?php include 'add_book.php'?>
	<?php include 'update_book.php'?>

    <div class="myShop-content">
    	<h1 style="text-align: center;background: #d1d1d1; line-height: 50px;color: rgb(10,90,90)">MY SHOP</h1>
    	<div class="myShop-content-actions">
			<button onclick="document.getElementById('adBook').style.display='block'">Add Books</button>
    	</div>	
    	<div class="myShop-container">
			<div class="myShop-container-table">
    			<table id="shopTable">
    				<tr>
						<!--th style="width:60px;">No</!--th-->
						<th style="width:150px;">Cover</th>
						<th style="width:400px;">Description</th>
						<th style="width:80px;">Quantity</th>
						<th style="width:80px;">Price</th>
						<th style="width:100px;">Status</th>
						<th style="width:120px;">Actions</th>
					</tr>
					<?php
						while($rows = mysqli_fetch_array($result)) {
							$bIDN = $rows['ub_BIDN'];
                            $bTitle = $rows['ub_Title'];
                            $bGenre = $rows['Category'];
							$bAuthor = $rows['ub_Author'];
							$bSynop = $rows['ub_Synopsis'];
                            $bQty = $rows['ub_Qty'];
							$bPrice = $rows['ub_Price'];
							$bStatus = $rows['ub_Status'];
                            $bCover = $rows['ub_BCover'];
					?>
					<tr>
						<!--td><?php echo $bIDN ?></!--td-->
						<td><div><img alt="Book Cover" style="width:155px; height:180px;margin-top: 5px;border-radius: 10px;" src="users/<?php echo $bCover?>"></div></td>
						<td style="padding: 5px 10px;">
							<h2 style="text-align: left;"><?php echo $bTitle ?></h2>
							<p style="text-align: left;"><strong style="font-size:13px">Category: </strong><?php echo $bGenre ?></p>
							<p style="text-align: left; font-size:15px;"><strong style="font-size:13px">Author: </strong><?php echo $bAuthor ?></p>
							<p class="bk-desc"><strong>Synopsis: </strong><?php echo $bSynop ?></p>
						</td>
						<td><?php echo $bQty ?></td>
						<td><?php echo $bPrice ?></td>
						<td><?php echo $bStatus ?></td>
						
						<td><button href="" onclick="document.getElementById('Upbook').style.display='block';document.getElementById('ubIDN').value='<?php echo $bIDN ?>';document.getElementById('ubTitle').value='<?php echo $bTitle ?>';document.getElementById('ubStatus').value='<?php echo $bStatus ?>';document.getElementById('ubPrice').value='<?php echo $bPrice ?>';document.getElementById('ubQty').value='<?php echo $bQty ?>'" style="border: none;cursor:pointer;"class="fa-btn"><i class="fa fa-pencil-square"></i></button>  
						<button onclick="remove(<?php echo $bIDN ?>)" style="border: none;cursor:pointer;"class="fa-btn"><i class="fa fa-trash"></i></button>
							<script>
                                function remove(BID) {

                                     if(confirm("Do you want to delete this Book?")){
                                        window.location.href='includes/remove_book.php?book_id=' + BID + '';
                                        return true;
                                    }
                                }
                            </script>
						</td>
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
