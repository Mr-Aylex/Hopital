<!doctype html>
<html lang="en">

<?php
include "../include/header.php";
?>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8 intro text-center">
        <h1 class="text-white">Inscription</h1>
        <a href="/Hopital/index.php">Home</a> <span class="mx-3 text-white">/</span> <strong class="text-white">Inscription</strong>
      </div>
    </div>
  </div>
</div>



<div class="site-section bg-light" id="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5" >
        <form action="../back/inscription_backend.php" method="post">
          <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
              <input type="text" class="form-control" name="nom" placeholder="Votre nom">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="prenom" placeholder="Votre prénom">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control" name="mail" placeholder="Email address">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
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
</div>

<div class="site-section bg-primary py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 mb-4 mb-md-0">
        <h2 class="mb-0 text-white">What are you waiting for?</h2>
        <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
      </div>
      <div class="col-lg-5 text-md-right">
        <a href="#" class="btn btn-primary btn-white">Contact us now</a>
      </div>
    </div>
  </div>
</div>



<?php
include "../include/footer.php";
?>

</body>

</html>
