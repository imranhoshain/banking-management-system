<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$auth = new App\admin\auth\Auth();
$user = new App\admin\Users();
$users = $user->index();
$rule_users = $auth->rule_user();
?>
<div class="animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">All Member List</strong>
					<?php
                       if(isset($_SESSION['delete_user'])){
                            echo '<div class="alert alert-success">dsfdsfdsfds'
                                    .$_SESSION['delete_user'].
                                '</div>';
                           // unset($_SESSION['delete_user']);
                        }
                     ?> 
				</div>
				<div class="card-body">
					<table id="bootstrap-data-table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>NID Number</th>
								<th>Address</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
	                            $sl = 1;
	                            foreach ($users as $single_user){
                        	?>
							<tr>
								<td><?php echo $sl++ ?></td>
								<td><?php echo $single_user['name']?></td>
								<td><?php echo $single_user['email']?></td>
								<td>0<?php echo $single_user['phone']?></td>
								<td><?php echo $single_user['nid_number']?></td>
								<td><?php echo $single_user['address']?></td>
								<td class="text-center"><img src="uploads/<?php echo $single_user['image']?>" alt="" style="height: 80px; width: 30%;"></td>
								<td class="text-center">									
                            		<a href="views/admin/users/user-info.php/?id=<?php echo $single_user['id']?>" class="text-success"><i class="fa fa-eye"></i></a> 

                            		<?php if(isset($_SESSION['id'])){ if((($_SESSION['id']) == ($rule_users['user_id'])) == (($rule_users['rule_id']) =='1')){?>        
                                    <a href="views/admin/users/edit-form.php/?id=<?php echo $single_user['id'];?>" class="text-warning"><i class="fa fa-edit"></i></a> <?php } else if(($_SESSION['id']) == ($single_user['id'])){?>
                                    	<a href="views/admin/users/edit-form.php/?id=<?php echo $single_user['id'];?>" class="text-warning"><i class="fa fa-edit"></i></a><?php }
                                    else{
                                            echo "";
                                        }}
                                    ?>
                                    <?php if(isset($_SESSION['id'])){ if((($_SESSION['id']) == ($rule_users['user_id'])) == (($rule_users['rule_id']) =='1')){?>  
                                    <a href="views/admin/users/delete.php/?id=<?php echo $single_user['id'];?>" id="delete" class="text-danger"><i class="fa fa-trash-o"></i></a><?php }
                                    else{
                                            echo "";
                                        }}
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
<?php include_once '../include/footer.php'; ?>