<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$user = new App\admin\Users();
$users = $user->index();
?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Add Bill Info</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/billing/store.php" method="POST" >
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
				<!-- <div class="form-group">
						<div class="col col-md-12">
								<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
										<input type="number" name="share" id="input1-group1" name="input1-group1" placeholder="Share" class="form-control">
								</div>
						</div>
				</div> -->
				<div class="form-group">
					<div class="col col-md-12">
						<select name="month" id="select" class="form-control" required="1">
							<option value="">Select Month</option>							
							<option value="Janaury">Janaury</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<select name="year" id="select" class="form-control" required="1">
							<option value="">Select Year</option>
							<option value="2017">2017</option>							
							<option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>							
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
							<input type="text" name="paid" id="input1-group1" placeholder="Paid TK" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-minus-square-o"></i></div>
							<input type="text" name="due" id="input1-group1" placeholder="Due TK" class="form-control">
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