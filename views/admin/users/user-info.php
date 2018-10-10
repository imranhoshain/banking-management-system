<?php
if ( !isset($_SESSION)){
session_start();
}
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$users = new App\admin\Users();
$user = $users->view($_GET['id']);
$billings = new App\admin\Billing();
$billing = $billings->view($_GET['id']);
$user_total = $billings->user_total_paid($_GET['id']);
$user_due = $billings->user_total_due($_GET['id']);
?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>User Information</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card</strong>
				</div>
				<div class="card-body">
					<div class="mx-auto d-block">
						<img src="uploads/<?php echo $user['image']; ?>" alt="User Avatar" class="rounded-circle mx-auto d-block" style="height: 200px;width: 200px;">
					</div>
					<div class="user-detail" style="margin-top: 30px;">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Name</td>
									<td>
										<?php echo $user['name']; ?>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<?php echo $user['email']; ?>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>
										0<?php echo $user['phone']; ?>
									</td>
								</tr>
								<tr>
									<td>NID Number</td>
									<td>
										<?php echo $user['nid_number']; ?>
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>
										<?php echo $user['address']; ?>
									</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<i class="fa fa-user"></i><strong class="card-title pl-2">Billing Card</strong>
					</div>
					<div class="card-body">
						<div class="user-detail" style="margin-top: 30px;">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										
										<th>Month</th>
										<th>Year</th>
										<th>Paid</th>
										<th>Due</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($billing as $single_bill) {  ?>
									<tr>
										<td><?php echo $single_bill['month']?></td>
										<td><?php echo $single_bill['year']?></td>
										<td><?php echo $single_bill['paid']?></td>
										<td><?php echo $single_bill['due']?></td>
										<td>
											<?php if ($single_bill['due'] == TRUE){
											echo "Due";
											}else{
											echo "Paid";
											}?>
										</td>
									</tr>
									<?php } ?>
									
								</tbody>
								<tr>
									<td><h3>Total</h3></td>
									<td></td>
									<td><?php foreach ($user_total as $user_single_bill) { echo $user_single_bill['SUM(paid)'];}?></td>
									<td><?php foreach ($user_due as $user_single_user_due) { echo $user_single_user_due['SUM(due)'];}?></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
	<?php include_once '../include/footer.php'; ?>