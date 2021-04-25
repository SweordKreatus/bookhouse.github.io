<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/ico" href="assets/logo.png">
  <title>Register - Book House</title>
<style>
  body {
    margin: 50px 20% 5%;
    background-image: url("../nbook/assets/assets1.jpg");
    background-attachment: fixed;
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;
  }

  * {
    box-sizing: border-box;
  }

  form{
    background-color:rgba(10,100,100);
    padding: 0px 20px 20px;
    color: #ffffff;
  }

  /* Add padding to containers */
  .container {
    padding: 16px;
  }

  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 2px 0 10px 0;
    font-size: 18px;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus, input[type=password]:focus {
    outline: 2px solid gold;
    background: #ffffff;
  }

  /* Overwrite default styles of hr */
  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 15px;
  }

  /* Set a style for the submit button */
  .registerbtn {
    background-color: gold;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    color: rgb(10,100,100);
    width: 100%;
    font-size: 25px;
    font-weight: bold;
  }

  .registerbtn:hover {
    background: rgb(2, 161, 161);
    color: #ffffff;
  }

  /* Add a blue text color to links */
  .signin p a {
    color: black;
    text-decoration: none;
  }

  .signin p a:hover{
    color: red;
    text-decoration: underline;
  }

  /* Set a grey background color and center the text of the "sign in" section */
  .signin {
    background-color: grey;
    text-align: center;
  }
</style>
</head>
<body>

<form role="form" method="post" action="regconfig.php">
  <div class="container">
    <h1 style="text-align: center;">Create an Account</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>


    <label for="fn"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="fn" required>

    <label for="ln"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="ln" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Address" name="address" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Contact" name="contact" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Username" name="user" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pass" required>

    <label for="rpass"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="rpass" required>
    <hr>

    <button class="registerbtn" name="register">REGISTER</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
