<style>
/* The Modal (background) */
.vMSG {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99; /* Sit on top */
    padding-top: 20px; /* Location of the box */
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
.vMSG-container {
    margin: 5% 10%;
}

.vMSG-container hr{
    margin: 0px 0px 10px;
}

.vMSG-container-content{
    background-color: rgb(10,100,100);
    margin: auto;
    padding: 10px 20px 20px;
    border-radius: 5px;
    width: 96%;
}

.vMSG-container-content h1{
    line-height: 50px;
}

.vMSG-container-content .vMSG-information{
    border-radius: 5px;
    background-color: #ffffff;
    padding: 10px 20px;
    margin-top: 5px;
    text-align: center;
    min-height: 300px;
}

.vMSG-container-content .vMSG-information h3{
    text-align: left;
    margin-left: 2px;
    color: rgb(10,100,100);
}

.vMSG-container-content .vMSG-information p,textarea{
    width: 95%;
    padding: 5px 10px;
    font-size: 18px;
    margin: 3px 0px;
    outline-style: none;
    border: 2px solid rgb(10,100,100);
    border-radius: 5px;
    margin-bottom: 5px;
    text-align: center;
    color: #000000;
}

.vMSG-container-content .vMSG-information .vMSG-btn button{
    width: 40%;
    border: none;
    outline-style: none;
    background: rgb(10,50,50);
    color: #ffffff;
    padding: 5px 15px;
    font-size: 20px;
    border-radius: 5px;
    transition: transform .2s;
    cursor: pointer;
}

.vMSG-container-content .vMSG-information .vMSG-btn button:hover{
    outline:2px solid gold;
}


/* The Close Button */
.Vlose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 15px;
}

.Vlose:hover,
.Vlose:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
}
</style>
<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="vMessage" class="vMSG">

        <!-- Modal content -->
        <div class="vMSG-container">
            <span class="Vlose">&times;</span>
            <div class="vMSG-container-content">
                <h1 class="title-center highlight gold-title">MESSAGES</h1>
                <form role="form" method="post" enctype="multipart/form-data" action="includes/addconfig.php">
                    <div class="vMSG-information">
                        <h3>Name:</h3><input type="text" id="refNO" value="<?php echo $fRNo?>" name="refNO" style="display:none;">
                        <p  id="name" name="name"></p>
                        <h3>Email:</h3>
                        <p  id="email" name="email"></p>
                        <h3>Message:</h3>
                        <textarea type="text" id="msg" value="" rows="5" disabled name="msg"></textarea>
                        <h3 style="display:none" >Type:</h3>
                        <p style="display:none" id="typ"  name="typ"></p>
                    </div>
                    <div class="vMSG-btn">
                        <button  style="width:48%;" name="vMMaR">MARK AS READ</button>
                        <button  style="width:48%;" name="vMFeed">DISPLAY AS FEEDBACK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var vModal = document.getElementById('vMessage');

        // Get the <span> element that closes the modal
        var vSpan = document.getElementsByClassName("Vlose")[0];


        // When the user clicks on <span> (x), close the modal
        vSpan.onclick = function () {
            vModal.style.display = "none";
        }

    </script>
    </body>
</html>