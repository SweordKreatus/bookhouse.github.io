<style>
    /* The Modal (background) */
    .bookView {
        display: block;/* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99; /* Sit on top */
        padding-top: 3.5%; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-image: linear-gradient( rgba(250,250,250,0.8),#ffffff69),url("../assets/assets1.jpg");
        background-position: right;
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat;
        /*background-color: rgb(10,153,153); /* Fallback color */
        /*background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
        font-family: Lato, Arial, Helvetica, sans-serif;
    }

    /* Modal Container */
    .bookView-container {
        margin: auto 10%;
    }

    .bookView-container hr{
        margin: 0px 0px 10px;
    }

    .bookView-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .bookView-container-content h1{
        line-height: 50px;
    }

    .bookView-container-content .bookView-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    /* Clear floats after the columns */
    .bookView-container-content .bookView-information .bookView-row:after {
        content: "";
        display: table;
        clear: both;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column {
        float: left;
        height: 420px;
        width: 31.325%;
        padding: 5px 10px;
        font-size: 25px;
        color: white;
        margin-bottom: 5px;
        text-align: justify;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column h5{
        border-bottom: 3px solid white;
        margin-bottom: 10px;
        color: gold;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column ul{
        list-style-type: none;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column ul li{
        width: 100%;
        border-radius: 5px;
        text-align: center;
        padding: 5px 0px;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column ul li p{
        background: #ffffff;
        color: #000000;
        width: 100%;
        font-weight: bold;
        line-height: 35px;
        text-align: center;
        border-radius: 3px;
        text-transform: uppercase;
        font-size: 20px;
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column ul li h4{
        width: 150px;
        color: #ffffff;
        font-size: 15px;
        text-align: justify;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        text-transform: uppercase;   
    }

    .bookView-container-content .bookView-information .bookView-row .bookView-column ul li img{
        width: 98%;
        height: 89%;
        border-radius: 5px;
        border: 2px solid white;
    }


    .bookView-container-content .bookView-information h3{
        text-align: left;
        margin-left: 2px;
    }

    /* The Close Button */
    .apClose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 18px;
    }

    .apClose:hover,
    .apClose:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>

<?php 
    include_once("includes/dbconnect.php");
    $query = "SELECT sum(bo.bo_Qty) as Sold,ub.ub_BIDN,ub.ub_Synopsis, ub.ub_Title, ub.ub_Author, bc.Category, ub.ub_Qty, ub.ub_Price, ub.ub_Status, ub.ub_Seller,ub.ub_BCover FROM user_books as ub inner join book_category as bc on ub.ub_Category=bc.RefNo left join book_orders as bo on bo.bo_BIDN=ub.ub_BIDN WHERE ub.ub_Status='ON SALE' AND ub.ub_BIDN='".$_GET['book_id']."' or ub.ub_Status='RESERVED' AND ub.ub_BIDN='".$_GET['book_id']."' group by ub_BIDN order by ub_BIDN ASC";
    $results=mysqli_query($con,$query);

    
    
    while($rows = mysqli_fetch_array($results)) {
        $bIDN = $rows['ub_BIDN'];
        $bTitle = $rows['ub_Title'];
        $bGenre = $rows['Category'];
        $bAuthor = $rows['ub_Author'];
        $bQty = $rows['ub_Qty'];
        $bSold = $rows['Sold'];
        $bPrice = $rows['ub_Price'];
        $bStatus = $rows['ub_Status'];
        $bSeller = $rows['ub_Seller'];
        $bCover = $rows['ub_BCover'];
        $bSynopsis = $rows['ub_Synopsis'];

        if($bSold==""){
            $Sold = 0;
        }else{
            $Sold = $bSold;
        }
                               
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="includes/style.css">
	<link rel="icon" type="image/ico" href="assets/logo.png">
        <title>Book Records</title>
    </head>
<body>
    <!-- The Modal -->
    <div id="viewRecord" class="bookView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <!-- Modal content -->
        <div class="bookView-container">
            <span class="apClose">&times;</span>
            <div class="bookView-container-content">
                <h1 class="title-center highlight gold-title">BOOK RECORDS</h1>
                <form class="bookView-information" role="form" method="post" enctype="multipart/form-data" action="">
                    <div class="bookView-row">
                        <div class="bookView-column"  style="background:rgb(10,100,100);">
                            
                            <h5>BOOK INFORMATION</h5>
                            <ul>
                                <li><h4>BIDN:</h4><p><?php echo $bIDN ?></p></li>
                                <li><h4>Title:</h4><p style="height: 35px;overflow:auto""><?php echo $bTitle ?></p></li>
                                <li><h4>Author:</h4><p style="padding: 3px 0px;height: 35px;overflow:auto"><?php echo $bAuthor ?></p></li>
                                <li><h4>Category:</h4><p><?php echo $bGenre ?></p></li>
                                <li><h4>Status:</h4><p><?php echo $bStatus ?></p></li>
                                <li><h4>Seller:</h4><p><?php echo $bSeller ?></p></li>
                            </ul>
                            
                        </div>
                        <div class="bookView-column"  style="background:rgb(10,143,143);">
                            <h5>PURCHASED RECORDS</h5>
                            <ul>
                                <li><h4>Synopsis:</h4><p style="font-size: 15px; line-height: 15px;text-align: justify; padding:3px 8px; width: 95%; text-transform: none;height: 38.5%;overflow:auto"><?php echo $bSynopsis ?></p></li>
                                <li><h4>Price:</h4><p><?php echo $bPrice ?></p></li>
                                <li><h4>Available Stock/s:</h4><p><?php echo $bQty ?></p></li>
                                <li><h4>Sold Copy:</h4><p><?php echo $Sold ?></p></li>
                            </ul>
                        </div>
                        <div class="bookView-column"  style="background:rgb(10,100,100);">
                            <h5>BOOK COVER</h5>
                            <ul>
                                <li style="padding: 0px"><div class="backView"><img id="viewImg" alt="Book Cover" src="../users<?php echo $bCover ?>">
                                </div></li>
                            </ul>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modalV = document.getElementById('viewRecord');

        // Get the <span> element that closes the modal
        var spanva = document.getElementsByClassName("apClose")[0];


        // When the user clicks on <span> (x), close the modal
        spanva.onclick = function(){
            window.location.href='book_records.php';
        }

    </script>
    </body>
</html>