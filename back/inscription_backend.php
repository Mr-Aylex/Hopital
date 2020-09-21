<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/manager/manager.php');

$new_user = new user((
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
  'email' => $_POST['email'],
  'pass' => $_POST['pass'],
  'role' => $_POST['role']
));

$manager = new manager();
$manager->insert_user($user = null);

?>
