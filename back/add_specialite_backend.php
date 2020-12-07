<?php
/**
* Add specialities
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/spe.php');

$manager = new manager();
$result = $manager->add_specialite($_POST);
if($result==1)
{
  header('Location: ../forms/nouvelle_specialite.php');
}
else
{
  header('Location: ../index.php');
}
 ?>
