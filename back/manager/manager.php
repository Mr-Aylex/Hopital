<?php

require_once($_SERVER['DOCUMENT_ROOT'].'Hopital/back/entity/user.php');

class manager
{
/**
* Connecting to database
*/
 public function connexion_bdd()
 {
   try
   {
     $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
   }
   catch (Exception $e)
   {
     die('Error :' .$e->getMessage());
   }
}

/**
* @param User $signin
* Allows to users to sign in
*/
 public function connexion(User $signin)
 {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE email=:email');
     $request->execute(array($signin->getEmail()));
     $result = $request->fetch();
   if($result['email'] == $signin->getEmail() AND $result['pass'] == $signin->getPass())
   {
     $_SESSION['nom'] = $result['nom'];
     $_SESSION['prenom'] = $result['prenom'];
     $_SESSION['email'] = $signin->getEmail();
     $_SESSION['pass'] = $signin->getPass();
     $_SESSION['role'] = $result['role'];
     header('Location : ../index.php');
   }
   else
   {
    header('Location : ../index.php');
   }
 }

/**
* @param User $user
* Insert new users into utilisateur
*/
 public function insert_user(User $user)
 {
   $request = $this->connexion_bdd()->prepare('SELECT nom, prenom FROM utilisateur WHERE nom=:nom AND prenom=:prenom');
   $request->execute(array(
     'nom' => $user->getNom(),
     'prenom' => $user->getPrenom()
   ));
   $result = $request->fetch();
   if($result)
   {
     header(dirname($_SERVER['DOCUMENT_ROOT']). 'Hopital/forms/sign_up.php');
   } else {
     $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT, 'cost' => 15);
     $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur(nom, prenom, email, pass, role) VALUES (:nom, :prenom, :email, :pass, :role)');
     $request->execute(array(
       'nom' => $user->getNom(),
       'prenom' => $user->getPrenom(),
       'email' => $user->getEmail(),
       'pass' => password_hash($user->getPass()),
       'role' => $user->getRole()
     ));
   }
 }

/**
* @param User $user
* Modify user's information
*/
 public function modify(User $user)
 {
   $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, pass=:pass, role=:role WHERE id=:id');
   $request->execute(array(
     'nom' => $user->getNom(),
     'prenom' => $user->getPrenom(),
     'email' => $user->getEmail(),
     'pass' => $user->getPass(),
     'role' => $user->getRole()
   ));
   header('Location : ../index.php');
 }

 /**
* @param User $user
* Forgotten password
*/
public function new_pass(User $user)
{
  $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT, 'cost' => 15);
  $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET pass=:pass WHERE email=:email');
  $request->execute(array(
    'pass' => password_hash($user->getPass()),
    'email' => $user->getEmail()
  ));
  header('Location : ../index.php');
}

 /**
 * @param User $medecin
 * Add doctors
 */
 public function add_medecin(User $medecin)
 {
   $request = $this->connexion_bdd()->prepare('INSERT INTO medecin (nom, prenom, id_specialite, email, telephone, lieu) VALUES (:nom, :prenom, :id_specialite, :email, :telephone, :lieu)');
   $request->execute(array(
     'nom' => $medecin->getNom(),
     'prenom' => $medecin->getPrenom(),
     'id_specialite' => $medecin->getIdSpecialite(),
     'email' => $medecin->getEmail(),
     'telephone' => $medecin->getTelephone(),
     'lieu' => $medecin->getLieu()
   ));
 }

 /**
 * @param User $manager
 * Add manager
 */
 public function add_manager(User $manager)
 {
   $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur (nom, prenom, email, pass, role) VALUES (:nom, :prenom, :email, :pass, :role)');
   $request->execute(array(
     'nom' => $manager->getNom(),
     'prenom' => $manager->getPrenom(),
     'email' => $manager->getEmail(),
     'pass' => $manager->getPass(),
     'role' => $manager->getRole()
   ));
   header('Location : ../admin.php');
 }

}
