<?php
include "../include/header.php";
?>
<html>
<body>
<form action="../back/nouveau_dossier_patient.php" method="post" style="margin-top: 160px">
    <input type="hidden" name="id_patient" value="<?= unserialize($_SESSION['user'])->getId(); ?>">
    <div>
        <label for="">Adresse Postal</label>
        <input type="text" name="adresse_post">
    </div>
    <div>
        <label for="">Mutuelle</label>
        <input type="text" name="mutuelle">
    </div>
    <div>
        <label for="">Numéro de sécurité social</label>
        <input type="text" name="num_ss">
    </div>
    <div>
        <label for="">Option</label>
        <select name="opt" id="">
            <option value="Télé">Télé</option>
        </select>
    </div>
    <div>
        <label for="">Régime</label>
        <select name="regime" id="">
            <option value="Végan">Végan</option>
        </select>
    </div>
    <button>Valider</button>
</form>
</body>
</html>
