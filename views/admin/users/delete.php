<?php
include_once '../../../vendor/autoload.php';
$admin = new App\Admin\Admin();
$admin->image_delete($_GET['id']);
$admin->delete($_GET['id']);
?>
