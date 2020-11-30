<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/Dossier.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$dossier = new Dossier($_POST);
$manager = new manager();
$manager->add_dossier($dossier);
?>