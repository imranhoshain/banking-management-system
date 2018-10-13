<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$auth = new App\admin\auth\Auth();
$user = new App\admin\Users();
$rules= $auth->rule();
$users = $user->index();
?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Admin Access</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['supar_id'])){ ?>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/auth/user-rule-store.php" method="POST" >
			<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
				<div class="form-group">
					<div class="col col-md-12">
						<select name="user_id" id="select" class="form-control" required="1">
							<option value="">Select Member</option>							
							<?php foreach ($users as $single_user){ ?>
							<option value="<?php echo $single_user['id']?>"><?php echo $single_user['name']?></option>
							<?php } ?>
						</select>						
					</div>
				</div>			
				<div class="form-group">
					<div class="col col-md-12">
						<select name="rule_id" id="select" class="form-control" required="1">
							<option value="">Select Member</option>							
							<?php foreach ($rules as $rules){ ?>
							<option value="<?php echo $rules['id']?>"><?php echo $rules['name']?></option>
							<?php } ?>
						</select>						
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
			<h2>This Page for super admin</h2>			
			
		</div>	
	</div>
</div>

<?php }?>
<?php include_once '../include/footer.php'; ?>