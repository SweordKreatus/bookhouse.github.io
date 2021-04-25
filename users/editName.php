<style>
    /* The Modal (background) */
    .sName {
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
    .sName-container {
        margin: 5% 30%;
    }

    .sName-container hr{
        margin: 0px 0px 10px;
    }

    .sName-container-content{
        background-color: rgb(10,100,100);
        margin: auto;
        padding: 10px 20px 20px;
        border-radius: 5px;
        width: 96%;
    }

    .sName-container-content h1{
        line-height: 50px;
        color: gold;
    }

    .sName-container-content .sName-information{
        border-radius: 5px;
        background-color: #ffffff;
        padding: 10px 20px;
        margin-top: 5px;
        text-align: center;
    }

    .sName-container-content .sName-information h3{
        text-align: left;
        margin-left: 2px;
    }

    .sName-container-content .sName-information input[type=text]{
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

    .sName-container-content .sName-information input[type=text]:focus{
        border: 2px solid gold;
    }


    .sName-container-content .sName-information .sName-btn button{
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

    .sName-container-content .sName-information .sName-btn button:hover{
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
    <div id="eName" class="sName">

        <!-- Modal content -->
        <div class="sName-container">
            <span class="close">&times;</span>
            <div class="sName-container-content">
                <h1 class="title-center highlight gold-title">Update Profile</h1>
                <form class="sName-information" role="form" method="post" enctype="multipart/form-data" action="includes/updateConfig.php">

                    <h3>First Name:</h3> <input type="text" value="<?php echo $uID?>" name="eID" style="display:none;">
                    <input type="text" value="<?php echo $uFname?>" name="eFname">
                    <h3>Last Name:</h3>
                    <input type="text" value="<?php echo $uLname?>" name="eLname">
                            
                    <div class="sName-btn">
                        <button class="btn-save" name="namedit">SAVE CHANGES</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('eName');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];


        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

    </script>
    </body>
</html>