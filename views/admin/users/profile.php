<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';    
$users = new App\admin\Users();
$user = $users->login(); 
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
						<img src="uploads/<?php if (isset ($_SESSION['user_image'])){echo $_SESSION['user_image'];} else{echo $_SESSION['image']; } ?>" alt="User Avatar" class="rounded-circle mx-auto d-block" style="height: 200px;width: 200px;">
					</div>
					<div class="user-detail" style="margin-top: 30px;">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Name</td>
									<td>
										<?php if (isset ($_SESSION['user_name'])){echo $_SESSION['user_name'];} else{echo $_SESSION['name'] . ' (Supar Admin)'; } ?>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<?php if (isset ($_SESSION['user_email'])){echo $_SESSION['user_email'];} else{echo $_SESSION['email']; } ?>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>0<?php if (isset ($_SESSION['user_phone'])){echo $_SESSION['user_phone'];} else{echo $_SESSION['user_phone']; } ?>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<?php if (isset ($_SESSION['user_nid_number'])){echo $_SESSION['user_nid_number'];} else{echo $_SESSION['user_nid_number']; } ?>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<?php if (isset ($_SESSION['user_address'])){echo $_SESSION['user_address'];} else{echo $_SESSION['user_address']; } ?>
									</td>
								</tr>			
								
							</thead>
						</table>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<?php include_once '../include/footer.php'; ?>