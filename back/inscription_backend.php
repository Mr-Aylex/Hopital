<?php
/**
* Signing up processing
*/
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/medecin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$new_user = new user($_POST);
$new_medecin = new medecin($_POST);
$manager = new manager();
var_dump($_POST);
if (isset($_POST['nom_spe'])) {
    $new_medecin->setId_specialite($_POST['nom_spe']);
    $manager->add_medecin($new_user,$new_medecin);
}
else {
    $manager->insert_user($new_user);
}
?>
