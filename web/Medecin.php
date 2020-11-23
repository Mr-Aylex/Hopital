<html>
<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT']."/Hopital/back/entity/medecin.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$a = $manager->afficher_medecin();
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
            <div class="box">
                <?php
                             foreach ($a as $key=>$value) { ?>
                <div style="margin-bottom: 10px">
                    <div>
                        <?php echo 'Dr '.$value['nom'] ?>
                    </div>
                    <div>
                        <?php echo $value['specialite'] ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    </body>

</html>