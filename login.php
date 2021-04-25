

<style>
    /* The Modal (background) */
    .login {
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
    .login-container {
        margin: 5% 32%;
    }

    .login-container hr{
        margin: 0px 0px 10px;
    }


    .login-container-content h1{
        margin-top: 10px;
        line-height: 60px;
        color: gold;
    }

    .login-container-content{
        border-radius: 5px;
        background-color: rgb(10,100,100);
        padding: 10px 50px 20px;
        margin-top: 5px;
        text-align: left;
        color: #ffffff;
    }

    .container input{
        width: 95%;
        padding: 5px 10px;
        font-size: 15px;
        margin: 3px 0px;
        line-height: 30px;
        outline-style: none;
        border: none;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .container input:focus{
        border: 2px solid gold;
    }


    .container button{
        width: 100%;
        border: none;
        outline-style: none;
        background: gold;
        padding: 15px;
        font-size: 20px;
        border-radius: 5px;
        transition: transform .2s;
        cursor: pointer;
    }

    .container button:hover{
        background: rgb(2, 161, 161);
        transform: scale(1.03);
    }

    .container p{
        text-align: center;
        line-height: 45px;
    }

    .container p a{
        color: #ffffff;
        text-decoration: none;
    }

    .container p a:hover{
        color: gold;
        text-decoration: underline;
    }

    /* The Close Button */
    .clOSE {
    color: #ffffff;
    float: right;
    font-size: 35px;
    font-weight: bold;
    padding: 0px 10px;
    }

    .clOSE:hover,
    .clOSE:focus {
    color: gold;
    text-decoration: none;
    cursor: pointer;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<body>

    <!-- The Modal -->
    <div id="login" class="login">

        <!-- Modal content -->
        <div class="login-container">
            <span class="clOSE">&times;</span>
            <div class="login-container-content">
                <h1 style="text-align: center;">Welcome to NBOOK</h1><hr>
                <form  role="form" method="post" action="logconfig.php">
                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        <hr>
                        <button name="user_login">SIGN IN</button>
                        <p class="psw"><a href="signup.php">Create an Account</a> <!--| <a href="#">Forgot your Password?</a>--> </p>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modalY = document.getElementById('login');

        // Get the <span> element that closes the modal
        var spanY = document.getElementsByClassName("clOSE")[0];


        // When the user clicks on <span> (x), close the modal
        spanY.onclick = function () {
            modalY.style.display = "none";
        }

    </script>
    </body>
</html>