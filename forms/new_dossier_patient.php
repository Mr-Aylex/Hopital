<?php
include "../include/header.php";
$manager = new Manager();
$tab1 = $manager->afficher_dossier(unserialize($_SESSION['user'])->getId());
$tab = $tab1[0];
?>
<html>
<body style="background-image: url('/Hopital/images/hero_bg_1.jpg');background-repeat: no-repeat"">
<form action="../back/nouveau_dossier_patient.php" method="post" style="margin-top: 160px" class="container">
    <input type="hidden" name="id_patient" value="<?= unserialize($_SESSION['user'])->getId(); ?>">
    <div style="background-color: rgba(170, 170, 170, 0.95);width: 350px;padding: 10px;border-radius: 10px">
        <div>
            <label for="">Adresse Postal</label>
            <input type="text" name="adresse_post" style="border-radius: 5px;border: #6c757d" value="<?php if (isset($tab)) {
                echo $tab['adresse_post'];
            } ?>">
        </div>
        <div style="margin-top: 10px">
            <label for="">Mutuelle</label>
            <input type="text" name="mutuelle" style="border-radius: 5px;border: #6c757d" value="<?php if (isset($tab)) {
                echo $tab['mutuelle'];
            } ?>">
        </div>
        <div style="margin-top: 10px">
            <label for="">Numéro de sécurité social</label>
            <input type="text" name="num_ss" style="border-radius: 5px;border: #6c757d" value="<?php if (isset($tab)) {
                echo $tab['num_ss'];
            } ?>">
        </div>
        <div style="margin-top: 10px">
            <label for="">Option</label>
            <select name="opt" id="" style="height: 30px;border-radius: 5px;border: #6c757d">
                <?php if (isset($tab)) { ?>
                    <option value="<?= $tab['opt'] ?>"><?= $tab['opt'] ?></option>
                <?php } ?>
                <option value="Télé">Télé</option>
            </select>
        </div>
        <div style="margin-top: 10px">
            <label for="">Régime</label>
            <select name="regime" id="" style="height: 30px;border-radius: 5px;border: #6c757d">
                <?php if (isset($tab)) { ?>
                    <option value="<?= $tab['regime'] ?>"><?= $tab['regime'] ?></option>
                <?php } ?>
                <option value="Végan">Végan</option>
            </select>
        </div>
        <button class="btn btn-info">Valider</button>
    </div>
</form>
</body>
</html>
<?php
include "../include/footer.php";
?>
