<?php
require('top.inc.php');
isAdmin();
$name='';
$password='';
$email='';
$mobile='';
$age='';
$division='';
$district='';
$address='';
$gender='';
$blood='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
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
        $gender=$row['gender'];
        $blood=$row['blood'];
	}else{
		header('location:user_management.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $password=get_safe_value($con,$_POST['password']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $age=get_safe_value($con,$_POST['age']);
    $division=get_safe_value($con,$_POST['division']);
    $district=get_safe_value($con,$_POST['district']);
    $address=get_safe_value($con,$_POST['address']);
    $gender=get_safe_value($con,$_POST['gender']);
    $blood=get_safe_value($con,$_POST['blood']);
	$res=mysqli_query($con,"select * from users where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['email']){
			
			}else{
				$msg="Email already exist!";
			}
		}else{
			$msg="Email already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update users set name='$name', password='$password', mobile='$mobile', email='$email', age='$age', division='$division', district='$district', address='$address', gender='$gender', blood='$blood' where email='$email'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into users(name, password, email, mobile, age, division, district, address, gender, blood, code, status, admin_control) values('$name','$password'','$email','$mobile','$age','$division','$district','$address','$gender','$blood', 0, verified, 0)");
		}
		header('location:user_management.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>New User Form</strong><small> </small></div>
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
                                <label for="categories" class=" form-control-label">Gender</label>
                                <select name="gender" class="form-control" value="<?php echo $gender?>" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Blood Group</label>
                                <select type="text" name="blood" placeholder="Enter Blood" class="form-control" value="<?php echo $blood?>" required>
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
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>