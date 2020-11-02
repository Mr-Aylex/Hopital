<!doctype html>
<html lang="en">

<?php
include "../include/header.php";
?>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container" style="padding-top: 150px">
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
                  <input type="email" class="form-control" name="mail" placeholder="Mail" required>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                  <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
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
  </div>
</div>

</div>



<?php
include "../include/footer.php";
?>

</body>

</html>
