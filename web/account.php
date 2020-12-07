<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/spe.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/medecin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
?>

    <!doctype html>
    <html lang="fr">
    <body style="background-image: url('/Hopital/images/hero_bg_1.jpg');background-repeat: no-repeat">
    <div class="container">
        <h7>Informations personnelles</h7>
    </div>
    <table class="table table-bordered container" style="margin-top: 100px;background-color: rgba(170, 170, 170, 0.95)">

        <thread>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th></th>
            </tr>
        </thread>
        <?php
        $manager = new manager();
        $a = $manager->recovery_data(unserialize($_SESSION['user'])->getId());
        $a = unserialize($_SESSION['user']); ?>
        <tbody>
        <td> <?php echo $a->getNom(); ?> </td>
        <td> <?php echo $a->getPrenom(); ?> </td>
        <td> <?php echo $a->getMail(); ?> </td>
        <td>
            <form action="../forms/update.php" method="post">
                <input type="hidden" value="<?php echo $a->getId() ?>" name="id">
                <input type="submit" value="Modifier">
            </form>
        </td>
        </tbody>
    </table>
    <div class="container">
        <a href="../forms/new_dossier_patient.php" class="btn btn-primary">Dossier Patient</a>
    </div>
    <table class="table table-bordered container" style="margin-top: 30px;background-color: rgba(170, 170, 170, 0.95)">
        <thead>
        <tr>
            <th>Médecin</th>
            <th>Motif</th>
            <th>Spécialité</th>
            <th>Horaire</th>
            <th>Date du RDV</th>
        </tr>
        </thead>
        <?php
        $manager = new manager();
        if(unserialize($_SESSION['user'])->getRole_user() == 'medecin') {
            $b = $manager->get_rdv_medecin(unserialize($_SESSION['user'])->getId());
        }
        $b = $manager->get_rdv(unserialize($_SESSION['user'])->getId());
        ?>
        <tbody>
        <?php foreach($b as $key=>$value) {?>
            <tr>
                <td> <?php echo 'Dr '.$value['nom'];?> </td>
                <td> <?php echo $value['nom_motif']; ?> </td>
                <td> <?php echo $value['nom_spe']; ?> </td>
                <td> <?php echo $value['nom_heure']; ?> </td>
                <td> <?php echo $value['date_rdv']; ?> </td>
            </tr>
        <?php }; ?>
        </tbody>
    </table>
    <?php
    $manager = new manager();
    if(unserialize($_SESSION['user'])->getRole_user() == 'medecin') {
    $b = $manager->get_rdv_medecin(unserialize($_SESSION['user'])->getId());

    ?>
    <table class="table table-bordered container" style="margin-top: 30px;background-color: rgba(170, 170, 170, 0.95)">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Horaire</th>
            <th>Motif</th>
            <th>Date du RDV</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach($a as $key=>$value) {?>
            <tr>
                <td> <?php echo 'Dr '.$value['nom'];?> </td>
                <td> <?php echo $value['prenom']; ?> </td>
                <td> <?php echo $value['nom_heure']; ?> </td>
                <td> <?php echo $value['nom_motif']; ?> </td>
                <td> <?php echo $value['date_rdv']; ?> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
        <?php } ?>
    </body>

    </html>
<?php
include "../include/footer.php";
?>