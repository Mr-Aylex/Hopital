<?php
/**
* Modify an user profile
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$user = new user($_POST);
var_dump($user);
$manager = new manager();
$manager->modify($user);
$res = $manager->get_modification($user);
if ($res) {
 session_start();
 $_SESSION['user'] = serialize($res);
 header('Location: ../index.php');
}
else {
 header('Location: ../forms/sign_in.php');
}

header('Location: ../index.php');
 ?>
