<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/spe.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/medecin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
 ?>

<!doctype html>
<html lang="en">
<body style="background-color: #0f6674">
<div class="container">
    <h7>Informations personnelles</h7>
</div>
  <table class="table table-bordered container" style="margin-top: 100px;">

    <thread>
      <tr>
        <th>Nom</th>
          <th>Prenom</th>
          <th>Mail</th>
          <th></th>
      </tr>
    </thread>
    <?php
    $manager = new manager();
    $a = $manager->recovery_data(unserialize($_SESSION['user'])->getId());
    $a = unserialize($_SESSION['user']); ?>
      <tbody>
        <td> <?php echo $a->getNom(); ?> </td>
        <td> <?php echo $a->getPrenom(); ?> </td>
        <td> <?php echo $a->getMail(); ?> </td>
      <td>
          <form action="../forms/update.php" method="post">
              <input type="hidden" value="<?php echo $a->getId() ?>" name="id">
              <input type="submit" value="Modifié">
          </form>
      </td>
      </tbody>
  </table>
    <table class="table table-bordered container" style="margin-top: 100px;">
        <thead>
          <tr>
            <th>Médecin</th>
            <th>Motif</th>
            <th>Spécialité</th>
            <th>Horaire</th>
            <th>Date du RDV</th>
          </tr>
        </thead>
        <?php
        $manager = new manager();
        $b = $manager->get_rdv(unserialize($_SESSION['user'])->getId());
         ?>
        <tbody>
          <tr>
          <?php foreach($b as $key=>$value) {?>
          <td> <?php echo 'Dr '.$value['nom'];?> </td>
          <td> <?php echo $value['nom_motif']; ?> </td>
          <td> <?php echo $value['nom_spe']; ?> </td>
          <td> <?php echo $value['nom_heure']; ?> </td>
          <td> <?php echo $value['date_rdv']; ?> </td>
        <?php }; ?>
          </tr>
        </tbody>
    </table>

<?php
include "../include/footer.php";
?>

</body>
</html>
