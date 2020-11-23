<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/rdv.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
unset($_POST['motif']);
$rdv = new rdv($_POST);
var_dump($_POST);
var_dump($rdv);
$manager->rdv($rdv);
$result = $manager->get_rdv($user);
if($result)
{
  session_start();
  $_SESSION['user'] = serialize($user);
  header('Location: ../index.php');
}
else {
  header('Location: ../rdv.php');
}


 ?>
