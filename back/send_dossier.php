<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$rdv = new rdv($_POST);

function add_rdv($rdv) {
    $manager = new manager();
    $request = $manager->connexion_bdd()->prepare('INSERT INTO dossier_patients
 (id_patient, adresse_post, mutuelle, num_ss, opt, regime)
 VALUE (:id_patient, :adresse_post, :mutuelle, :num_ss, :opt, :regime)');
    $request->execute($manager->getmethod($rdv));
}
?>