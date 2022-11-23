<script>
     function confirmAction() {
         let confirmAction = confirm("Are you sure?");
         if (confirmAction) {
             alert("Action successfully executed");
         } else {
             alert("Action canceled");
         }
     }
 </script>
<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update users set admin_control='$status' where email='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from users where email='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from users";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">User Management</h4>
                        <a class="btn41-43 btn-41" href="manage_user_management.php">Add User</a>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="20%">Name</th>
                                        <th width="10%">Mobile</th>
                                        <th width="20%">Email</th>
                                        <th width="5%">Age</th>
                                        <th width="20%">Division</th>
                                        <th width="20%">District</th>
                                        <th width="20%">Address</th>
                                        <th width="5%">Gender</th>
                                        <th width="5%">Blood</th>
                                        <th width="26%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['mobile']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['age']?></td>
                                        <td><?php echo $row['division']?></td>
                                        <td><?php echo $row['district']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['blood']?></td>
                                        <td>
                                            <?php
								if($row['admin_control']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['email']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['email']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_user_management.php?id=".$row['email']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['email']."'>Delete</a></span>";
								?>
                                        </td>
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
</div>