<style>
    /* The Modal (background) */
    .upBook {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99; /* Sit on top */
        padding-top: 30px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
        font-family: Lato, Arial, Helvetica, sans-serif;
    }

    /* Modal Container */
    .upBook-container {
        margin: 5% 30%;
    }

    .upBook-container hr{
        margin: 0px 0px 10px;
    }

    .upBook-container-content{
        background-color: gold;
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .upBook-container-content h1{
        line-height: 50px;
        color: rgb(10,100,100);
    }

    .upBook-container-content .upBook-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .upBook-container-content .upBook-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .upBook-container-content .upBook-information input{
        width: 95%;
        padding: 5px 10px;
        font-size: 18px;
        margin: 3px 0px;
        line-height: 30px;
        outline-style: none;
        border: 2px solid rgb(10,100,100);
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .upBook-container-content .upBook-information select{
        width: 100%;
        padding: 5px 10px;
        font-size: 18px;
        margin: 3px 0px;
        line-height: 30px;
        outline-style: none;
        border: 2px solid rgb(10,100,100);
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .upBook-container-content .upBook-information input:focus{
        border: 2px solid gold;
    }


    .upBook-container-content .upBook-information .upBook-btn button{
        width: 99%;
        border: none;
        outline-style: none;
        background: rgb(10,100,100);
        color: #ffffff;
        padding: 15px;
        font-size: 20px;
        border-radius: 5px;
        transition: transform .2s;
        cursor: pointer;
    }

    .upBook-container-content .upBook-information .upBook-btn button:hover{
        background: rgb(10,79,79);
        color: gold;
        transform: scale(1.03);
    }


    /* The Close Button */
    .ublose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
    }

    .ublose:hover,
    .ublose:focus {
    color: rgb(10,100,100);
    text-decoration: none;
    cursor: pointer;
    }
</style>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="Upbook" class="upBook">

        <!-- Modal content -->
        <div class="upBook-container">
            <span class="ublose">&times;</span>
            <div class="upBook-container-content">
                <h1 class="title-center highlight gold-title">Update Book</h1>
                <form class="upBook-information" role="form" method="post" enctype="multipart/form-data" action="includes/updateConfig.php">
                    <h3>Book Title:</h3> <input type="text" value="" id="ubIDN" name="bkIDN" style="display:none;">
                    <input type="text" value="" placeholder="Title" id="ubTitle" name="bkTitle">
                    <h3>Status:</h3>
                    <select id="ubStatus" name="bkStatus">
                        <option >ON SALE</option>
                        <option >RESERVED</option>
                        <option >OUT OF STOCK</option>
                    </select>
                    <h3>PRICE:</h3>
                    <input type="number" min="1" id="ubPrice" name="bkPrice">
                    <h3>Stock/s:</h3>
                    <input type="number" min="0" placeholder="Available Stock/s" id="ubQty" name="bkQty">
                    <div class="upBook-btn">
                        <button class="btn-save" name="updatebtn">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var uBmodal = document.getElementById('Upbook');

        // Get the <span> element that closes the modal
        var uBspan = document.getElementsByClassName("ublose")[0];


        // When the user clicks on <span> (x), close the modal
        uBspan.onclick = function () {
            uBmodal.style.display = "none";
        }

    </script>
    </body>
</html>