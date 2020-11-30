<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/rdv.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
unset($_POST['motif']);
$rdv = new rdv($_POST);
$manager->rdv($rdv);
header('Location: ../index.php');


 ?>
