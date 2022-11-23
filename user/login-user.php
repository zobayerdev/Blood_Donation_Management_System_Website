<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_user.css">
    <style>
        banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(background.jpg);
            background-size: cover;
            background-position: center;
        }

        .navbar {
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 80px;
            cursor: pointer;
        }

        .navbar ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        .navbar ul li a {
            text-decoration: none;
            color: floralwhite;
            text-transform: uppercase;
        }

        .navbar ul li::after {
            content: '';
            height: 3px;
            width: 0;
            background: #FF0000;
            position: absolute;
            left: 0;
            bottom: -15px;
            transition: 0.5s;
        }

        .navbar ul li:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <a href="../index.html">
                <img src="../images/logo.png" class="logo">
            </a>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="login-user.php">Login</a></li>
                <li><a href="../user/search.php">Search Donor</a></li>
                <li><a href="../admin/login.php">Admin</a></li>
                <li><a href="../html/contact.html">About Us</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login</h2>
                    <?php
                    if(count($errors) > 0){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        Email
                        <input class="form-control" type="email" name="email" placeholder="Enter your email" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        Password
                        <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">New here? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>