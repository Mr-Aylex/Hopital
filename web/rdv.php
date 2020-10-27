<!doctype html>
<html lang="en">

<?php
include '../include/header.php';
?>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container" style="padding-top: 150px">
      <form action="" method="post">
          <div class="form-group row">
              <div class="col-md-12">
                  <input type="text" class="form-control" name="specialite" placeholder="Spécialité" required>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                  <input type="text" class="form-control" name="lieu" placeholder="Où ?" required>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                  <input type="datetime" class="form-control" name="date_rdv" placeholder="Date du rendez-vous" required>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <label for="heure_rdv">Choose a time for your meeting:</label>
                  <input type="time" class="form-control" name="heure_rdv" min="8:00" max="19:00" required>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <label for="specialites-select"></label>
                <select name="specialites" id="specialites-select">
                  <option value="">Choisir une spécialité</option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                </select>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Valider">
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</html>
