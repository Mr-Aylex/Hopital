
<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT']."/Hopital/back/entity/medecin.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
$manager = new manager();
$a = $manager->afficher_medecin();
?>
<html>
    <body style="background-image: url('/Hopital/images/medecin.jpg');">
    <div class="container">
        <table class="table table-bordered container" style="margin-top: 100px;">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Spétialité</th>
                </tr>
            </thead>
            <?php
            foreach ($a as $key=>$value) {
                ?>
            <tbody>
            <tr>
                <td><?php echo 'Dr '.$value['nom'] ?></td>
                <td><?php echo $value['specialite'] ?></td>
            </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    </body>

</html>