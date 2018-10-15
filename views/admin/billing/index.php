<?php
include_once '../include/header.php';
include_once '../../../vendor/autoload.php';
$auth = new App\admin\auth\Auth();
$billing = new App\admin\Billing();
$billings = $billing->index();
$rule_users = $auth->rule_user();                                    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filter'])){
        $filterData = $billing->filterData($_POST);
        if(count($filterData) > 0)
        {
            $billings = $filterData;
        }else {
            echo "<script>
                    alert('Data not found');
                </script>";
        }       
    }    
?>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Member List</strong>
                </div>
                <div class="date-filter" style="margin-top:42px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="col-md-2 offset-md-3">
                                <select name="month" id="select" class="form-control">
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
                            <div class="col-md-2">
                                <select name="year" id="select" class="form-control">
                                    <option value="">Select Year</option>
                                    <option value="2017"><?php echo "2017"; ?></option>
                                    <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-sm" style="padding:7px 20px;" type="submit" name="filter">
                                <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                                $sl = 1;
                                foreach ($billings as $single_bill){                                    
                            ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo $single_bill['name']?></td>
                                <td><?php echo $single_bill['month']?></td>
                                <td><?php echo $single_bill['year']?></td>
                                <td class="paid"><?php echo $single_bill['paid']?></td>

                                <td class="due"><?php echo $single_bill['due']?></td>
                                <td>
                                    <?php if ($single_bill['due'] == TRUE){
                                    echo "Due";
                                    }else{
                                    echo "Paid";
                                    }?>
                                </td>
                                <td class="text-center">
                                    <a href="views/admin/users/user-info.php/?id=<?php echo $single_bill['user_id']?>" class="text-success"><i class="fa fa-eye"></i></a> 

                                     <?php if(isset($_SESSION['id'])){ if((($_SESSION['id']) == ($rule_users['user_id'])) == (($rule_users['rule_id']) =='1')){?>        
                                    <a href="views/admin/billing/edit-bill.php/?id=<?php echo $single_bill['id'];?>" class="text-warning"><i class="fa fa-edit"></i></a> <?php } else{
                                            echo "";
                                        }}
                                    ?> 
                                    <?php if(isset($_SESSION['id'])){ if((($_SESSION['id']) == ($rule_users['user_id'])) == (($rule_users['rule_id']) =='1')){?>  
                                    <a href="views/admin/billing/delete.php/?id=<?php echo $single_bill['id'];?>" id="delete" class="text-danger"><i class="fa fa-trash-o"></i></a><?php }
                                    else{
                                            echo "";
                                        }}
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                         <tr>
                            <th style="text-align:center">Total</th>                                
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><span id="sum"></span></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../include/footer.php'; ?>