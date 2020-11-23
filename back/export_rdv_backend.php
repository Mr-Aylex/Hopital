<?php
/**
* Exporting processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/rdv.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$export_rdv = new rdv($_POST);
$manager = new manager();
$manager->export_rdv($export_rdv);

 ?>
