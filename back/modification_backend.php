<?php
/**
* Modify an user profile
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$user = new user($_POST);

$manager = new manager();
$manager->modify($user);
 ?>
