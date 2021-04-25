<style>
/* The Modal (background) */
.read {
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
.read-container {
    margin: 5% 25%;
}

.read-container hr{
    margin: 0px 0px 10px;
}

.read-container-content{
    background-color: rgb(10,100,100);
    margin: auto;
    padding: 10px 20px 20px;
    border-radius: 5px;
    width: 96%;
}

.read-container-content h1{
    line-height: 50px;
}

.read-container-content .read-information{
    border-radius: 5px;
    background-color: #ffffff;
    padding: 5px 10px;
    margin-top: 5px;
    text-align: center;
    min-height: 300px;
}

.read-container-content .read-information h3{
    text-align: left;
    margin-left: 2px;
    color: rgb(10,100,100);
}

.read-container-content .read-information textarea{
    width: 100%;
    height: auto;
    border: none;
    background: none;
    outline-style: none;
    font-size: 12px;
    color: #000000;
}

.read-container-content table{
  width: 100%;
  border-collapse: collapse;
  background: #ffffff;
}

.read-container-content .table-list{
  margin-top: 10px;
  max-height: 350px;
  overflow: auto;
}

.read-container-content table th{
  border: 2px solid rgb(10,50,50);
  line-height: 30px;
  background: gold;
  color: rgb(10,50,50);
  text-transform: uppercase;
}

.read-container-content table td{
  text-align: center;
  font-size: 12px;
}

.read-container-content tr:nth-child(even) {
  background: #ddd;
}


/* The Close Button */
.rClose {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 5px 0px;
}

.rClose:hover,
.rClose:focus {
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
        $rmessages = "SELECT * FROM `feedback` WHERE fd_status='READ' order by fd_RefNo DESC";
        $rdResult=mysqli_query($con,$rmessages);
    ?>

    <!-- The Modal -->
    <div id="readMSG" class="read">

        <!-- Modal content -->
        <div class="read-container">
            <span class="rClose">&times;</span>
            <div class="read-container-content">
                <h1 class="title-center highlight gold-title">INBOX MESSAGES</h1>
                <div class="read-information">
                    <div class="table-list" id="book_category">
                        <table>
                            <tr>
                                <th style="width: 10%;">RN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 50%;">Message</th>
                            </tr>
                            <?php
                                while($rows = mysqli_fetch_array($rdResult)) {
                                    $fRNo = $rows['fd_RefNo'];
                                    $fName = $rows['fd_name'];
                                    $fEmail = $rows['fd_email'];
                                    $fMessage = $rows['fd_message'];
                                    $fType = $rows['fd_type'];
                                    $fStatus = $rows['fd_status'];
                                    $fDate = $rows['fd_date'];
                                    $newTime = date("h:m:sa", strtotime($fDate));
                                    $newDate = date("M d,Y", strtotime($fDate));
                            ?>
                            <tr>
                                <td><?php echo $fRNo ?></td>
                                <td><?php echo $fName ?></td>
                                <td><?php echo $fEmail ?></td>
                                <td><textarea disabled rows="3"><?php echo $fMessage ?></textarea></td>
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
        var rModal = document.getElementById('readMSG');

        // Get the <span> element that closes the modal
        var rSpan = document.getElementsByClassName("rClose")[0];


        // When the user clicks on <span> (x), close the modal
        rSpan.onclick = function () {
            rModal.style.display = "none";
        }

    </script>
    </body>
</html>