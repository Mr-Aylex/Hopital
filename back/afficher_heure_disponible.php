<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$a = $manager->get_unused_horaire($_GET['id_medecin'],$_GET['date']);
foreach ($a as $key => $value) {
    echo implode(',',$value);
    echo ';';
}
?>