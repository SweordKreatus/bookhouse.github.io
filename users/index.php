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
    require_once("../users/includes/dbconnect.php");
    $genre = "SELECT * FROM `book_category`";
    $genresult=mysqli_query($con,$genre);

    $book = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC limit 3;";
    $all=mysqli_query($con,$book);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/includes/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>NBook Store</title>
</head>
<body id="indx">
	<?php include 'navbar-header.php'; ?>
    <?php $page = 'home'; include 'sidebar.php'; ?>

    <!--div-- class="header">
        <ul style="box-sizing: border-box;">
            <li style="display: inline-table;"><img src="../assets/banner-dark.png" style=" padding:5px; height: 60px;width: 220px; padding-left: 10px;"></li>
            <li style="display: inline-table; float: right;margin-right: 10px;line-height: 70px;"><a href=#><?php echo $username?></a></li>
        </ul>	
    </!--div-->
    <div class="indx-content">
    	<h1 style="text-align: center;background: #d1d1d1; line-height: 60px;color: rgb(10,90,90)">WELCOME TO NBOOK STORE</h1>
        <div class="indx-feature" id="feature">
            <div class="indx-feature-container">
                <h2><span>NEW BOOKS</h2></span>
                <div class="indx-feature-container-wrapper">
                    <ul class="indx-feature-container-wrapper-box">
                        <?php
                            while($rows = mysqli_fetch_array($all)) {
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
                        <li><div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="users/<?php echo $bCover ?>" alt="Book Cover" style="width:290px;height:290px">
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="flip-card-back-desc">
                                            <h3 class="title"><?php echo $bTitle ?></h3>
                                            <p class="author"><span>Author:</span><?php echo $bAuthor ?></p>
                                            <p class="category"><span>Category:</span><?php echo $bGenre ?></p>
                                            <p class="desc">SYNOPSIS: <q><?php echo $bSynop ?></q></p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="content-box">
                                <h3 class="title"><?php echo $bTitle ?></h3>
                                <p class="category">Category: <?php echo $bGenre ?></p>
                                <h4 class="price">Price: P<?php echo $bPrice ?></h4>
                            </div>
                            <button type="submit" name="add_cart" onclick="bkcart(<?php echo $bIDN ?>)">Add to Cart</button>
                                <script>
                                    function bkcart(bIDN) {
                                        window.location.href='includes/cartconfig.php?refno=' + bIDN + '';
                                    }
                                </script>
                        
                        </li><?php 
                            }
                            ?>
                    </ul>
                </div>  
                <div  class="indx-shop-btn">  
                    <a href="books.php"><button>SHOP NOW!</button></a>  
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