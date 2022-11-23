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
		$update_status_sql="update blood_bank set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from blood_bank where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from blood_bank";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Blood Bank</h4>
                        <a class="btn41-43 btn-41" href="manage_blood_bank.php">Add Blood Bank</a>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Blood Bank Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>A-</th>
                                        <th>A+</th>
                                        <th>B-</th>
                                        <th>B+</th>
                                        <th>O-</th>
                                        <th>O+</th>
                                        <th>AB-</th>
                                        <th>AB+</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['mobile']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['am']?></td>
                                        <td><?php echo $row['ap']?></td>
                                        <td><?php echo $row['bm']?></td>
                                        <td><?php echo $row['bp']?></td>
                                        <td><?php echo $row['om']?></td>
                                        <td><?php echo $row['op']?></td>
                                        <td><?php echo $row['abm']?></td>
                                        <td><?php echo $row['abp']?></td>
                                        <td>
                                            <?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_blood_bank.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
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