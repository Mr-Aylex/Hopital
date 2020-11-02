<!doctype html>
<html lang="en">

<?php
include "../include/header.php";
?>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container" style="padding-top: 150px">
      <form action="../back/connexion_backend.php" method="post">
          <div class="form-group row">
              <div class="col-md-12">
                  <input type="email" class="form-control" name="mail" placeholder="Email address" required>
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
                  <a href="/Hopital/forms/forgotten_pass.php">Mot de passe oublié ?</a>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                  <p>Pas encore inscrit ? <a href="/Hopital/forms/sign_up.php">S'inscrire</a></p>
              </div>
          </div>
      </form>
    </div>
  </div>
    </div>
</div>


<div class="site-section bg-primary py-5">
  <div class="container">
    <div class="row align-items-center">


    </div>
  </div>
</div>



<?php
include "../include/footer.php";
?>

</body>

</html>
