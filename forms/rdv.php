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
    ?>
<!--<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">-->
  <div class="container" style="padding-top: 150px">
      <form name="monRdv" action="../back/rdv_backend.php" method="post">
        <div class="form-group row">
            <div class="col-md-12">
                <select NAME="Rubrique" onChange='Choix(this.form)'>
                    <option>-- Choisissez une spetialité ---</option>
                    <?php foreach ($spes as $key => $spe) { ?>
                        <option value="<?php echo $spe['id'] ?>"><?php echo $spe['nom_spe'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
          <select name="motif" >
              <option value="">--Motif du rendez-vous motif--</option>
          </select>
          <select name="medecin">
              <option value="">--Medecin--</option>
          </select>

<!--          <div class="form-group row">-->
<!--              <div class="col-md-12">-->
<!--                <input type="hidden" value="--><?php //echo $_POST['']?><!--" name="id_patient">-->
<!--              </div>-->
<!--          </div>-->

          <div class="form-group row">
              <div>
                  <div class="form-group">
                      <label for="" class="form-check-label">Date</label>
                      <?php $a= date('d-m-Y'); ?>
                      <input type="date" value="<?php echo $a ?>">
                  </div>
                  <label for="">Heure</label>
                  <select name="" id="">
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
    function Choix(form) {

        speid = form.Rubrique.value;
        motifs = <?php echo json_encode($motifs) ?>;
        medecins = <?php echo json_encode($medecins) ?>;
        b=form.motif.childElementCount;
        while (form.motif.firstChild) {
            form.motif.removeChild(form.motif.firstChild);
        }
        option = document.createElement('option');
        option.text = '--Motif du rendez-vous motif--';
        option.setAttribute('value','0');
        form.motif.appendChild(option);
        while (form.medecin.firstChild) {
            form.medecin.removeChild(form.medecin.firstChild);
        }
        option = document.createElement('option');
        option.text = '--Medecin--';
        option.setAttribute('value','0');
        form.medecin.appendChild(option);
        for (var key in motifs) {
            var motif = motifs[key];
            if (motif['id_spe']==speid) {
                option = document.createElement('option');
                option.text = motif['nom_motif'];
                option.setAttribute('value',motif['id']);
                option.setAttribute('classe','motif');
                form.motif.appendChild(option);
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
                form.medecin.appendChild(option);
                // form.motif.options[i+1].text=motif['nom_motif'];
            }
        }
    }
</script>
