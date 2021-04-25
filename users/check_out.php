<style>
    /* The Modal (background) */
    .chkOut {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
        font-family: Lato, Arial, Helvetica, sans-serif;
    }

    /* Modal Container */
    .chkOut-container {
        margin: 5% 35%;
    }

    .chkOut-container hr{
        margin: 0px 0px 10px;
    }

    .chkOut-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .chkOut-container-content h1{
        line-height: 50px;
        color: gold;
    }

    .chkOut-container-content .chkOut-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .chkOut-container-content .chkOut-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .chkOut-container-content .chkOut-information input{
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

    .chkOut-container-content .chkOut-information input:focus{
        border: 2px solid gold;
    }


    .chkOut-container-content .chkOut-information .chkOut-btn button{
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

    .chkOut-container-content .chkOut-information .chkOut-btn button:hover{
        background: rgb(10,79,79);
        color: gold;
        transform: scale(1.03);
    }


    /* The Close Button */
    .close {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
    }

    .close:hover,
    .close:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="chOrder" class="chkOut">

        <!-- Modal content -->
        <div class="chkOut-container">
            <span class="close">&times;</span>
            <div class="chkOut-container-content">
                <h1 class="title-center highlight gold-title">Check Out</h1>
                <form class="chkOut-information" role="form" method="post" enctype="multipart/form-data" action="includes/checkout.php">
                    <h3>Quantity:</h3> <input type="text" value="" id="BIDN" name="chkBIDN" style="display:none;">
                    <input type="text" value="" id="CartNo" name="chkCart" style="display:none;">
                    <input type="number" value="<?php echo $ocQty?>" name="maxQty" style="display:none;">
                    <input type="number" oninput="calc()" min="1" max="<?php echo $ocQty?>" value="" id="Qty" name="chkQty">
                        <input type="number" value="" id="oprce" style="display:none;">
                        <script>
                            function calc(){
                                var prc = document.getElementById("oprce").value;
                                var qty =document.getElementById("Qty").value;
                                var total = parseFloat(prc)* qty;
                                document.getElementById("price").value = total;
                            }
                        </script>
                    <h3>Price:</h3>
                    <input type="text" id="price" value="" name="chkPrice">
                    <div class="chkOut-btn">
                        <button class="btn-save" name="chkout" >SAVE CHANGES</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('chOrder');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];


        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

    </script>
    </body>
</html>