
<html>
<?php
include "../include/header.php";
?>
<body>
<form action="../back/dossier_backend.php">
    <?php foreach ($patient as $key => $value) { ?>
        <input type="hidden" value="<?php echo $value->getId() ?>" name="id_patient">
    <?php } ?>
    <div>
        <label for="">Adresse Postal</label>
        <input type="text" name="adresse">
    </div>
    <div>
        <label for="">Mutuelle</label>
        <input type="text" name="mutuelle">
    </div>
    <div>
        <label for="">Numéros de sécurité social</label>
        <input type="text" name="num_ss">
    </div>
    <div>
        <label for="">Régime</label>
        <input type="text" name="regime">
    </div>
    <div>
        <label for="">Option Chambre</label>
        <select name="opt" id="">
            <option value="tele">Avec Télevision</option>
        </select>
    </div>
    <input type="submit" value="Valider">
</form>
</body>
</html>
