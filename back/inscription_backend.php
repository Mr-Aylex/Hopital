<?php
/**
* Signing up processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$new_user = new user($_POST);

$manager = new manager();
$manager->insert_user($new_user);
header('Location: ../forms/sign_in.php');
?>
