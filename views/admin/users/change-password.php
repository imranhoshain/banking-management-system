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
					<h1>Change Your Password</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/users/update-password.php" method="POST" enctype="multipart/form-data">
			<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
				<div class="form-group">
				    <div class="col col-md-12">
    				    <label class=" form-control-label" for="nf-password">Old Password</label>
    				    <input type="password" class="form-control" name="old_pass" value="<?php echo $user['password']; ?>">
    				    <input type="hidden" name="id" value="<?php echo $user['id']?>" class="form-control">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col col-md-12">
    				    <label class=" form-control-label" for="nf-password">New Password</label>
    				    <input type="password" class="form-control" name="password">
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