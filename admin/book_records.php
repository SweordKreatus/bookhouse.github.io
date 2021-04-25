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
    
    $book = "SELECT sum(bo.bo_Qty) as Sold,ub.ub_BIDN, ub.ub_Title, ub.ub_Author, bc.Category, ub.ub_Qty, ub.ub_Price, ub.ub_Status, ub.ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category=bc.RefNo left join book_orders as bo on bo.bo_BIDN=ub.ub_BIDN WHERE ub.ub_Status='ON SALE' or ub.ub_Status='RESERVED' group by ub_BIDN order by ub_BIDN ASC";
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
    <title>Book Records</title>
</head>
<body id="record">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'records'; include 'sidebar.php'; ?>
    <?php //include 'viewRecords.php'; ?>
    <div class="record-content">
    	<h1 style="text-align: center;background: rgb(10,100,100); line-height: 55px; color: gold">BOOK RECORDS</h1>
        <div class="record-container">
            <div class="record-table">
                <table>
                    <tr>
                        <th style="width: 3.5%;">No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Stock/s</th>
                        <th>Sold</th>
                        <th style="width: 8%;">Price</th>
                        <th>Status</th>
                        <th style="width: 10%;">Seller</th>
                        <th style="width: auto;">Actions</th>
                    </tr>
                    <?php
                        while($rows = mysqli_fetch_array($all)) {
                            $bIDN = $rows['ub_BIDN'];
                            $bTitle = $rows['ub_Title'];
                            $bGenre = $rows['Category'];
                            $bAuthor = $rows['ub_Author'];
                            $bQty = $rows['ub_Qty'];
                            $bSold = $rows['Sold'];
                            $bPrice = $rows['ub_Price'];
                            $bStatus = $rows['ub_Status'];
                            $bSeller = $rows['ub_Seller'];

                            if($bSold==""){
                                $Sold = 0;
                            }else{
                                $Sold = $bSold;
                            }
                    ?>
                    <tr>
                        <td><?php echo $bIDN ?></td>
                        <td><?php echo $bTitle ?></td>
                        <td><?php echo $bAuthor ?></td>
                        <td><?php echo $bGenre ?></td>
                        <td><?php echo $bQty ?></td>
                        <td><?php echo $Sold ?></td>
                        <td><?php echo $bPrice ?></td>
                        <td><?php echo $bStatus ?></td>
                        <td><?php echo $bSeller ?></td>
                        <td><a href="#"  onclick="view(<?php echo $bIDN ?>)">View</a>
                        <script>
							function view(bkID) {
							 	window.location.href='viewRecords.php?book_id=' + bkID + '';
							}
						</script></td>
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