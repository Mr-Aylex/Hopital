<?php
include "../include/header.php";
$manager = new manager();
$spes = $manager->get_spetialite();
?>
<html>
<body style="padding-top: 150px">
<form action="../back/inscription_backend.php" method="post" class="container">
    <div style="background-color: rgba(170, 170, 170, 0.95);width: 400px;padding: 10px;border-radius: 10px">
        <h5 style="color: #0b0b0b">Nouveau Medecin</h5>
        <div>
            <label for="">Nom</label><br>
            <input type="text" name="nom" minlength="2" maxlength="30" style="border-radius: 5px;border: #6c757d" required>
        </div>

        <div>
            <label for="">Prénom</label><br>
            <input type="text" name="prenom" minlength="2" maxlength="30" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <label for="">Adresse mail</label><br>
            <input type="email" name="mail" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <label for="">Spétialité</label><br>
            <select name="nom_spe" id="" style="border-radius: 5px;border: #6c757d" required>
                <?php foreach ($spes as $key => $value) { ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom_spe'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Numero de téléphone</label><br>
            <input type="text" name="telephone" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <label for="">Ville</label><br>
            <input type="text"  name="lieu" placeholder="" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <label for="">Mot de passe</label><br>
            <input type="password" name="mdp"  maxlength="80" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div>
            <input type="submit" class=" btn-primary" value="Valider">
        </div>
    </div>
</form>
</body>
</html>
