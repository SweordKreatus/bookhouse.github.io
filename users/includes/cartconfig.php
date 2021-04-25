<?php
    session_start();

?>

<link rel="icon" type="image/ico" href="../assets/logo.png">
<?php
    include "dbconnect.php";

    //Config Code for Add Campus ------------------------------
    //if(isset($_POST['bkBtn']))
    //{

        $buyer = $_SESSION['username'];
        $bkIDN = $_GET['refno'];

        $check_user="SELECT ub_BIDN, ub_Title, ub_Author, Category, ub_Synopsis, ub_Qty, ub_Price, ub_Status, ub_BCover, ub_Seller FROM user_books as ub inner join book_category as bc on ub.ub_Category = bc.RefNo WHERE ub.ub_BIDN=$bkIDN";
        $run_query=mysqli_query($con,$check_user);

        $rows = mysqli_fetch_array($run_query);
            $bIDN = $rows['ub_BIDN'];
            $bTitle = $rows['ub_Title'];
            $bGenre = $rows['Category'];
            $bAuthor = $rows['ub_Author'];
            $bSynop = $rows['ub_Synopsis'];
            $bQty = $rows['ub_Qty'];
            $bPrice = $rows['ub_Price'];
            $bStatus = $rows['ub_Status'];
            $bCover = $rows['ub_BCover'];
            $bSeller = $rows['ub_Seller'];


        $check_order="select * from user_cart WHERE uc_BIDN = '$bIDN' and uc_Seller='$bSeller' and uc_Buyer='$buyer' and uc_Status='PENDING'";
        $run_query=mysqli_query($con,$check_order);
        
        
        
        if($bSeller==$buyer)
        {
            echo "<script>alert('Unable to add to Cart. This item is in your Shop.')</script>";				
            echo "<script>window.open('../books.php','_self')</script>";
            exit();
        }elseif(mysqli_num_rows($run_query)>0)
        {
            echo "<script>alert('Unable to add to Cart. This item is already added to your cart.')</script>";				
            echo "<script>window.open('../books.php','_self')</script>";
            exit();
        }

        
        
    $CartOrder="INSERT INTO `user_cart`( `uc_BIDN`, `uc_Seller`, `uc_Buyer`, `uc_Status`) SELECT  `ub_BIDN`, `ub_Seller`, '$buyer', 'PENDING' FROM `user_books` WHERE `ub_BIDN`=$bIDN";
    mysqli_query($con,$CartOrder);
    echo "<script>alert('Successfully added to your cart. Go to your order list to Purchase this item.')</script>";				
    echo "<script>window.open('../books.php','_self')</script>";
    //}

?>