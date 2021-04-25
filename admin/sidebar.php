<style>
  /* Side Bar CSS Style Starts Here.....................................................*/
.sidebar {
  background: #b1b1b1;
  margin-top: 0px;
  position: fixed;
  left: 0;
  top: 75px;
  width: 234px;
  height: 100%;
  transition: 0.5s;
  transition-property: left;
  font-family: Lato, arial;
  text-transform: uppercase;
}

.sidebar p span{
    margin-left: 10px;
    text-transform: uppercase;
    color: crimson;
}

.sidebar a{
  color: #000;
  display: block;
  width: 100%;
  line-height: 50px;
  text-decoration: none;
  padding-left: 20px;
  box-sizing: border-box;
  transition: 0.5s;
  transition-property: background;
}

.sidebar a:hover{
  background: rgba(10,120,120,0.3);
  color: #fff;
}

.sidebar a.active{
  background-color: rgba(10,100,100,0.6);
  border-left:5px solid gold;
  color: #fff;
  font-weight: bold;
}


.sidebar i{
  padding-right: 10px;
}

label #sidebar_btn{
  z-index: 1;
  color: black;
  position: fixed;
  cursor: pointer;
  left: 310px;
  top: 20px;
  font-size: 30px;
  margin: 5px 0;
  transition: 0.2s;
  transition-property: color;
}

 label #sidebar_btn:hover{
  color: white;
}
</style>

    <div class="sidebar">
      <a class="<?php if($page=='dash'){echo 'active';}?>" href="../admin/dashboard.php"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
      <a class="<?php if($page=='records'){echo 'active';}?>" href="../admin/book_records.php"><i class="fa fa-file"></i><span>Book Records</span></a>
      <a class="<?php if($page=='user'){echo 'active';}?>" href="../admin/user_information.php"><i class="fa fa-users"></i><span>User Information</span></a>
      <a class="<?php if($page=='logs'){echo 'active';}?>" href="../admin/order_logs.php"><i class="fa fa-history"></i><span>Order Logs</span></a>
      <a class="<?php if($page=='manage'){echo 'active';}?>" href="../admin/manage_page.php"><i class="fa fa-tasks"></i><span>Manage Page</span></a>
      <a class="<?php if($page=='setting'){echo 'active';}?>" href="../admin/settings.php"><i class="fa fa-gears"></i><span>Account Settings</span></a>
    </div>
    <!--sidebar end-->
