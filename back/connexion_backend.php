<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/manager/manager.php');

$user = new user((
  'email' => $_POST['email'],
  'pass' => $_POST['pass']
));

$manager = new manager();
$manager->connexion($signin);
 ?>
