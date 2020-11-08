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
if (isset($_POST['nom_spe'])) {
    $new_user->setRole_user('medecin');
    $new_medecin->setId_specialite($_POST['nom_spe']);
    $manager->add_medecin($new_user,$new_medecin);
    header('Location: ../web/admin.php');
}
else {
    $new_user->setRole_user('utilisateur');
    $verif = $manager->insert_user($new_user);
    var_dump($verif);
    if ($verif==1) {
        echo $verif;
        header('Location: ../forms/sign_in.php');
    }
    elseif($verif==0) {
        echo $verif;
        header('Location: ../forms/sign_up.php');
    }
}
?>
