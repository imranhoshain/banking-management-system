<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$auth = new App\admin\auth\Auth();
$rule_users = $auth->rule_user();
$site_config = $auth->site_config();
?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Site Configaration</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['id'])){ if((($_SESSION['id']) == ($rule_users['user_id'])) == (($rule_users['rule_id']) =='1')){?> 
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/auth/config-update.php" method="POST" enctype="multipart/form-data">
			<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" name="company_name" value="<?php echo $site_config['company_name']; ?>" class="form-control">
							<input type="hidden" name="id" value="<?php echo $site_config['id']?>" class="form-control">
                            <input type="hidden" name="image" value="<?php echo $site_config['image']?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							<input type="email" value="<?php echo $site_config['company_email']; ?>" class="form-control" name="company_email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							<input type="text" value="<?php echo $site_config['company_contact']; ?>" class="form-control" name="company_contact">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="user-image text-center">
							<img class="bg-dark" src="uploads/<?php echo $site_config['image']; ?>" alt="user-image" name="image" style="height: 200px; width: 200px;">
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
<?php }else{?>

<div class="row text-center">
	<div class="col-md-6 offset-md-3">		
		<div class="card border border-success" style="padding: 39px 40px;margin-top: 20px;">
				
			<h1>Its not your work!!!</h1>			
			<h2>This Page for admin</h2>			
			
		</div>	
	</div>
</div>

<?php }}?>


<?php include_once '../include/footer.php'; ?>