<style>
    /* The Modal (background) */
    .sPass {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99; /* Sit on top */
        padding-top: 60px; /* Location of the box */
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
    .sPass-container {
        margin: 5% 30%;
    }

    .sPass-container hr{
        margin: 0px 0px 10px;
    }

    .sPass-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .sPass-container-content h1{
        line-height: 50px;
        color: gold;
    }

    .sPass-container-content .sPass-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .sPass-container-content .sPass-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .sPass-container-content .sPass-information input[type=password]{
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

    .sPass-container-content .sPass-information input[type=password]:focus{
        border: 2px solid gold;
    }


    .sPass-container-content .sPass-information .sPass-btn button{
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

    .sPass-container-content .sPass-information .sPass-btn button:hover{
        background: rgb(10,79,79);
        color: gold;
        transform: scale(1.03);
    }


    /* The Close Button */
    .CLOSE {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
    }

    .CLOSE:hover,
    .CLOSE:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>



<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="mPass" class="sPass">

        <!-- Modal content -->
        <div class="sPass-container">
            <span class="CLOSE">&times;</span>
            <div class="sPass-container-content">
                <h1 class="title-center highlight gold-title">Change Password</h1>
                <form id="OldPass" class="sPass-information" role="form" method="post" enctype="multipart/form-data" action="includes/updateConfig.php">
                    <h3>Current Password:</h3><input type="text" value="<?php echo $uID?>" name="eID" style="display:none;">
                    <input type="password" placeholder="Enter Current Password" name="eOldpass">
                    <h3>New Password:</h3>
                    <input type="password" placeholder="Enter New Password" name="eNewpass">
                    <h3>Retype Password:</h3>
                    <input type="password" placeholder="Enter Retype Password" name="eRepass">
                    <div class="sPass-btn">
                        <button class="btn-save" name="cPass">CHANGE PASSWORD</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modalP = document.getElementById('mPass');

        // Get the <span> element that closes the modal
        var spanP = document.getElementsByClassName("CLOSE")[0];


        // When the user clicks on <span> (x), close the modal
        spanP.onclick = function () {
            modalP.style.display = "none";
        }

    </script>
    </body>
</html>