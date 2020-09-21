<?php

session_start();

require 'Hopital/entity/user.php';
require 'Hopital/manager/manager.php';

$new_user = new user((
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
  'email' => $_POST['email'],
  'pass' => $_POST['pass'],
  'role' => $_POST['role']
));

$manager = new manager();
$manager->insert_user($user);

?>
