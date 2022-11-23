<?php
require('top.inc.php');
isAdmin();
$id='';
$title='';
$text='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from announcement where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id=$row['id'];
		$title=$row['head'];
		$text=$row['body'];
	}else{
		header('location:announcement.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id=get_safe_value($con,$_POST['id']);
	$title=get_safe_value($con,$_POST['head']);
	$text=get_safe_value($con,$_POST['body']);
	
	$res=mysqli_query($con,"select * from announcement where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="ANNOUNCEMENT ALREADY EXIST";
			}
		}else{
			$msg="ANNOUNCEMENT ALREADY EXIST";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update announcement set head='$title', body='$text' where id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into announcement(id,head,body,status) values('$id','$title','$text', 1)");
		}
		header('location:announcement.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Announcement Form</strong><small> </small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">ID</label>
                                <input type="text" name="id" placeholder="Enter ID" class="form-control" required value="<?php echo $id?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Title</label>
                                <input type="text" name="head" placeholder="Enter Title" class="form-control" required value="<?php echo $title?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Text</label>
                                <textarea type="text" name="body" placeholder="Enter Text" class="form-control" required value="<?php echo $text?>"></textarea>
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