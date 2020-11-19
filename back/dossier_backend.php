<?php
/**
* Send patient's folder
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/Dossier.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$folder = new dossier();
$manager = new manager();
$manager->add_dossier($folder);
?>
