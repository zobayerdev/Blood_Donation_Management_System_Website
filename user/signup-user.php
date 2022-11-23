<?php require_once "controllerUserData.php"; ?>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Sign Up </title>
    <link rel="stylesheet" href="../css/style_user_reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="container">
            <div class="title">Sign Up</div>
            <div class="content">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) == 1){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }elseif(count($errors) > 1){
                        ?>
                    <div class="alert alert-danger">
                        <?php
                            foreach($errors as $showerror){
                                ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input class="form-control" type="text" name="name" placeholder="Enter your full name" required value="<?php echo $name ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input class="form-control" type="number" name="mobile" placeholder="Enter your phone number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input class="form-control" type="email" name="email" placeholder="Enter your email address" required value="<?php echo $email ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Age</span>
                            <input type="number" placeholder="Enter your age" name="age" min="18" max="99" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input class="form-control" type="password" name="password" placeholder="Choose a password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <label>Division&nbsp;</label>
                        <select name="division" required>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rongpur">Rongpur</option>
                            <option value="Sylhet">Sylhet</option>
                        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>District&nbsp;</label>
                        <select name="district" required>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalgonj">Gopalgonj</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Joypurhat">Joypurhat</option>
                            <option value="Khagrachhari">Khagrachhari</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Magura">Magura</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Narail">Narail</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Natore">Natore</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                            <textarea class="c" name="address_t" cols="44" placeholder="Enter detailed address" rows="3" required></textarea>
                        </select>
                        <div class="gender-details">
                            <input type="radio" name="gender" value="male" id="dot-1">
                            <input type="radio" name="gender" value="female" id="dot-2">
                            <input type="radio" name="gender" value="others" id="dot-3">
                            <span class="gender-title">Gender</span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span class="gender">Male</span>
                                </label>
                                <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span class="gender">Female</span>
                                </label>
                                <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span class="gender">Prefer not to say</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-box">
                            <span class="details">Blood Group</span>
                            <select name="blood" required>
                                <option value="A-">A-</option>
                                <option value="A+">A+</option>
                                <option value="B-">B-</option>
                                <option value="B+">B+</option>
                                <option value="O-">O-</option>
                                <option value="O+">O+</option>
                                <option value="AB-">AB-</option>
                                <option value="AB+">AB+</option>
                            </select>
                        </div>
                        <div class="button">
                            <input name="signup" type="submit" value="Sign Up">
                        </div>
                        <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>