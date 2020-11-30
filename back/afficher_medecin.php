<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$a = $manager->afficher_medecin();
foreach ($a as $key => $value) {
    echo implode(',',$value);
    echo ';';
}
?>

