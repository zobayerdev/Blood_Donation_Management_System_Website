<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}

$sql="select * from message where account = '$email'";
$res=mysqli_query($con,$sql);

$sql2="select * from announcement where status=1";
$res2=mysqli_query($con,$sql2);

$sql3="select * from users where email='$email'";
$res3=mysqli_query($con,$sql3);
?>

<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<style>
    body {
        margin: auto;
        width: 100%;
        background-color: #ebebeb;
        font-size: 14px;
        box-sizing: border-box;
    }

    .bgh {
        background-color: black;
    }

    .card-body {
        padding: 10px;
        background-color: #651e28;
    }

    .box-title {
        text-align: center;
        color: #fdf9a9;
    }

    h1 {
        font-size: 30px;
        font-weight: 700;
        text-align: center;
        padding: 20px;
        color: white;
    }

    .navbar {
        background-color: #651e28;

    }

    .glyphicon {
        background-color: red;
        padding: 8px 15px;
        color: white;
        font-weight: 700;
        margin-top: -20px;
    }

    .glyphicon:hover {
        background-color: white;
        color: red;
        text-decoration: none;
        font-weight: 700;
    }

    .navbar-brand {
        color: #fdf9a9;
        margin-left: 20px;
        font-weight: 700;
    }

    a:hover {
        color: white;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0px;
        overflow: hidden;
        background-color: #651e28;
    }

    li {
        float: right;
    }

    li a {
        display: block;
        color: white;
        font-size: 18px;
        text-align: center;
        padding: 10px 20px;
        text-decoration: none;
        font-weight: 600;
    }

    li a:hover {
        background-color: #fdf9a9;
        color: Black;
        font-weight: 600;
    }

    .log:hover {
        background-color: #FF0000;
        color: white;
        font-weight: 600;
    }

    .tabb {
        float: left;
        padding: 2em;
        width: 100%;
        margin-top: -28px;
        margin-bottom: 30px;
    }
</style>

<body>
    <ul>
        <a class="navbar-brand" href="#">Blood Donation Management System</a>
        <li><a class="log" href="logout-user.php">Logout</a></li>
        <li><a href="edit_profile.php?E=<?php echo $email?>">Edit Profile</a></li>
    </ul>
    <div class="bgh">
        <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
    </div>

    <div class="content pb-0">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">



                        <div class="card-body">
                            <h4 class="box-title">Message</h4>
                        </div>
                        <div class="tabb" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile NO.</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['mobile']?></td>
                                        <td><?php echo $row['message']?></td>
                                        <td><?php echo $row['date']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>




                        <div class="card-body">
                            <h4 class="box-title">Announcement</h4>
                        </div>
                        <div class="tabb" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							while($row2=mysqli_fetch_assoc($res2)){?>
                                    <tr>
                                        <td><?php echo $row2['id']?></td>
                                        <td><?php echo $row2['head']?></td>
                                        <td><?php echo $row2['body']?></td>
                                        <td><?php echo $row2['date']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>