<?php
require_once "controllerUserData.php";
$name='';
$mobile='';
$age='';
$division='';
$district='';
$address='';
$msg='';
$email='';
$password='';
$result='';
if(isset($_GET['E']) && $_GET['E']!=''){
    $id = $_GET['E'];
	$res=mysqli_query($con,"select * from users where email='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $password=$row['password'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $age=$row['age'];
        $division=$row['division'];
        $district=$row['district'];
        $address=$row['address'];
	}else{
		header('location:home.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    $age=mysqli_real_escape_string($con,$_POST['age']);
    $division=mysqli_real_escape_string($con,$_POST['division']);
    $district=mysqli_real_escape_string($con,$_POST['district']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $update_sql="update users set name='$name', password='$password', mobile='$mobile', email='$email', age='$age', division='$division', district='$district', address='$address' where email='$email'";
    mysqli_query($con,$update_sql);
    header("Location: home.php"); 
    exit();
}
?>

<html>

<head>
    <style>
        .bt {
            color: white;
        }

        .bt:hover {
            text-decoration: none;
            color: white;
        }

        .form-group {
            margin-left: 20%;
            width: 60%;
            display: inline-block;
            margin-top: 20px;
        }

        .card-header {
            text-align: center;
            font-size: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="form-group">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><strong>Edit Profile</strong><small> </small></div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body card-block">

                                <div class="form-group">
                                    <label for="username" class=" form-control-label">Name</label>
                                    <input type="text" name="name" placeholder="Enter Name" class="form-control" required value="<?php echo $name?>">
                                </div>
                                <div class="form-group">
                                    <label for="password" class=" form-control-label">Password</label>
                                    <input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
                                </div>

                                <div class="form-group">
                                    <label for="password" class=" form-control-label">Email</label>
                                    <input type="email" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Mobile</label>
                                    <input type="text" name="mobile" placeholder="Enter mobile" class="form-control" required value="<?php echo $mobile?>">
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Age</label>
                                    <input type="text" name="age" min="18" max="60" placeholder="Enter Age" class="form-control" required value="<?php echo $age?>">
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Division</label>
                                    <input type="text" name="division" placeholder="Enter Division" class="form-control" required value="<?php echo $division?>">
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">District</label>
                                    <input type="text" name="district" placeholder="Enter District" class="form-control" required value="<?php echo $district?>">
                                </div>
                                <div class="form-group">
                                    <label for="categories" class=" form-control-label">Address</label>
                                    <input type="text" name="address" placeholder="Enter Address" class="form-control" required value="<?php echo $address?>">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" data-dismiss="modal"><a class="bt" href="javascript:history.go(-1)">Back</a></button>
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-success">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                    <div><?php echo $result; ?></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>