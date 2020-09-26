<?php
session_start();
include "../include/header.php";

class affutilisateur
{
  public function recover_data()
  {
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Error :' .$e->getMessage());
    }
    $request = $bdd->prepare('SELECT nom, prenom, email, role FROM utilisateur WHERE id =:id');
    $request->execute(array(
      'nom' => $_SESSION['nom']
    ));
    $result = $request->fetchAll();
  }
}
 ?>

<!doctype html>
<html lang="en">
<body>
  <table class="table table-bordered container" style="margin-top: 100px;">
    <thread>
      <tr>
        <th>Informations personnelles</th>
      </tr>
    </thread>
    <?php
    $user = new affutilisateur();
    $a = $user->recover_data();
    foreach($a as $key => $value)
    { ?>
      <tbody>
        <td> <?php echo $value->getNom(); ?> </td>
        <td> <?php echo $value->getPrenom(); ?> </td>
        <td> <?php echo $value->getEmail(); ?> </td>
        <td> <?php echo $value->getRole(); ?> </td>
      </tbody>
    <?php } ?>
  </table>

<?php
include "../include/footer.php";
?>

</body>
</html>
