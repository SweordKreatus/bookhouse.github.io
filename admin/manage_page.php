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
    $messages = "SELECT * FROM `feedback` WHERE fd_status='UNREAD' order by fd_RefNo DESC";
    $mResult=mysqli_query($con,$messages);

    $category = "SELECT bc.RefNo,  bc.Category, count(ub.ub_Category) as total FROM `user_books` as ub RIGHT JOIN book_category as bc on ub.ub_Category=bc.RefNo group by bc.Category ORDER BY bc.RefNo ASC";
    $cResult=mysqli_query($con,$category);

    $feedback = "SELECT * FROM `feedmsg` WHERE `fm_Type`='FEEDBACK' order by fm_Date DESC limit 3 ";
    $fdResult=mysqli_query($con,$feedback);
    
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
    <title>Manage Page</title>
</head>
<body id="manage">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'manage'; include 'sidebar.php'; ?>
    <?php include 'includes/addCategory.php'; ?>
    <?php include 'includes/ReadMessages.php'; ?>
    <?php include 'includes/viewFeedback.php'; ?>
    <div class="manage-content">
    	<h1 style="text-align: center;background: rgb(10,100,100); line-height: 55px; color: gold">MANAGE PAGE</h1>
        <div class="manage-container">
            <div class="manage-feedback">
                <ul>
                    <h2>CURRENT DISPLAY FEEDBACK</h2>
                    <?php
                        while($rows = mysqli_fetch_array($fdResult)) {
                            $fmRNo = $rows['fm_RefNo'];
                            $fmName = $rows['fm_Name'];
                            $fmEmail = $rows['fm_Email'];
                            $fmMessage = $rows['fm_Message'];
                            $fmType = $rows['fm_Type'];
                            $fmDate = $rows['fm_Date'];
                            $newTime = date("h:m:sa", strtotime($fmDate));
                            $newDate = date("M d,Y", strtotime($fmDate));
                    ?>
                    <li>
                        <p id="feed"><q><?php echo $fmMessage ?></q></p>
                        <h3><?php echo $fmName ?></h3>
                        <p><?php echo $newDate ?></p>
                    </li>
                    
                    <?php } ?> 
                </ul>
                <div class="table-list" id="feedback&messages">
                    <table>
                        <tr>
                            <th style="width:10%">Ref No</th>
                            <th style="width:25%">Name</th>
                            <th style="width:35%">Email</th>
                            <th style="width:17%">Type</th>
                            <th style="width:13%">Action</th>
                        </tr>
                        <?php
                            while($rows = mysqli_fetch_array($mResult)) {
                                $fRNo = $rows['fd_RefNo'];
                                $fName = $rows['fd_name'];
                                $fEmail = $rows['fd_email'];
                                $fMessage = $rows['fd_message'];
                                $fType = $rows['fd_type'];
                                $fStatus = $rows['fd_status'];
                                $fDate = $rows['fd_date'];
                                $newTime = date("h:m:sa", strtotime($fDate));
                                $newDate = date("M d,Y", strtotime($fDate));
                        ?>
                        <?php include 'includes/viewMessage.php'; ?>
                        <tr>
                            <td><?php echo $fRNo ?></td>
                            <td><?php echo $fName ?></td>
                            <td><?php echo $fEmail ?></td>
                            <td><?php echo $fType ?></td>
                            <td><a href="#feedback&messages" onclick="document.getElementById('vMessage').style.display='block';document.getElementById('name').innerHTML='<?php echo $fName ?>';document.getElementById('email').innerHTML='<?php echo $fEmail ?>';document.getElementById('msg').innerHTML='<?php echo $fMessage ?>';document.getElementById('typ').innerHTML='<?php echo $fType ?>';document.getElementById('refNO').value='<?php echo $fRNo ?>'">Read</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <button onclick="document.getElementById('feedMSG').style.display='block'">Feedback</button><button onclick="document.getElementById('readMSG').style.display='block'">Read Messages</button>
            </div><hr>
            <div class="manage-books">
                <ul>
                    <li><h2>BOOKS CATEGORY</h2></li>
                    <li><button onclick="document.getElementById('myGenre').style.display='block'">Add Category</button></li>
                </ul>
                <div class="table-list" id="book_category">
                    <table>
                        <tr>
                            <!--th style="width: 20%">Ref No</!--th-->
                            <th style="width: 70%">Category</th>
                            <th style="width: 30%">Total Book Register</th>
                        </tr>
                        <?php
                            while($rows = mysqli_fetch_array($cResult)) {
                                $cRNo = $rows['RefNo'];
                                $cCategory = $rows['Category'];
                                $total = $rows['total'];
                        ?>
                        <tr>
                            <!--td><?php echo $cRNo ?></!--td-->
                            <td><?php echo $cCategory ?></td> 
                            <td><?php echo $total ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
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