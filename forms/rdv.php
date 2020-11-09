<!doctype html>
<html lang="en">

<?php
include '../include/header.php';
?>

<div class="hero" style="margin-top: 150px">
    <?php
    $manager = new manager();
    $spes = $manager->get_spetialite();
    $motifs = $manager->get_motif();
    $medecins = $manager->afficher_medecin();
    $used_horaire = $manager->get_used_horaire();
    $horaire = $manager->get_horaire();
    ?>
<!--<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">-->
  <div class="container" style="padding-top: 150px">
      <form name="monRdv" action="../back/rdv_backend.php" method="post">
        <div class="form-group row">
            <div class="col-md-12">
                <select name="id_spe" onChange='Choix(this.form);change_medecin(this.form)'>
                    <option value="0">-- Choisissez une spetialité ---</option>
                    <?php foreach ($spes as $key => $spe) { ?>
                        <option value="<?php echo $spe['id'] ?>"><?php echo $spe['nom_spe'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
          <select name="id_motif" >
              <option value="">--Motif du rendez-vous motif--</option>
          </select>
          <select name="id_medecin" onchange="change_medecin(this.form)">
              <option value="0">--Medecin--</option>
          </select>

       <div class="form-group row">
          <div class="col-md-12">
              <input type="hidden" value="<?= unserialize($_SESSION['user'])->getId(); ?>" name="id_patient">
              </div>
          </div>

          <div class="form-group row">
              <div>
                  <div class="form-group">
                      <label for="" class="form-check-label">Date</label>

                      <input id="date" type="date" value="" name="date_rdv" min="<?= date('Y-m-d');  ?>" onChange='Heure(this.form)' disabled>
                  </div>
                  <label for="">Heure</label>
                  <select name="heure_id" id="">
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
<script>
    function change_medecin(form) {
        if (form.id_medecin.value=='0') {
            form.date_rdv.setAttribute('disabled','');
        }
        else {
            form.date_rdv.removeAttribute('disabled');
        }
    }
    function Heure(form) {
        heures = <?php echo json_encode($horaire) ?>;
        used_heures = <?php echo json_encode($used_horaire) ?>;
        while (form.heure_id.firstChild) {
            form.heure_id.removeChild(form.heure_id.firstChild);
        }
        var i = 0;
        if (used_heures.length===0) {
            for (var key in heures) {
                heure = heures[key];
                option = document.createElement('option');
                option.text = heure['nom_heure'];
                option.setAttribute('value',heure['id']);
                option.setAttribute('classe','motif');
                form.heure_id.appendChild(option);
            }
        }
        else {
            // pour chaque heure
                // Comparer au heure utilisé
                // Si utliilisé, retirer l'heure
                // Sinon, la garder
            //afficher l'heure
            for (var key in used_heures) {
                var used_heure = used_heures[key];
                for (var key2 in heures) {
                    var heure = heures[key2];
                    console.log(used_heure['heure_id']);
                    console.log(heure['id']);
                    var est_trouve = false;
                    if (used_heure['date_rdv'] == form.date.value) {
                        if (used_heure['heure_id']!=heure['id']) {
                            option = document.createElement('option');
                            option.text = heure['nom_heure'];
                            option.setAttribute('value', heure['id']);
                            option.setAttribute('classe', 'motif');
                            form.heure_id.appendChild(option);
                        }
                        else {
                            console.log(used_heure['heure_id']);
                            console.log(heure['id']);
                            est_trouve = true;

                        }

                    }
                    else {
                        option = document.createElement('option');
                        option.text = heure['nom_heure'];
                        option.setAttribute('value', heure['id']);
                        option.setAttribute('classe', 'motif');
                        form.heure_id.appendChild(option);
                    }
                    console.log(est_trouve);

                    if(est_trouve){
                        break;
                    }
                }
            }
        }
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
                // form.motif.options[i+1].text=motif['nom_motif'];
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
                // form.motif.options[i+1].text=motif['nom_motif'];
            }
        }
    }
</script>
