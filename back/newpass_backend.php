<?php
/**
* Allowing to user to sign in with new password
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/manager/manager.php');

if($_POST['pass'] != $_POST['new_pass'])
{
  header(dirname($_SERVER['DOCUMENT_ROOT']).'Hopital/forms/forgotten_pass.php');
}

$user_pass = new user(array(
  'email' => $_POST['email'],
  'pass' => $_POST['pass']
));

$manager = new manager();
$manager->new_pass($user = null);

 ?>
