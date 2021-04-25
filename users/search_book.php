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
    require_once("includes/dbconnect.php");
    $genre = "SELECT * FROM `book_category`";
    $genresult=mysqli_query($con,$genre);

    

?>

<?php 
    if(isset($_POST['search'])){
        $bookSearch = $_POST['categoryValue'];
        $query = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' AND ub.ub_Category = $bookSearch ORDER BY ub.ub_BIDN DESC";
        $search_Result = filterTable($query);
        if($bookSearch==""){
            $query = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC";
            $search_Result = filterTable($query);
        }
    }else{
        $query = "SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_Status='ON SALE' ORDER BY ub.ub_BIDN DESC";
        $search_Result = filterTable($query);
    }

    function filterTable($query){
        $connect = mysqli_connect("localhost","root","","nbook");
        $filter_Result =  mysqli_query($connect, $query);
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
    <link rel="icon" type="image/ico" href="assets/logo.png">
    <title>Books</title>
</head>
<body id="books">
    <?php include 'navbar-header.php'; ?>
    <?php $page = 'books'; include 'sidebar.php'; ?>
    <div class="books-content">
        <div class="books-container">
        <div class="indx-feature" id="feature">
            <form action="search_book.php" method="post">
                <div class="books-category-container">
                    <div class="books-category-btn" style="background: rgb(10,100,100);padding: 10px 20px;">
                        <select type="text" name="categoryValue" id="BookList" style="padding:5px; line-height: 30px">
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
            <div class="books-feature-container">
                <h2 style="line-height:60px;"><span style="border-bottom: 5px solid rgb(10,100,100);">ALL BOOKS</span></h2>
                <div class="indx-feature-container-wrapper">
                    <ul class="indx-feature-container-wrapper-box">
                        <?php while($rows = mysqli_fetch_array($search_Result)):
                            $bIDNo = $rows['ub_BIDN'];?>
                        <li><div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img name="cover" src="users/<?php echo $rows['ub_BCover']; ?>" alt="Avatar" style="width:290px;height:290px">
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="flip-card-back-desc">
                                            <h3 class="title" name="sbtitle"><?php echo $rows['ub_Title']; ?></h3>
                                            <p class="author" name="sbauthor"><span>Author:</span><?php echo $rows['ub_Author']; ?></p>
                                            <p class="category" name="sbgenre"><span>Category:</span><?php echo $rows['Category']; ?></p>
                                            <p class="desc" name="sbdesc">SYNOPSIS: <q><?php echo $rows['ub_Synopsis']; ?></q></p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="content-box">
                                <h3 class="title"><?php echo $rows['ub_Title']; ?></h3>
                                <p class="category">Category: <?php echo $rows['Category']; ?></p>
                                <h4 class="price" name="sprice">Price: P<?php echo $rows['ub_Price']; ?></h4>
                            </div>
                            <div>
                            <button type="reset" name="bkClick" id="bkClick" onclick="myFunction(<?php echo $bIDNo ?>)">Add to Cart</button>
                            </div>
                                <script>
                                    function myFunction(LK){
                                        window.location.href='includes/filtercart.php?book_id=' + LK +'';
                                    }
                                </script>
                        </li><?php 
                                endwhile;
                            //}
                            ?>
                    </ul>
                </div>
            </div>
            </form>
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