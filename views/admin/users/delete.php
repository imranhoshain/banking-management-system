<?php
include_once '../../../vendor/autoload.php';
$user = new App\admin\Users();
$images = new App\helpers\Images();
$images->image_delete($_GET['id']);
if ($user->delete_bill_user($_GET['id']) == TRUE){

	$user->delete_bill_user($_GET['id']);

	} else {

		$user->delete_user($_GET['id']);
	}
?>