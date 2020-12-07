<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new Manager;
$manager->add_motif($_POST);
header('Location: ../index.php');
?>