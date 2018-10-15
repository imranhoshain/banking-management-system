<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$billings = new App\admin\Billing();
$billing = $billings->single_view($_GET['id']);
if (($_SESSION['id']) == ($billing['user_id'])){
?>
<div class="row">
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Update Billing Info</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="views/admin/billing/update.php" method="POST" >
			<div class="card border border-success" style="padding: 39px 0px 2px; margin-top: 42px">
				<div class="form-group">					
					<div class="col col-md-12">
						<input type="text" name="name" value="<?php echo $billing['name']; ?>" class="form-control">
						<input type="hidden" name="id" value="<?php echo $billing['id']; ?>" class="form-control">											
					</div>					
				</div>				
				<div class="form-group">
					<div class="col col-md-12">
						<select name="month" id="select" class="form-control" required="1">
							<?php
                                for ($i = 1; $i <= 12; $i++)
	                                {
	                                	$month_name = date('F', mktime(0, 0, 0, $i, 1, 2011)); 
	                                	if($month_name == $billing['month']){
	                                            $select = 'selected';                        
	                                        }else{
	                                            $select = '';
	                                        }                       
                                    	echo "<option $select value='$month_name'>$month_name</option>";
                                    }
                                ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<select name="year" id="select" class="form-control" required="1">
							 <?php
                                for($i=2016;$i<=date("Y");$i++)
                                {
                                    if($i== $billing['year']){
                                        $select = 'selected';                        
                                    }else{
                                        $select = '';
                                    }
                                    echo "<option $select value='$i'>$i</option>";
                                }
                            ?>							
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
							<input type="text" name="paid" value="<?php echo $billing['paid']; ?>" placeholder="Paid TK" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col col-md-12">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-minus-square-o"></i></div>
							<input type="text" name="due" value="<?php echo $billing['due']; ?>" placeholder="Due TK" class="form-control">
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
<?php } ?>
<?php include_once '../include/footer.php'; ?>