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
    $book = "SELECT * FROM user_cart as uc inner join user_books as b on uc.uc_BIDN=b.ub_BIDN inner join book_category as bc on b.ub_Category=bc.RefNo inner join accounts as a on uc.uc_Seller=a.username WHERE uc.uc_Buyer='$username' AND uc.uc_Status='PENDING' AND b.ub_STATUS='ON SALE' ORDER BY uc.uc_CartNo DESC";
    $result=mysqli_query($con,$book);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>Orders</title>
</head>

<body id="order">


    <?php include 'navbar-header.php'; ?>
    <?php $page = 'orders'; include 'sidebar.php'; ?>
    
    <div class="order-content">
        <h1 style="text-align: center;padding-left:20px; background: #d1d1d1; line-height: 60px;color: rgb(10,90,90)">MY ORDERS LIST</h1>
        <div class="order-content-container">
            <div class="order-content-container-list">
                <ul>
                    <li>
                        <?php
                            while($rows = mysqli_fetch_array($result)) {
                                $ocIDN = $rows['uc_CartNo'];
                                $ocBIDN = $rows['ub_BIDN'];
                                $ocTitle = $rows['ub_Title'];
                                $ocGenre = $rows['Category'];
                                $ocAuthor = $rows['ub_Author'];
                                $ocSynop = $rows['ub_Synopsis'];
                                $ocQty = $rows['ub_Qty'];
                                $ocPrice = $rows['ub_Price'];
                                $ocStatus = $rows['ub_Status'];
                                $ocCover = $rows['ub_BCover'];
                                $ocSeller = $rows['first_name'];
                                $ocLSeller = $rows['last_name'];
                        ?>
                            <?php include 'check_out.php'; ?>
                        <label>
                            <table>
                                <tr>
                                    <th style="width:80px; padding-left: 10px;">Order No</th>
                                    <th style="width:150px;">Cover</th>
                                    <th style="width:300px;">Description</th>
                                    <th style="width:100px;">Actions</th>
                                </tr>
                                
                                <tr>
                                    <td class="bk-no" name="oIDN"><strong><?php echo $ocIDN ?></strong></td>
                                    <td class="bk-img"><img src="users/<?php echo $ocCover?>" alt="Avatar" style="width:155px; height:180px;"></td>
                                    <td class="bk-title">
                                        <p class="bk-title"><h2><?php echo $ocTitle ?></h2></p>
                                        <p class="bk-cate"><strong>Category: </strong><?php echo $ocGenre ?> | <strong>Author: </strong><?php echo $ocAuthor?></p>
                                        <p class="bk-author"><strong>Seller: </strong><?php echo $ocSeller." ".$ocLSeller ?></p>
                                        <p class="bk-desc"><strong>Synopsis: </strong><?php echo $ocSynop ?></p>
                                    </td>
                                    <td class="bk-action">
                                        <ul>
                                            <li class="bk-action-qty"><p>Stocks:</p><input type="number" min="1" max="<?php echo $ocQty ?>" onchange="calc();" id="qty" name="Quantity" value="<?php echo $ocQty ?>"></li>
                                            <li class="bk-action-price"><p>Price (P):</p><h1 id="price"><?php echo $ocPrice ?></h1></li>
                                            <li class="bk-action-btn"><button href="" onclick="document.getElementById('chOrder').style.display='block';document.getElementById('BIDN').value='<?php echo $ocBIDN ?>';document.getElementById('oprce').value='<?php echo $ocPrice ?>';document.getElementById('price').value='<?php echo $ocPrice ?>';document.getElementById('Qty').value='1';document.getElementById('Qty').max='<?php echo $ocQty ?>';document.getElementById('CartNo').value='<?php echo $ocIDN ?>';">CHECK OUT!</button></li>
                                            <li class="bk-action-btn"><button onclick="remove(<?php echo $ocIDN ?>)">CANCEL</button></li>
                                            <script>
                                                function remove(ordID) {

                                                     if(confirm("Do you want to cancel this order?")){
                                                        window.location.href='includes/remove_order.php?order_id=' + ordID + '';
                                                        return true;
                                                    }
                                                }
                                            </script>
                                        </ul>
                                        
                                    </td>
                                    <?php 
                                    }
                                ?>
                                </tr>
                            </table>
                        </label>
                    </li>
                </ul>
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