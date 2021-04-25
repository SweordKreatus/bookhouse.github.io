
<?php 
    require_once("../BookHouse/users/includes/dbconnect.php");
    $genre = "SELECT * FROM `book_category`";
    $genresult=mysqli_query($con,$genre);

    $book = "SELECT sum(bo.bo_Qty) as Quantity, ub.ub_Title, ub.ub_Author,bc.Category,sum(bo.bo_Price)as Price,ub.ub_Price,ub.ub_BCover,ub.ub_Seller, uc.uc_BIDN FROM book_orders as bo inner join user_cart as uc on bo.bo_CartNo=uc.uc_CartNo inner join user_books as ub on bo.bo_BIDN=ub.ub_BIDN inner join book_category as bc on ub.ub_Category=bc.Refno group by bo_BIDN order by Quantity DESC limit 3";
	$all=mysqli_query($con,$book);
	
	$feedback = "SELECT * FROM `feedmsg` WHERE `fm_Type`='FEEDBACK' order by fm_Date DESC limit 3 ";
    $fdResult=mysqli_query($con,$feedback);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link rel="icon" type="image/ico" href="assets/logo.png">
    <title>NBook Store</title>
</head>
<body>
    <?php include 'login.php' ?>

    <div class="signin"> <!--Signin & signup buttons header-->
        <div class="signin-right">
            <button onclick="document.getElementById('login').style.display='block'">Login</button>
            <button onclick="document.location.href='signup.php'">Register</button>
        </div>	
    </div>
    <div class="navBar">
    	<div class="navBar-container">
    		<div class="navBar-btn">
    			<p style="float: left; color: gold; font-size: 40px; padding-left: 20px; font-weight: bold;">NBOOK Store</p>
    			<a href="index.php" class="h-btn">Home</a>
    			<a href="#feature" class="h-btn">Books</a>
    			<a href="#feedback" class="h-btn">Feedback</a>
    			<a href="#contact" class="h-btn">Contact Us</a>
    		</div>
    	</div>		
    </div>
    <h1 style="text-align: center;background: #d1d1d1; color: rgb(10,100,100);font-size: 35px; line-height: 60px;">WELCOME TO NBOOK STORE</h1>
	<div class="feature" id="feature">
		<div class="feature-container">
			<h2><span>TOP SELLING BOOKS</h2></span>
			<div class="feature-wrapper">
				<ul class="feature-wrapper-box">
					<?php
                        while($rows = mysqli_fetch_array($all)) {
                            $bTitle = $rows['ub_Title'];
                            $bGenre = $rows['Category'];
                            $bAuthor = $rows['ub_Author'];
                            $bCover = $rows['ub_BCover'];
                            $bPrice = $rows['ub_Price'];
                    ?>
					<li><img src="users<?php echo $bCover ?>" alt="Book Cover" style="width:390px;height:400px">
						<h3><?php echo $bTitle ?></h3>
						<p>Category: <?php echo $bGenre ?></p>
						<h4>Price: P<?php echo $bPrice ?>.00</h4>
					</li>
					<?php
						}
					?>
				</ul>
			</div>		
		</div>
	</div><hr>
    <div class="feedback" id="feedback">
		<div class="feedback-container">
			<h2><span>FEEDBACKS & REVIEWS</h2></span>
			<div class="feedback-row">
				<ul class="feedback-row-box">
					<?php
                        while($rows = mysqli_fetch_array($fdResult)) {
                            $fmRNo = $rows['fm_RefNo'];
                            $fmName = $rows['fm_Name'];
                            $fmEmail = $rows['fm_Email'];
                            $fmMessage = $rows['fm_Message'];
                            $fmType = $rows['fm_Type'];
                            $fmDate = $rows['fm_Date'];
                            $newTime = date("h:m:sa", strtotime($fmDate));
                            $newDate = date("M d,Y", strtotime($fmDate));
                    ?>
                    <li>
                        <p id="feed"><q><?php echo $fmMessage ?></q></p>
                        <h3><?php echo $fmName ?></h3>
                        <p><?php echo $newDate ?></p>
                    </li>
                    
                    <?php } ?> 
				</ul>
			</div>	
		</div>	
    </div><hr>
    <div class="contact" id="contact">
		<div class="contact-container">
			<h2><span>CONTACT US!</h2></span>
			<p>If you have questions, send us your message or give us your feedbacks about this page.</p>
			<p>For more details & Business related. Feel free to email us.</p>
			<div class="contact-container-row">
				<div class="contact-row-column" style="background-color: gold">
					<h2 style="border-bottom: 5px solid rgba(10,100,100,1); margin: 0px 5%;">NBook Store</h2>
					<div style="text-align: left; padding: 70px 100px; font-size: 25px;">
    					<p><strong>Address:</strong> Saint Mage st. Forbidden City, Earthia</p><br>
    					<p><strong>Email:</strong> NBook@business.com</p>
    				</div>
				</div>
				<div class="contact-row-column" style="background-color: rgba(10,100,100);">
					<h2 style="border-bottom: 5px solid gold; color: #ffffff; margin: 0px 5%;">Send Us Your Feedback/Message</h2>
					<form  role="form" method="post" action="includes/addconfig.php">
						<div class="contact-row-column-msgcontext">
							<label for="name">Name:
								<input type="text" placeholder="Enter your Name here" name="name">
							</label>
							<label for="email">Email:
								<input type="email" placeholder="Enter your Email here" name="email">
							</label>	
							<label for="message">Message:
								<textarea type="text" placeholder="Your Message/Feedback here" rows="5" name="message"></textarea>
							</label>
						</div>
						<button name="contact">SEND MESSAGE</button>	
					</form>	
				</div>		
			</div>
		</div>	
	</div>		
	<div class="footer">
 		<h5>© All Rights Reserved 2020 | Designed by: <strong>iMagoKreatus Arts & Designs</strong></h5>
	</div>
</body>
</html>