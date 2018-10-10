<?php
include_once '../../../vendor/autoload.php';
$billings = new App\admin\Billing();
$billings = $billings->billingData();
	
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filter'])){
		$filterData = $bill->filterData($_POST);
		if(count($filterData) > 0)
		{
			$billdata = $filterData;
		}else {
			echo "Data not found";
		}
		
	}
?>