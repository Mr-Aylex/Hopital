
<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT']."/Hopital/back/entity/medecin.php");
class affmedecin {
    public function afficher_medecin() {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Error :' .$e->getMessage());
        }
        $req = $bdd->prepare('SELECT medecin.id, utilisateur.nom, specialites.nom as specialite FROM medecin INNER JOIN specialites on specialites.id = medecin.id_specialite INNER JOIN utilisateur ON utilisateur.id = medecin.id_user');
        $req->execute();
        $res = $req->fetchAll();
        $tab = array();
        foreach ($res as $key => $value) {
            $nom = 'med'.$value['id'];
            $$nom = new medecin($value);
            $tab[$nom] = $$nom;
        }
        return $tab;
    }
}
?>
<html>
    <body>
        <table class="table table-bordered container" style="margin-top: 100px;">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Spétialité</th>
                </tr>
            </thead>
            <?php
            $med = new affmedecin();
            $a =$med->afficher_medecin();
            foreach ($a as $key=>$value) {
                ?>
            <tbody>
            <tr>
                <td><?php echo $value->getNom() ?></td>
                <td><?php echo $value->getSpecialite() ?></td>
            </tr>
            </tbody>
            <?php } ?>
        </table>
    </body>
</html>