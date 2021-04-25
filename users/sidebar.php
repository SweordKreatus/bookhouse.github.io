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
  font-family: gotham, arial;
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
  border-left:5px solid rgba(10,100,100,1);
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
      <a class="<?php if($page=='home'){echo 'active';}?>" href="index.php"><i class="fa fa-home"></i><span>Home</span></a>
      <a class="<?php if($page=='books'){echo 'active';}?>" href="../users/books.php"><i class="fa fa-book"></i><span>Books</span></a>
      <a class="<?php if($page=='orders'){echo 'active';}?>" href="../users/orders.php"><i class="fa fa-shopping-basket"></i><span>Orders List</span></a>
      <a class="<?php if($page=='shop'){echo 'active';}?>" href="../users/myShop.php"><i class="fa fa-shopping-cart"></i><span>My Shop</span></a>
      <a class="<?php if($page=='logs'){echo 'active';}?>" href="../users/logs.php"><i class="fa fa-history"></i><span>Purchased Item</span></a>
      <a class="<?php if($page=='account'){echo 'active';}?>" href="../users/myAccount.php"><i class="fa fa-user-circle-o"></i><span>Accounts</span></a>
      <!--a href="../index.php"><i class="fa fa-power-off"></i><span>Logout</span></!--a-->
    </div>
    <!--sidebar end-->
