<?php
if(!isset($_SESSION)){
session_start();
}
include_once '../../../vendor/autoload.php';
$auth = new \App\admin\auth\Auth();
$users = new \App\admin\Users();
$site_config = $auth->site_config();
$forgot_password = $auth->forgot_password();

?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Banking | Forgot Password</title>
		<base href="http://mutualfriends.ml/">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="models/admin/css/bootstrap.min.css">
		<link rel="stylesheet" href="models/admin/css/font-awesome.min.css">
		<link rel="stylesheet" href="models/admin/css/style.css">
		<link rel="stylesheet" href="models/admin/css/responsive.css">
		
	</head>
	<body>
		<div class="viewport-area" style="background: url('uploads/bg.jpg') no-repeat center center / cover;;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="launch-logo">
							<!-- <a href="#"><i class="fa fa-rocket"></i>Launch</a> -->
							<img class="main-logo" src="uploads/<?php echo $site_config['image']?>" alt="Mutual Friends" />
							<img class="mobile-logo" src="uploads/<?php echo $site_config['image']?>" alt="Mutual Friends" />
						</div>
						<div class="launch-login">
							<ul>
								<li><a href="views/admin/auth/index.php" class="btn signup-btn">Home</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="viewport-content">
							<div class="modal-content forgot-password">
								<div class="modal-header">
									<h5 class="modal-title">Forgot Password</h5>
								</div>
								<div class="modal-body">
									<form action="views/admin/auth/send-password.php" method="POST">
										<div class="form-group">
											<label for="">Enter Email</label>
											<input type="text" name="email" required="1" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Email">
											<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
										</div>
										<button type="submit" name="submit" class="btn signin-btn">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Login Modal -->
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="models/admin/js/vendor/jquery-2.1.4.min.js"></script>
		<script src="models/admin/js/popper.min.js"></script>
		<script src="models/admin/js/popper.js"></script>
		<script src="models/admin/js/bootstrap.min.js"></script>
		<script src="models/admin/js/main.js"></script>
	</body>
</html>