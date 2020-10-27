<?php
include "../include/header.php";
$manager = new manager();
$spes = $manager->get_spetialite();
?>
<html>
<body style="padding-top: 100px">
<form action="../back/inscription_backend.php" method="post">
    <div class="form-group row">
        <div class="col-md-6 mb-4 mb-lg-0">
            <input type="text" class="form-control" name="nom" placeholder="Votre nom" minlength="2" maxlength="30" required>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="prenom" placeholder="Votre prénom" minlength="2" maxlength="30" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input type="text" class="form-control" name="mail" placeholder="Email address" required>
        </div class="col-md-12">
            <select name="nom_spe" id="" class="form-control">
                <?php foreach ($spes as $key => $value) { ?>
                <option value="<?php echo $value->getId() ?>"><?php echo $value->getNom_spe() ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <input type="text" name="telephone" placeholder="Numero de téléphone">
        </div>
        <div>
            <input type="text" name="lieu" placeholder="Ville">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe"  maxlength="80" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 mr-auto">
            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Valider">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <p>Vous êtes déjà inscrit ? <a href="/Hopital/forms/sign_in.php">Se connecter</a></p>
        </div>
    </div>
</form>
</body>
</html>