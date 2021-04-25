<?php

//	$username = $_SESSION['username'];
?>

<style>
.header{
	background: rgb(10,100,100);
	height: 70px;
	position: sticky;
	position: fixed;
	width: 100%;
	top: 0;
	z-index: 99;
	border-bottom: 5px solid gold;
}

.header ul li a{
	text-decoration: none;
	padding: 15px 15px;
}

.header ul li a:hover{
	background: rgb(10,87,87)
}


/* Dropdown Style ................................*/

.dropbtn {
  color: white;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-flex;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #ffffff;
  color: rgb(10,100,100);
  /*width:auto;*/
  min-width: 200px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  line-height: 15px;
  top: 55px;
  right: 9px;
}


.dropdown-content a {
  color: rgb(10,100,100);
  padding: 10px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  color: #ffffff;
}

.show {display: block;}

/* dropdown Style end........*/


</style>

<div class="header">
	<ul style="box-sizing: border-box;">
    	<li style="display: inline-table;"><img src="../assets/banner-light.png" style=" padding:5px; height: 60px;width: 220px; padding-left: 10px;"></li>
    	<li style="display: inline-table; float: right;margin-right: 10px;line-height: 70px;"><a onclick="myProfile()" class="dropbtn"><?php echo $username?></a>
			<div id="myDropdown" class="dropdown-content">
              <a href="myAccount.php">Profile</a>
              <a href="myAccount.php">Change Password</a>
              <a href="logout.php">Logout</a>
            </div></li>
			<script>
				/* When the user clicks on the button, 
				toggle between hiding and showing the dropdown content */
				function myProfile() {
					document.getElementById("myDropdown").classList.toggle("show");
				}

				// Close the dropdown if the user clicks outside of it
				window.onclick = function(event) {
					if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
						}
					}
					}
				}
			</script>
   	</ul>	
</div>