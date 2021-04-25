<style>
/* The Modal (background) */
    .adBook {
        /* Hidden by default */
        display: none;
        position: fixed; /* Stay in place */
        z-index: 99; /* Sit on top */
        padding-top: 4.8%; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        
        background-color: #ffffff; /* Fallback color */
        background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
        font-family: Lato, Arial, Helvetica, sans-serif;
    }

    /* Modal Container */
    .adBook-container {
        margin: auto 10%;
    }

    .adBook-container hr{
        margin: 0px 0px 10px;
    }

    .adBook-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .adBook-container-content h1{
        line-height: 50px;
    }

    .adBook-container-content .adBook-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    /* Clear floats after the columns */
    .adBook-container-content .adBook-information .adBook-row:after {
        content: "";
        display: table;
        clear: both;
    }

    .adBook-container-content .adBook-information .adBook-row .adBook-column {
        float: left;
        height: 420px;
        width: 47.95%;
        padding: 5px 10px;
        font-size: 25px;
        color: white;
        margin-bottom: 5px;
        text-align: justify;
    }

    .adBook-container-content .adBook-information .adBook-row .adBook-column h5{
        border-bottom: 3px solid white;
        margin-bottom: 10px;
    }

    .adBook-container-content .adBook-information .adBook-row .adBook-column ul{
        list-style-type: none;
    }

    .adBook-container-content .adBook-information .adBook-row .adBook-column ul li{
        width: 100%;
        border-radius: 5px;
        text-align: center;
    }


    .adBook-container-content .adBook-information .adBook-row .adBook-column ul li h4{
        width: auto;
        color: #ffffff;
        font-size: 15px;
        text-align: justify;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        text-transform: uppercase;  
        margin-left: 8px; 
    }



    .adBook-container-content .adBook-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .adBook-container-content .adBook-information textarea[type=text],
    .adBook-container-content .adBook-information input,
    .adBook-container-content .adBook-information p{
        width: 92.5%;
        padding: 5px 10px;
        font-size: 18px;
        margin: 3px 0px;
        line-height: 20px;
        outline-style: none;
        border: none;
        border-radius: 5px;
        
    }

    .adBook-container-content .adBook-information select[type=text]{
        width: 97%;
        padding: 5px 10px;
        font-size: 18px;
        margin: 3px 0px;
        line-height: 20px;
        border: none;
        outline-style: none;
        border-radius: 5px;
    }

    .adBook-container-content .adBook-information .adBook-btn{
        margin: 10px 0px;
    }

    .adBook-container-content .adBook-information .adBook-btn .btn-save{
        width: 100%;
        border: none;
        outline-style: none;
        background: rgb(0,141,141);
        padding: 15px;
        font-size: 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px 0px 0px;
        font-weight: bold;
        color: #ffffff;
    }

    .adBook-container-content .adBook-information .adBook-btn .btn-cancel{
        width: 100%;
        border: none;
        outline-style: none;
        background: darkgrey;
        padding: 15px;
        font-size: 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px 0px 0px;
        font-weight: bold;
    }

    .adBook-container-content .adBook-information .adBook-btn .btn-save:hover{
        color: gold;
        background: rgb(4, 88, 88);
    }

    .adBook-container-content .adBook-information .adBook-btn .btn-cancel:hover{
        color: #ffffff;
        background: rgb(104, 104, 104);
    }

    


    /* The Close Button */
    .close {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 18px;
    }

    .close:hover,
    .close:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>
<?php
 include("config.php");
 extract($_SESSION); 
		$stmt_edit = $DB_con->prepare('SELECT * FROM accounts WHERE `username` =:username');
		$stmt_edit->execute(array(':username'=>$username));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>

    <?php
        require_once("includes/dbController.php");
        $db_handle = new DBController();
        $query = "SELECT * FROM book_category";
        $results = $db_handle->runQuery ($query);
    ?>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="adBook" class="adBook">

        <!-- Modal content -->
        <div class="adBook-container">
            <span class="close">&times;</span>
            <div class="adBook-container-content">
                <h1 style="color: gold;text-align: center">ADD NEW BOOK</h1>
                <form class="adBook-information" role="form" method="post" enctype="multipart/form-data" action="includes/addConfig.php">
                    <div class="adBook-row">
                        <div class="adBook-column"  style="background:rgb(4, 88, 88)">
                            <h5>BOOK INFORMATION</h5>
                            <ul>
                                <li><h4>Title:</h4><input type="text" placeholder="Enter Book Title" name="BTitle"></li>
                                <li><h4>Author:</h4><input type="text" placeholder="Enter Book Author" name="BAuthor"></li>
                                <li><h4>Category:</h4><select type="text" name="BGenre">
                                    <?php
                                            foreach ($results as $Category) {
                                            ?>
                                    <option value="<?php echo $Category["RefNo"];?>"><?php echo $Category["Category"];?></option>
                                    <?php
                                            }
                                        ?></select>
                                </li>
                                <li><h4>Synopsis:</h4>
                                <textarea type="text" rows="9" placeholder="Book Synopsis" name="BSynopsis"></textarea></li>
                            </ul>
                        </div>
                        <div class="adBook-column"  style="background:rgb(10,100,100);">
                            <h5>BOOK PRICE</h5>
                            <ul>
                                <li><h4>Quantity:</h4><input type="number" min="1" value="1" name="BQty"></li>
                                <li><h4>Price:</h4><input type="text" placeholder="Enter Book Price" name="BPrice"></li>
                                <li><h4>SELLER:</h4><p type="text" style="background: #ffffff;color: black;margin-left:8.5px;" name="BSeller"><?php echo $username ?></p></li>
                                <li><h4>Book Cover:</h4><input type="file" name="BCover"></li>
                                <div class="adBook-btn">
                                    <button class="btn-save" type="submit" name="aBSubmit">SUBMIT</button>
                                    <button class="btn-cancel">CANCEL</button>
                                </div>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('adBook');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];


        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

    </script>
    <!--<script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>-->

    </body>

</html>