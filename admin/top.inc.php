<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
   header('location:login.php');
   die();
}
?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<style>
    .bg{
        font-size: 32px;
        margin-left: -10px;
    }
        .glyphicon {
        background-color: red;
        padding: 8px 15px;
        color: white;
        font-weight: 700;
    }

    .glyphicon:hover {
        background-color: white;
        color: red;
        text-decoration: none;
        font-weight: 700;
    }
    </style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if($_SESSION['ADMIN_ROLE']!=1){?>
                    <li class="menu-item-has-children dropdown">
                        <a href="index.php">DASHBOARD</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="users.php">USER LIST</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="user_management.php">USER MANAGEMENT</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="manage_user_management.php">ADD USER</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="announcement.php">ANNOUNCEMENT</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="manage_announcement.php">ADD ANNOUNCEMENT</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="blood_bank.php">BLOOD BANK</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="manage_blood_bank.php">ADD BLOOD BANK</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="message.php">MESSAGE</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <div class="user-area dropdown float-right">
                        <a class="bg" href="index.php" >Admin Panel</a>
                    </div>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                <a href="logout.php">
                <div class="glyphicon">Logout</div></a>
                </div>
            </div>
        </header>