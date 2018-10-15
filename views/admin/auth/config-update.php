<?php
include_once '../../../vendor/autoload.php';
$auth = new App\admin\auth\Auth();
$images = new App\helpers\Images();
if(!empty($_FILES['image']['name'])){
    $images->config_image_delete($_POST['id']);
    $images->upload();
}
$auth->set($_POST)->site_config_update();

