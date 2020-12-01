<html>
<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT']."/Hopital/back/entity/medecin.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$tab = $manager->get_spetialite();
//$a = $manager->afficher_medecin();
?>
    <body style="background-image: url('/Hopital/images/medecin.jpg')">
    <div style="margin-top: 120px">

            <input type="text" name="nom" id="nom">
            <select name="spe" id="spe">
                <option value="0">-- Spétialité --</option>
                <?php foreach($tab as $key=>$value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['nom_spe'] ?></option>
                <?php } ?>
            </select>
            <button id="btn">Filtrer</button>


        <div class="container" style="background-color: rgba(170, 170, 170, 0.95);padding: 10px;border-radius: 10px;">
            <style>
                .box {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                }
            </style>
            <div class="box" id="box">
            </div>
        </div>
    </div>

    </body>

</html>
<script>
    document.getElementById("btn").addEventListener("click", function() {
        test2();
    });
    test2();
    function test2() {
        nom = null;
        spe = null;
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                heures = this.responseText.split(';');
                console.log(heures);
                for (var key in heures) {
                    heure = heures[key];
                    heure1 = heure.split(',');
                    option = document.createElement('div');
                    option.innerHTML = heure1['1'];
                    option2 = document.createElement('div');
                    option2.innerHTML = heure1['3'];
                    div = document.createElement('div');
                    div.setAttribute('class','inbox');
                    div.append(option);
                    div.append(option2);
                    document.getElementById('box').append(div);
                }
                document.getElementById('box').lastChild.remove();
            }
        };

        nom = document.getElementById('nom').value;
        spe = document.getElementById('spe').value;
        nom = 'resr';
        spe = '1';
        /**
         * TODO
         * termniner les filtres
         */
        console.log(nom);
        console.log(spe);
        //xhttp.open("GET", "../back/afficher_medecin.php", true);
        xhttp.open("GET", "../back/afficher_medecin.php?nom=".nom."&spe=".spe, true);
        xhttp.send();
    }
</script>