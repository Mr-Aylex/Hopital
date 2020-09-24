<?php
/**
* Signing in processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/manager/manager.php');

$user = new user(array(
  'email' => $_POST['email'],
  'pass' => $_POST['pass']
));

//$_SESSION['email'] = $data['email'];

$manager = new manager();
$manager->connexion($signin = null);
 ?>
