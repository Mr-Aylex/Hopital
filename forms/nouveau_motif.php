<?php
include "../include/header.php";
$manager = new Manager;
$tab = $manager->get_spetialite();

?>
<html>
<body style="padding-top: 150px">
<form action="../back/add_motif.php" method="post" class="container">
    <div style="background-color: rgba(170, 170, 170, 0.95);width: 350px;padding: 10px;border-radius: 10px">
        <h5 style="color: #0b0b0b">Nouveau Motif</h5>
        <div>
            <label for="">Spétialité</label>
            <select name="id_spe" id="" style="height: 30px;border-radius: 5px;border: #6c757d">
                <?php foreach($tab as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['nom_spe'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="">
            <label for="">Nom du motif</label>
            <input type="text" name="nom_motif" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <input type="submit" class="btn-info" value="Valider">
        </div>
    </div>


</form>
</body>
</html>