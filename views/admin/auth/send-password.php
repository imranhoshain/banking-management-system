<?php
include_once '../../../vendor/autoload.php';
$auth = new \App\admin\auth\Auth();
$set_post = $auth->set($_POST);
$forgot_password = $auth->forgot_password();
$str = $forgot_password['password'];
$email = $forgot_password['email'];
$password = $str;
$headers = 'From: admin@mutualfriends.ml'; 
$to = $forgot_password['email'];
$subject = "Your Recovered Password";
$txt = "Please use this password to login " . $password;
if(mail($to, $subject, $txt, $headers)){
	header('location:../../../index.php');
}else{
	header('location:../../../forgot-password.php');
}

?>
