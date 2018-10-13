<?php
include_once '../../../vendor/autoload.php';
$user_rule = new App\admin\auth\Auth();
$user_rule->set($_POST)->user_rule_store();



