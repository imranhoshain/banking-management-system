<?php
include_once '../../../vendor/autoload.php';
$billings = new App\admin\Billing();
$billings->set($_POST)->store();


