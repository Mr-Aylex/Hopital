<html>
<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT']."/Hopital/back/entity/medecin.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
//$a = $manager->afficher_medecin();
?>
    <body style="background-image: url('/Hopital/images/medecin.jpg')">
    <div style="margin-top: 120px">
        <div class="container" style="background-color: rgba(170, 170, 170, 0.95);padding: 10px;border-radius: 10px;">
            <style>
                .box {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                }
            </style>
            <div class="box" id="box">
                <?php
                  //           foreach ($a as $key=>$value) { ?>
                <div style="margin-bottom: 10px" id="inbox">
                    <div>
                       <?php // echo 'Dr '.$value['nom'] ?>
                    </div>
                    <div>
                        <?php // echo $value['specialite'] ?>
                    </div>
                </div>
                <?php // } ?>
            </div>
        </div>
    </div>

    </body>

</html>
<script>
    test2();
    function test2() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                heures = this.responseText.split(';');
                console.log(heures);
                for (var key in heures) {
                    heure = heures[key];
                    heure1 = heure.split(',');
                    option = document.createElement('label');
                    option.text = heure1['1'];
                    option2 = document.createElement('label');
                    option2.text = heure1['4'];
                    div = document.createElement('div');
                    div.setAttribute('class','inbox');
                    div.append(option);
                    div.append(option2);
                    document.getElementById('box').append(div);
                }
                document.getElementById('box').lastChild.remove();
            }
        };
        xhttp.open("GET", "../back/afficher_medecin.php", true);
        xhttp.send();
    }
</script>