<?php
    session_start();

?>

<link rel="icon" type="image/ico" href="../assets/logo.png">
<?php
    include "dbconnect.php";

    //Config Code for Add Campus ------------------------------
    //if(isset($_POST['bkClick']))
    //{

        $cbuyer = $_SESSION['username'];
        $bkIDN = $_GET['book_id'];

        $ck_Buyer="SELECT ub_BIDN, ub_Title, ub_Author, ub_Category, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_BIDN=$bkIDN";
        $run_query=mysqli_query($con,$ck_Buyer);

        $rows = mysqli_fetch_array($run_query);
            $bkIDN = $rows['ub_BIDN'];
            $bkTitle = $rows['ub_Title'];
            $bkGenre = $rows['Category'];
            $bkAuthor = $rows['ub_Author'];
            $bkSynop = $rows['ub_Synopsis'];
            $bkQty = $rows['ub_Qty'];
            $bkPrice = $rows['ub_Price'];
            $bkStatus = $rows['ub_Status'];
            $bkCover = $rows['ub_BCover'];
            $bkSeller = $rows['ub_Seller'];
            $bkCate = $rows['ub_Category'];


        $ck_Order="select * from user_cart WHERE uc_BIDN = '$bkIDN' and uc_Seller='$bkSeller' and uc_Buyer='$cbuyer' and uc_Status='PENDING'";
        $run_query=mysqli_query($con,$ck_Order);
        
        
        
        if($bkSeller==$cbuyer)
        {
            echo "<script>alert('Unable to add to Cart. This item is in your Shop.')</script>";				
            echo "<script>window.open('../search_book.php','_self')</script>";
        }elseif(mysqli_num_rows($run_query)>0)
        {
            echo "<script>alert('Unable to add to Cart. This item is already added to your cart.')</script>";				
            echo "<script>window.open('../search_book.php','_self')</script>";
            exit();
        }

        
        
    $fcOrder="INSERT INTO `user_cart`( `uc_BIDN`, `uc_Seller`, `uc_Buyer`, `uc_Status`) SELECT  `ub_BIDN`, `ub_Seller`, '$cbuyer', 'PENDING' FROM `user_books` WHERE `ub_BIDN`=$bkIDN";
    mysqli_query($con,$fcOrder);
    echo "<script>alert('Successfully added to your cart. Go to your order list to Purchase this item.')</script>";				
    echo "<script>window.open('../search_book.php','_self')</script>";
    echo "<script>document.getElementById('BookList').value='.$bkCate.'</script>";
    //}

?>