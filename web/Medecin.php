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
<body style="background-image: url('/Hopital/images/medecin.jpg');background-repeat: no-repeat;">
<div style="margin-top: 120px" class="container">

    <input type="text" name="nom" id="nom" style="border-radius: 5px;border: #6c757d">
    <select name="spe" id="spe" style="height: 30px;border-radius: 5px;border: #6c757d">
        <option value="0">-- Spétialité --</option>
        <?php foreach($tab as $key=>$value) { ?>
            <option value="<?= $value['id'] ?>"><?= $value['nom_spe'] ?></option>
        <?php } ?>
    </select>
    <button id="btn" style="border: #6c757d">Filtrer</button>
    <div  style="background-color: rgba(170, 170, 170, 0.95);padding: 10px;border-radius: 10px;margin-top: 10px">
        <style>
            .box {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
            }
            .inbox {
                margin-top: 5px;
                margin-left: 5px;
                border-style: solid;
                border-color: #342f2f;
                border-width: thin;
                padding: 2px;
                border-radius: 10px;
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

        while (document.getElementById('box').firstChild) {
            document.getElementById('box').removeChild(document.getElementById('box').firstChild);
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                heures = this.responseText.split(';');
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
        xhttp.open("GET", "../back/afficher_medecin.php?nom="+nom+"&spe="+spe, true);
        xhttp.send();
    }
</script>