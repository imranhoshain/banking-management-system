<?php
include_once '../../../vendor/autoload.php';
$users = new App\admin\Users();
if(!empty($_POST)){
    $users->set($_POST)->change_password();
}


