<?php
include_once '../../../vendor/autoload.php';
$users = new App\admin\Users();
$images = new App\helpers\Images();
if(!empty($_FILES['image']['name'])){
    $images->image_delete($_POST['id']);
    $images->upload();
}
$users->set($_POST)->update();

