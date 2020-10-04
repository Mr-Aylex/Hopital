<?php
/**
* Signing in processing
*/


require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
var_dump($_POST);
$user = new user($_POST);
var_dump($user);
$manager = new manager();
$manager->connexion($user);

 ?>
