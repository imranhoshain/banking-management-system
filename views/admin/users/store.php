<?php
include_once '../../../vendor/autoload.php';
$users = new App\admin\Users();
$images = new App\helpers\Images();
$_POST['image'] = $images->upload();
$users->set($_POST)->store();

