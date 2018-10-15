<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$users = new App\admin\Users();
$user = $users->view($_GET['id']);

?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Update User Information</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/users/update.php" method="POST" enctype="multipart/form-data">
			<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control">
							<input type="hidden" name="id" value="<?php echo $user['id']?>" class="form-control">
                            <input type="hidden" name="image" value="<?php echo $user['image']?>">

						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							<input type="email" value="<?php echo $user['email']; ?>" class="form-control" name="email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							<input type="text" value="0<?php echo $user['phone']; ?>" class="form-control" name="phone">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
							<input type="text" value="<?php echo $user['nid_number']; ?>" class="form-control" name="nid_number">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-flag-o"></i></div>
							<input type="text" value="<?php echo $user['address']; ?>" class="form-control" name="address">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="user-image text-center">
							<img src="uploads/<?php echo $user['image']; ?>" alt="user-image" style="height: 200px; width: 200px;">
						</div>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
							<input type="file" class="form-control" name="image">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-success btn-sm" type="submit" name="submit">
					<i class="fa fa-dot-circle-o"></i> Submit
					</button>
					<button class="btn btn-danger btn-sm" type="reset">
					<i class="fa fa-ban"></i> Reset
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once '../include/footer.php'; ?>