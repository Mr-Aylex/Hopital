<?php
/**
* Signing in processing
*/


require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$signin = new user($_POST);
$manager = new manager();
$res = $manager->connexion($signin);
var_dump($res);
if ($res) {
 session_start();
 $_SESSION['user'] = serialize($res);
 header('Location: ../index.php');
}
else {
 header('Location: ../forms/sign_in.php');
}

 ?>
