<!doctype html>
<html lang="en">

<?php
include '../include/header.php';
?>

<script language="JavaScript">
function verif()
  {
  if (document.layers)
    {
    formulaire = document.forms.monRDV;
    }
  else
    {
    formulaire = document.monRDV;
    }
  }

function verifChoixSpe()
  {
  verif();
  if (formulaire.specialites.value == "0")
    {
    alert('Vous devez choisir une spécialité !');
    formulaire.specialites.focus();
    }
  }

var motifs = new Array();
motifs[0] = new Array();
motifs[1] = new Array("Première consultation", "Consultation de suivi")
motifs[2] = new Array("Première consultation", "Consultation de suivi")
motifs[3] = new Array("Première consultation", "Consultation de suivi")
motifs[4] = new Array("Première consultation", "Consultation de suivi")
motifs[5] = new Array("Première consultation", "Consultation de suivi")

function remplirMotifs(code)
  {
  verif();
  var lesMotifs = motifs[code];

  if (code>0)
    {
    formulaire.choixMotif.options.length = lesMotifs.length;
    for (i=0; i<lesMotifs.length; i++)
      {
      formulaire.choixMotif.options[i].value = lesMotifs[i];
      formulaire.choixMotif.options[i].text = lesMotifs[i];
      }
    document.monRdv.choixMotif.options.selectedIndex = 0;
    }
  else
    {
    formulaire.choixMotif.options.length = 1;
    formulaire.choixMotif.options[0].value = 0;
    formulaire.choixMotif.options[0].text = "--Quel est votre motif ?--";
    }
  }
</script>

<div class="hero" style="background-image: url('/Hopital/images/hero_bg_1.jpg');">
  <div class="container" style="padding-top: 150px">
      <form name="monRdv" action="../back/.php" method="post">
        <div class="form-group row">
            <div class="col-md-12">
              <select name="specialites" onChange="remplirMotifs(this.options[this.selectedIndex].value);">>
                <option value="0" selected>--Choisir une spécialité--</option>
                <option value="1">Addictologue</option>
                <option value="2">Infirmier</option>
                <option value="3">Hématologue</option>
                <option value="4">Hépatologue</option>
                <option value="5">Tabacologue</option>
              </select>
            </div>
        </div>

          <div class="form-group row">
              <div class="col-md-12">
                <select name="choixMotif" onFocus="verifChoixSpe();">
                  <option value="0" selected>--Quel est votre motif ?--</option>
                </select>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <input type="hidden" value="<?php echo $_POST['']?>" name="id_patient">
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <input type="hidden" value="<?php echo $_POST['']?>" name="id_medecin">
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-12">
                <label for="">Sélectionnez votre date de rendez-vous</label>
                <input type="date" name="date_rdv" placeholder="JJ/MM/AA">
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
