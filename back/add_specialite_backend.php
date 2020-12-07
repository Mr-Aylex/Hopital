<?php
/**
* Add specialities
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/spe.php');

$new_spe = new spe($_POST);
$manager = new manager();
$result = $manager->add_specialite($new_spe);
if($result==1)
{
  echo $result;
  header('Location: ../forms/nouvelle_specialite.php');
}
else
{
  echo $result;
  header('Location: ../index.php');
}
 ?>
