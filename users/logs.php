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
    require_once("includes/dbconnect.php");
    $genre = "SELECT * FROM `book_orders`";
    $genresult=mysqli_query($con,$genre);

    $ordered = "SELECT bo.bo_CartNo, ub.ub_Title, ub.ub_Author, ub.ub_Seller, bo.bo_Qty, bo.bo_Price, bo.bo_Date FROM book_orders as bo inner join user_cart as uc on bo.bo_CartNo=uc.uc_CartNo inner join user_books as ub on uc.uc_BIDN = ub.ub_BIDN WHERE uc.uc_Buyer='$username' ORDER BY bo.bo_Date DESC;";
    $logs=mysqli_query($con,$ordered);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>Purchased Item</title>
</head>

<body id="logs">
    <?php include 'navbar-header.php'; ?>
    <?php $page = 'logs'; include 'sidebar.php'; ?>
    <div class="logs-content">
        <h1 style="text-align: center;padding-left:20px; background: #d1d1d1; line-height: 60px;color: rgb(10,90,90)">
            PURCHASED HISTORY</h1>
        <div class="logs-content-container">
            <div class="logs-content-container-list">
                <ul>
                    <li>
                        <table style="width: 100%">
                                <tr>
                                    <th style="padding-left: 10px;">Order No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Seller</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Time</th>
                                    <th>Date</th>
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
                                        $newTime = date("h:m:sa", strtotime($rDate));
                                        $newDate = date("M d,Y", strtotime($rDate));

                                ?>
                                <tr>
                                    <td><?php echo $rCNo ?></td>
                                    <td><?php echo $rTitle ?></td>
                                    <td><?php echo $rAuthor ?></td>
                                    <td><?php echo $rSeller ?></td>
                                    <td><?php echo $rQty ?></td>
                                    <td><?php echo $rPrice ?></td>
                                    <td><?php echo $newTime?></td>
                                    <td><?php echo $newDate?></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                        </table>
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