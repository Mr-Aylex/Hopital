<?php
include "../include/header.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
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
          <form action="" method="post">
              <input type="hidden" value="<?php echo $a->getId() ?>" name="id">
              <input type="submit" value="Modifié">
          </form>
      </td>
      </tbody>
  </table>
    <table>
        <thread>

        </thread>
        <tbody>

        </tbody>
    </table>

<?php
include "../include/footer.php";
?>

</body>
</html>
