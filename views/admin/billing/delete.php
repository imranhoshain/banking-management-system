<?php
include_once '../../../vendor/autoload.php';
$bullings = new App\admin\Billing();
$bullings->delete_bill($_GET['id'])

?>