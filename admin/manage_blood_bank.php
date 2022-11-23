<?php
require('top.inc.php');
isAdmin();
$id='';
$name='';
$address='';
$mobile='';
$email='';
$amx='';
$apx='';
$bmx='';
$bpx='';
$omx='';
$opx='';
$abmx='';
$abpx='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from blood_bank where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        $id=$row['id'];
		$name=$row['name'];
        $address=$row['address'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        $amx=$row['am'];
        $apx=$row['ap'];
        $bmx=$row['bm'];
        $bpx=$row['bp'];
        $omx=$row['om'];
        $opx=$row['op'];
        $abmx=$row['abm'];
        $abpx=$row['abp'];
	}else{
		header('location:blood_bank.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['name']);
    $address=get_safe_value($con,$_POST['address']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $email=get_safe_value($con,$_POST['email']);
    $amx=get_safe_value($con,$_POST['am']);
    $apx=get_safe_value($con,$_POST['ap']);
    $bmx=get_safe_value($con,$_POST['bm']);
    $bpx=get_safe_value($con,$_POST['bp']);
    $omx=get_safe_value($con,$_POST['om']);
    $opx=get_safe_value($con,$_POST['op']);
    $abmx=get_safe_value($con,$_POST['abm']);
    $abpx=get_safe_value($con,$_POST['abp']);
	$res=mysqli_query($con,"select * from blood_bank where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="BLOOD BANK ALREADY EXIST";
			}
		}else{
			$msg="BLOOD BANK ALREADY EXIST";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
            $update_sql="update blood_bank set name='$name', address='$address', mobile='$mobile', email='$email', am='$amx', ap='$apx', bm='$bmx', bp='$bpx', om='$omx', op='$opx', abm='$abmx', abp='$abpx' where id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into blood_bank(id, name, address, mobile, email, am, ap, bm, bp, om, op, abm, abp, status) values('$id','$name','$address','$mobile','$email','$amx','$apx','$bmx','$bpx','$omx','$opx','$abmx','$abpx', 1)");
		}
		header('location:blood_bank.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Blood Bank Form</strong> </div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">ID</label>
                                <input type="text" name="id" placeholder="Enter ID" class="form-control" required value="<?php echo $id?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" class="form-control" required value="<?php echo $name?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Address</label>
                                <input type="text" name="address" placeholder="Enter Address" class="form-control" required value="<?php echo $address?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Mobile</label>
                                <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control" required value="<?php echo $mobile?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Email</label>
                                <input type="text" name="email" placeholder="Enter Email" class="form-control" required value="<?php echo $email?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">A-</label>
                                <input type="text" name="am" placeholder="Enter A- Quantity" class="form-control" required value="<?php echo $amx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">A+</label>
                                <input type="text" name="ap" placeholder="Enter A+ Quantity" class="form-control" required value="<?php echo $apx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">B-</label>
                                <input type="text" name="bm" placeholder="Enter A- Quantity" class="form-control" required value="<?php echo $bmx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">B+</label>
                                <input type="text" name="bp" placeholder="Enter A+ Quantity" class="form-control" required value="<?php echo $bpx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">O-</label>
                                <input type="text" name="om" placeholder="Enter A- Quantity" class="form-control" required value="<?php echo $omx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">O+</label>
                                <input type="text" name="op" placeholder="Enter A+ Quantity" class="form-control" required value="<?php echo $opx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">AB-</label>
                                <input type="text" name="abm" placeholder="Enter A- Quantity" class="form-control" required value="<?php echo $abmx?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">AB+</label>
                                <input type="text" name="abp" placeholder="Enter A+ Quantity" class="form-control" required value="<?php echo $abpx?>">
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