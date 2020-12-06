<!doctype html>
<html lang="fr">

<?php
include '../include/header.php';
$a=0;
if (isset($_GET['id_medecin']) and isset($_GET['id_spe'])) {
    $a = 1;
}
?>

<div class="hero" style="margin-top: 98px;background-image: url('/Hopital/images/hero_bg_1.jpg')">
    <?php
    $manager = new manager();
    $spes = $manager->get_spetialite();
    $motifs = $manager->get_motif();
    $medecins = $manager->afficher_medecin();

    ?>
<!--<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">-->
  <div class="container" style="padding-top: 150px">
      <form name="monRdv" action="../back/rdv_backend.php" method="post">
        <div class="form-group row">
            <div class="col-md-12">
                <select name="id_spe" onChange='Choix(this.form);change_medecin(this.form)' style="height: 30px;border-radius: 5px">
                    <option value="0">-- Choisissez une spetialité ---</option>
                    <?php foreach ($spes as $key => $spe) { ?>
                        <option value="<?= $spe['id'] ?>"><?= $spe['nom_spe'] ?></option>
                        <?php if ($a ==1)  {
                            if ($spe['id']==$_GET['id_spe']) { ?>
                        <option value="<?= $spe['id'] ?>" selected><?= $spe['nom_spe'] ?></option>
                    <?php } } } ?>
                </select>
            </div>
        </div>
          <select name="id_motif" style="height: 30px;border-radius: 5px">
              <option value="0">--Motif du rendez-vous motif--</option>

          </select>
          <select name="id_medecin" onchange="medecin(this.form)" style="height: 30px;border-radius: 5px">
              <option value="0">--Medecin--</option>
              <?php ?>
          </select>

       <div class="form-group row">
          <div class="col-md-12">
              <input type="hidden" value="<?= unserialize($_SESSION['user'])->getId(); ?>" name="id_patient">
              </div>
          </div>

          <div class="form-group row">
              <div>
                  <div class="form-group">
                      <label for="" class="form-check-label" style="color: #0b0b0b">Date</label>
                      <input id="date" type="date" value="" name="date_rdv" min="<?= date('Y-m-d');  ?>" onchange="afficher_heure(this.form)" disabled style="height: 30px;border-radius: 5px">
                  </div>
                  <label for="" style="color: #0b0b0b">Heure</label>
                  <select name="heure_id" id="heure" style="height: 30px;border-radius: 5px">
                      <option value="0">--Heure--</option>
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
<script>

    function medecin(form) {
        change_medecin(form);
    }
    function change_medecin(form) {
        if (form.id_medecin.value=='0') {
            form.date_rdv.setAttribute('disabled','');
        }
        else {
            form.date_rdv.removeAttribute('disabled');
        }
    }
    function afficher_heure(form) {
        while (form.heure_id.firstChild) {
            form.heure_id.removeChild(form.heure_id.firstChild);
        }
        option = document.createElement('option');
        option.text = '--Heure--';
        option.setAttribute('value','0');
        form.heure_id.appendChild(option);
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                heures = this.responseText.split(';');
                for (var key in heures) {
                    heure = heures[key];
                    heure1 = heure.split(',');
                    option = document.createElement('option');
                    option.text = heure1['1'];
                    option.setAttribute('value',heure1['0']);
                    form.heure_id.appendChild(option);
                }
                form.heure_id.lastChild.remove();
            }
        };
        xhttp.open("GET", "../back/afficher_heure_disponible.php?id_medecin="+form.id_medecin.value+"&date="+form.date_rdv.value, true);
        xhttp.send();
    }
    function Choix(form) {

        speid = form.id_spe.value;
        motifs = <?php echo json_encode($motifs) ?>;
        medecins = <?php echo json_encode($medecins) ?>;
        b=form.id_motif.childElementCount;
        while (form.id_motif.firstChild) {
            form.id_motif.removeChild(form.id_motif.firstChild);
        }
        option = document.createElement('option');
        option.text = '--Motif du rendez-vous motif--';
        option.setAttribute('value','0');
        form.id_motif.appendChild(option);
        while (form.id_medecin.firstChild) {
            form.id_medecin.removeChild(form.id_medecin.firstChild);
        }
        option = document.createElement('option');
        option.text = '--Medecin--';
        option.setAttribute('value','0');
        form.id_medecin.appendChild(option);
        for (var key in motifs) {
            var motif = motifs[key];
            if (motif['id_spe']==speid) {
                option = document.createElement('option');
                option.text = motif['nom_motif'];
                option.setAttribute('value',motif['id']);
                option.setAttribute('classe','motif');
                form.id_motif.appendChild(option);
            }
        }

        for (var cle in medecins) {
            var medecin = medecins[cle];
            if (medecin['id_spe']==speid) {
                option = document.createElement('option');
                option.text = medecin['nom'];
                option.setAttribute('value',medecin['id']);
                option.setAttribute('classe','motif');
                form.id_medecin.appendChild(option);
            }
        }
    }
</script>
