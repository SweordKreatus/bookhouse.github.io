<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/style.css">
    <link rel="icon" type="image/ico" href="assets/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Panel</title>
</head>

<body id="indx">
    <div class="indx">
        <div class="indx-container">
            <div class="form">
                <div class="form-title">
                    <p>Admin Panel</p>
                </div>
                <ul>
                    <form class="form-login"  method="post" action="includes/logconfig.php">
                        <li><i class="fa fa-user" style="color: rgb(10,100,100)">
                                <input type="text" placeholder="Username" name="username" id="user"></i>
                        </li>

                        <li><i class="fa fa-lock" style="color: rgb(10,100,100)">
                                <input type="password" placeholder="Password" name="password" id="pass"></i>
                        </li>
                        <button type="submit" name="user_login">
                            <i class="fa fa-sign-in"></i> SIGN IN
                        </button>
                    </form>
                </ul>
                <a href="../index.php">Login as User</a>
            </div>
        </div>
    </div>

</body>

</html>