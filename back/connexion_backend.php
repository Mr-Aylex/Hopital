<?php
/**
* Signing in processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/manager/manager.php');
var_dump($_POST);
$user = new user($_POST);

//$_SESSION['email'] = $data['email'];

$manager = new manager();
$manager->connexion(unserialize($signin));
 ?>
