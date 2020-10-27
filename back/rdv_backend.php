<?php
/**
*
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/rdv.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$appointment = new appointment($_POST);
$manager = new manager();
var_dump($_POST);
$manager->rdv($appointment);
header('Location: ../index.php');

 ?>
