<?php
include_once '../../../vendor/autoload.php';
$Billings = new App\admin\Billing();
$Billings->set($_POST)->update();

