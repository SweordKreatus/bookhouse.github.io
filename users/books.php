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

    //$book = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC";
    //$all=mysqli_query($con,$book);

    $top = "SELECT sum(bo.bo_Qty) as Quantity, ub.ub_Title,ub.ub_Synopsis,ub.ub_Price, ub.ub_Author,bc.Category,sum(bo.bo_Price)as Price,ub.ub_BCover,ub.ub_Seller, uc.uc_BIDN FROM book_orders as bo inner join user_cart as uc on bo.bo_CartNo=uc.uc_CartNo inner join user_books as ub on bo.bo_BIDN=ub.ub_BIDN inner join book_category as bc on ub.ub_Category=bc.Refno WHERE ub.ub_Status='ON SALE' group by bo_BIDN order by Quantity DESC limit 3";
    $tBook=mysqli_query($con,$top);

?>

<?php 
    if(isset($_POST['search'])){
        $bookSearch = $_POST['categoryValue'];
        $bkQuery = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' AND ub.ub_Category = $bookSearch ORDER BY ub.ub_BIDN DESC";
        $search_Result = filterTable($bkQuery);
        if($bookSearch==""){
            $bkQuery = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC";
            $search_Result = filterTable($bkQuery);
        }
    }else{
        $bkQuery = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC";
        $search_Result = filterTable($bkQuery);
    }

    function filterTable($bkQuery){
        $connect = mysqli_connect("localhost","root","","nbook");
        $filter_Result =  mysqli_query($connect, $bkQuery);
        return $filter_Result;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../users/includes/style.css">
    <script src="includes/jquery-3.4.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="../assets/logo.png">
    <title>Books</title>
</head>
<body id="books">
    <?php include 'navbar-header.php'; ?>
    <?php $page = 'books'; include 'sidebar.php'; ?>
    <div class="books-content">
        <div class="books-container">
            <form action="search_book.php" method="post">
                <div class="books-category-container">
                    <div class="books-category-btn" style="background: rgb(10,100,100);padding: 10px 20px;">
                        <select type="text" name="categoryValue" id="BookList" style=" padding:5px; line-height: 30px">
                        <option value="">ALL BOOKS</option>
                        <?php
                            foreach ($genresult as $Category) {
                                $gRefNo=$Category["RefNo"];
                                $gDesc=$Category["Category"];
                        ?>
                        <option value="<?php echo $gRefNo;?>"><?php echo $gDesc;?></option>
                        <?php
                            }
                        ?>
                        </select>
                        <input type="submit" id="search" name="search" value="SEARCH"></input>  
                    </div>	
                </div>	
            </form>
        <div class="indx-feature" id="feature">
            <div class="books-feature-container" id="topSelling">
                <h2><span style="border-bottom: 5px solid rgb(10,100,100);">TOP SELLING BOOKS</span></h2>
                <div class="indx-feature-container-wrapper">
                    <ul class="indx-feature-container-wrapper-box">
                        <?php
                            while($rows = mysqli_fetch_array($tBook)){
                                $bIDN = $rows['uc_BIDN'];
                                $bTitle = $rows['ub_Title'];
                                $bGenre = $rows['Category'];
                                $bAuthor = $rows['ub_Author'];
                                $bSynop = $rows['ub_Synopsis'];
                                $bPrice = $rows['ub_Price'];
                                $bCover = $rows['ub_BCover'];
                        ?>
                        <li><div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img name="cover" src="users/<?php echo $bCover ?>" alt="Avatar" style="width:290px;height:290px">
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="flip-card-back-desc">
                                            <h3 class="title" name="title"><?php echo $bTitle ?></h3>
                                            <p class="author" name="author"><span>Author:</span><?php echo $bAuthor ?></p>
                                            <p class="category" name="genre"><span>Category:</span><?php echo $bGenre ?></p>
                                            <p class="desc" name="desc">SYNOPSIS: <q><?php echo $bSynop ?></q></p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="content-box">
                                <h3 class="title"><?php echo $bTitle ?></h3>
                                <p class="category">Category: <?php echo $bGenre ?></p>
                                <h4 class="price" name="price">Price: P<?php echo $bPrice ?></h4>
                            </div>
                            <button type="submit" name="add_cart" onclick="bkcart(<?php echo $bIDN ?>)">Add to Cart</button>
                                <script>
                                    function bkcart(bIDN) {
                                        window.location.href='includes/cartconfig.php?refno=' + bIDN + '';
                                    }
                                </script>
                        </li>
                        <?php 
                                
                            }
                            ?>
                    </ul>
                </div><hr>
            <div class="books-feature-container">
                <h2 style="line-height:60px;"><span style="border-bottom: 5px solid rgb(10,100,100);">ALL BOOKS</span></h2>
                <div class="indx-feature-container-wrapper">
                    <ul class="indx-feature-container-wrapper-box">
                        <?php
                            while($rows = mysqli_fetch_array($search_Result)) :
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
                                        <img name="cover" src="users/<?php echo $bCover ?>" alt="Avatar" style="width:290px;height:290px">
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="flip-card-back-desc">
                                            <h3 class="title" name="title"><?php echo $bTitle ?></h3>
                                            <p class="author" name="author"><span>Author:</span><?php echo $bAuthor ?></p>
                                            <p class="category" name="genre"><span>Category:</span><?php echo $bGenre ?></p>
                                            <p class="desc" name="desc">SYNOPSIS: <q><?php echo $bSynop ?></q></p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="content-box">
                                <h3 class="title"><?php echo $bTitle ?></h3>
                                <p class="category">Category: <?php echo $bGenre ?></p>
                                <h4 class="price" name="price">Price: P<?php echo $bPrice ?></h4>
                            </div>
                            <button type="submit" name="add_cart" onclick="bkcart(<?php echo $bIDN ?>)">Add to Cart</button>
                                <script>
                                    function bkcart(bIDN) {
                                        window.location.href='includes/cartconfig.php?refno=' + bIDN + '';
                                    }
                                </script>
                        </li><?php 
                            endwhile;
                            //}
                            ?>
                    </ul>
                </div>
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