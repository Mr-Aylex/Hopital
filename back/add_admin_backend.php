<?php
/**
* Add admin
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/manager/manager.php');

$new_admin = new user($_POST);
$manager = new manager();
$new_admin->setRole_user('admin');
$result = $manager->add_administrateur($new_admin);
if($result==1)
{
  echo $result;
  header('Location: ../nouveau_admin.php');
} elseif($result == 0) {
  echo $result;
  header('Location: ../forms/nouveau_admin.php');
}
 ?>
