<?php
session_start();
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$user = new App\admin\Users();
$users = $user->index();
?>
<div class="animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">All Member List</strong>
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
                            		<a href="" class="text-warning"><i class="fa fa-edit"></i></a>
                            		<a href="views/admin/users/delete.php/?id=<?php echo $single_user['id']?>" id="delete" class="text-danger"><i class="fa fa-trash-o"></i></a>
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