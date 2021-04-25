<style>
    /* The Modal (background) */
    .sAddress {
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
    .sAddress-container {
        margin: 5% 30%;
    }

    .sAddress-container hr{
        margin: 0px 0px 10px;
    }

    .sAddress-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .sAddress-container-content h1{
        line-height: 50px;
        color: gold;
    }

    .sAddress-container-content .sAddress-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .sAddress-container-content .sAddress-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .sAddress-container-content .sAddress-information input[type=text]{
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

    .sAddress-container-content .sAddress-information input[type=text]:focus{
        border: 2px solid gold;
    }


    .sAddress-container-content .sAddress-information .sAddress-btn button{
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

    .sAddress-container-content .sAddress-information .sAddress-btn button:hover{
        background: rgb(10,79,79);
        color: gold;
        transform: scale(1.03);
    }


    /* The Close Button */
    .CLose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
    }

    .CLose:hover,
    .CLose:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="AdRest" class="sAddress">

        <!-- Modal content -->
        <div class="sAddress-container">
            <span class="CLose">&times;</span>
            <div class="sAddress-container-content">
                <h1 class="title-center highlight gold-title">Update Location Address</h1>
                <form class="sAddress-information" role="form" method="post" enctype="multipart/form-data" action="includes/updateConfig.php">
                    <h3>Address:</h3><input type="text" value="<?php echo $uID?>" name="eID" style="display:none;">
                    <input type="text" value="<?php echo $uAddress?>" name="eAddress">
                            
                    <div class="sAddress-btn">
                        <button class="btn-save" name="cAddress">SAVE CHANGES</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modalA = document.getElementById('AdRest');

        // Get the <span> element that closes the modal
        var spanA = document.getElementsByClassName("CLose")[0];


        // When the user clicks on <span> (x), close the modal
        spanA.onclick = function () {
            modalA.style.display = "none";
        }

    </script>
    </body>
</html>