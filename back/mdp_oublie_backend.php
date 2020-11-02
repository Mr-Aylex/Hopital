<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$manager = new manager();
$user = new user($_POST);
$user->setMail($_POST['mail']);
$user->setMdp($_POST['mdp']);
$manager->new_mdp($user);

header('Location: ../forms/sign_up.php');
?>