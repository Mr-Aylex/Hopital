<?php

include "../include/header.php";

$manager = new manager();
$a = $manager->recovery_data(unserialize($_SESSION['user'])->getId());
$a = unserialize($_SESSION['user']); ?>
<html>
<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
    <div class="container" style="padding-top: 150px">
        <form action="../back/modification_backend.php" method="post">
            <input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
            <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                    <input type="text" class="form-control" name="nom" value="<?php echo $a->getNom()?>" minlength="2" maxlength="30" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="prenom" value="<?php echo $a->getPrenom()?>" minlength="2" maxlength="30" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input type="email" class="form-control" name="mail" value="<?php echo $a->getMail()?>" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="mdp" value="<?php echo $a->getMdp()?>"required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 mr-auto">
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Valider">
                </div>
            </div>

            <div class="form-group row">
            </div>
        </form>
    </div>
</div>

</div>
</html>
