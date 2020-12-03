<!doctype html>
<html lang="en">

<?php
include "../include/header.php";
?>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8 intro text-center">
        <h1 class="text-white">Réinitialisation du mot de passe</h1>
        <a href="/Hopital/index.php">Home</a> <span class="mx-3 text-white">/</span> <strong class="text-white">Connexion</strong>
      </div>
    </div>
  </div>
</div>
<div class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5" >
        <form action="../back/newpass_backend.php" method="post">
          <div class="form-group row">
            <div class="col-md-12">
              <input type="email" class="form-control" name="mail" placeholder="Mail" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 mr-auto">
              <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Valider">
              <input type="reset" class="btn btn-block btn-secondary text-white py-3 px-5" value="Annuler" onclick="location.href='../forms/sign_in.php'"/>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>



<?php
include "../include/footer.php";
?>

</body>

</html>
