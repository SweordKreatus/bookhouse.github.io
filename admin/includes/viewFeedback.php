<style>
/* The Modal (background) */
.feedBack {
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
.feedBack-container {
    margin: 5% 10%;
}

.feedBack-container hr{
    margin: 0px 0px 10px;
}

.feedBack-container-content{
    background-color: rgb(10,100,100);
    margin: auto;
    padding: 10px 20px 20px;
    border-radius: 5px;
    width: 96%;
}

.feedBack-container-content h1{
    line-height: 50px;
}

.feedBack-container-content .feedBack-information{
    border-radius: 5px;
    background-color: #ffffff;
    padding: 5px 10px;
    margin-top: 5px;
    text-align: center;
    min-height: 300px;
}

.feedBack-container-content .feedBack-information h3{
    text-align: left;
    margin-left: 2px;
    color: rgb(10,100,100);
}

.feedBack-container-content .feedBack-information textarea{
    width: 100%;
    height: auto;
    border: none;
    background: none;
    outline-style: none;
    font-size: 12px;
    color: #000000;
}

.feedBack-container-content table{
  width: 100%;
  border-collapse: collapse;
  background: #ffffff;
}

.feedBack-container-content .table-list{
  margin-top: 10px;
  max-height: 350px;
  overflow: auto;
}

.feedBack-container-content table th{
  border: 2px solid rgb(10,50,50);
  line-height: 30px;
  background: gold;
  color: rgb(10,50,50);
  text-transform: uppercase;
}

.feedBack-container-content table td{
  text-align: center;
  font-size: 12px;
}

.feedBack-container-content tr:nth-child(even) {
  background: #ddd;
}


/* The Close Button */
.fbClose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 15px;
}

.fbClose:hover,
.fbClose:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
}
</style>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
        require_once("includes/dbconnect.php");
        $fbmessages = "SELECT * FROM `feedmsg` order by fm_RefNo DESC";
        $rbResult=mysqli_query($con,$fbmessages);
    ?>

    <!-- The Modal -->
    <div id="feedMSG" class="feedBack">

        <!-- Modal content -->
        <div class="feedBack-container">
            <span class="fbClose">&times;</span>
            <div class="feedBack-container-content">
                <h1 class="title-center highlight gold-title">FEEDBACK MESSAGES</h1>
                <div class="feedBack-information">
                    <div class="table-list" id="book_category">
                        <table>
                            <tr>
                                <th style="width: 10%;">RN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 50%;">Message</th>
                            </tr>
                            <?php
                                while($rows = mysqli_fetch_array($rbResult)) {
                                    $fdRNo = $rows['fd_RefNo'];
                                    $fmName = $rows['fm_Name'];
                                    $fmEmail = $rows['fm_Email'];
                                    $fmMessage = $rows['fm_Message'];
                                    $fmType = $rows['fm_Type'];
                                    $fmDate = $rows['fm_Date'];
                                    $newTime = date("h:m:sa", strtotime($fmDate));
                                    $newDate = date("M d,Y", strtotime($fmDate));
                            ?>
                            <tr>
                                <td><?php echo $fdRNo ?></td>
                                <td><?php echo $fmName ?></td>
                                <td><?php echo $fmEmail ?></td>
                                <td><textarea disabled rows="3"><?php echo $fmMessage ?></textarea></td>
                            </tr>
                                <?php } ?>
                        </table>
                    </div>
                    <!--div class="read-btn">
                        <button  style="width:48%;" name="vMMaR">MARK AS READ</button>
                        <button  style="width:48%;" name="vMFeed">DISPLAY AS FEEDBACK</button>
                    </!--div-->
                </div>    
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var fbModal = document.getElementById('feedMSG');

        // Get the <span> element that closes the modal
        var fbSpan = document.getElementsByClassName("fbClose")[0];


        // When the user clicks on <span> (x), close the modal
        fbSpan.onclick = function () {
            fbModal.style.display = "none";
        }

    </script>
    </body>
</html>