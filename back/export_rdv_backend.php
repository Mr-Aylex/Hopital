<?php
/**
* Exporting processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/Dossier.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$export_rdv = new dossier($_POST);
$manager = new manager();
$manager->export_dossier($export_rdv);

 ?>
