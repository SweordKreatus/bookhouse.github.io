<?php
    session_start();

?>

<?php
    include 'dbconnect.php';
?>

<?php

    $target_dir = "../img/books/";
    $target_file = $target_dir . basename($_FILES["BCover"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    //data
    $bUser = $_SESSION['username'];
    $bTitle = $_POST['BTitle'];
    $bAuthor = $_POST['BAuthor'];
    $bGenre = $_POST['BGenre'];
    $bSynopsis = $_POST['BSynopsis'];
    $bQty = $_POST['BQty'];
    $bPrice = $_POST['BPrice'];
    $bStatus = 'ON SALE';

    $check_ubook="SELECT * FROM `user_books` WHERE `ub_Title`='$bTitle' AND `ub_Author`='$bAuthor' AND `ub_Category`='$bGenre' AND `ub_Seller`='$bUser'";
    $book_query=mysqli_query($con,$check_ubook);

    if(mysqli_num_rows($book_query)>0)
    {
    echo "<script>alert('Book already exist in your shop.')</script>";				
    echo "<script>window.open('../myShop.php','_self')</script>";
    //exit();
    return true;
    }

    // Check if image file is a actual image or fake image
    if(isset($_POST["aBSubmit"])) {
        $check = getimagesize($_FILES["BCover"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('Your Image File name is already existing, Please rename your Image File first')</script>";
        echo "<script>window.open('../myShop.php','_self')</script>";
        return true;
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["BCover"]["size"] > 100000000) {
        echo "<script>alert('Your file size is to large.')</script>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "tiff") {
        echo "<script>alert('Your Image File is not in our image format. Kindly convert that into JPG, JPEG, PNG,  GIF & TIFF files.')</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Your file was not uploaded. Please try again!')</script>";
        echo "<script>window.open('../myShop.php','_self')</script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["BCover"]["tmp_name"], $target_file)) {

            $bookImg=basename( $_FILES["BCover"]["name"]);
            $img = $target_dir.$bookImg;
            $book_insert="INSERT INTO `user_books`(`ub_Title`, `ub_Author`, `ub_Category`, `ub_Synopsis`, `ub_Qty`, `ub_Price`, `ub_Status`, `ub_BCover`, `ub_Seller`) VALUES ('$bTitle','$bAuthor','$bGenre','$bSynopsis', '$bQty', '$bPrice', '$bStatus','$img','$bUser')";
                    mysqli_query($con,$book_insert);
                    echo "<script>alert('Your Data has been sent successfully in our system.')</script>";				
                    echo "<script>window.open('../myShop.php','_self')</script>";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file. Please try again!')</script>";
            echo "<script>window.open('../myShop.php','_self')</script>";
        }
    }

?>