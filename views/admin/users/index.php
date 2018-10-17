<?php include_once '../include/header.php'; 
include_once '../../../vendor/autoload.php';
$Users = new App\admin\Users();
$billing = new App\admin\Billing();
$user = $Users->index();
$x = $billing->paid_amount();
$y = $billing->due_amount();
$paid_amount = $x[0]['SUM(paid)'];
$due_amount = $y[0]['SUM(due)'];
$total = ($paid_amount + $due_amount);

?>

<div class="col-xl-3 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Member</div>
                    <div class="stat-digit"><?php echo count($user); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Money</div>
                    <div class="stat-digit"><?php echo $total; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Paid</div>
                    <div class="stat-digit"><?php echo $paid_amount; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Due</div>
                    <div class="stat-digit"><?php echo $due_amount; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../include/footer.php'; ?>