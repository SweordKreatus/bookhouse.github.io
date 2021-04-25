<style>
    /* The Modal (background) */
    .sMail {
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
    .sMail-container {
        margin: 5% 30%;
    }

    .sMail-container hr{
        margin: 0px 0px 10px;
    }

    .sMail-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .sMail-container-content h1{
        line-height: 50px;
        color: gold;
    }

    .sMail-container-content .sMail-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .sMail-container-content .sMail-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .sMail-container-content .sMail-information input[type=text]{
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

    .sMail-container-content .sMail-information input[type=text]:focus{
        border: 2px solid gold;
    }


    .sMail-container-content .sMail-information .sMail-btn button{
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

    .sMail-container-content .sMail-information .sMail-btn button:hover{
        background: rgb(10,79,79);
        color: gold;
        transform: scale(1.03);
    }


    /* The Close Button */
    .cLose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
    }

    .cLose:hover,
    .cLose:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="eMail" class="sMail">

        <!-- Modal content -->
        <div class="sMail-container">
            <span class="cLose">&times;</span>
            <div class="sMail-container-content">
                <h1 class="title-center highlight gold-title">Update Email Address</h1>
                <form class="sMail-information" role="form" method="post" enctype="multipart/form-data" action="includes/updateConfig.php">
                    <h3>Email Address:</h3><input type="text" value="<?php echo $uID?>" name="eID" style="display:none;">
                    <input type="text" value="<?php echo $uEmail?>" name="eEmail">
                            
                    <div class="sMail-btn">
                        <button class="btn-save" name="cEmail">SAVE CHANGES</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modalY = document.getElementById('eMail');

        // Get the <span> element that closes the modal
        var spanY = document.getElementsByClassName("cLose")[0];


        // When the user clicks on <span> (x), close the modal
        spanY.onclick = function () {
            modalY.style.display = "none";
        }

    </script>
    </body>
</html>