<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');

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
   return $bdd;
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
     $_SESSION['user'] = serialize($signin);
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
     var_dump($user);
   $request = $this->connexion_bdd()->prepare('SELECT nom, prenom FROM utilisateur WHERE nom=:nom AND prenom=:prenom');
   $request->execute(array(
     'nom' => $user->getNom(),
     'prenom' => $user->getPrenom()
   ));
   $result = $request->fetch();
   if($result)
   {
     header(dirname($_SERVER['DOCUMENT_ROOT']). '/Hopital/forms/sign_up.php');
   } else {
     $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)');
     $request->execute(array(
       'nom' => $user->getNom(),
       'prenom' => $user->getPrenom(),
       'mail' => $user->getMail(),
       'mdp' => md5($user->getMdp()),
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
  $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET pass=:pass WHERE email=:email');
  $request->execute(array(
    'pass' => md5($user->getPass()),
    'email' => $user->getEmail()
  ));
  header('Location : ../index.php');
}

/**
* @param User $user
* Add user's folder
*/
public function add_dossier(User $user)
{
  $request = $this->connexion_bdd()->prepare('SELECT * FROM dossier_patients INNER JOIN utilisateur ON utilisateur.id = dossier_patients.id');
  $request->execute(array(
    'email' => $user->getEmail()
  ));
  $result = $request->fetch();
  if($result)
  {
    header('Location : ../index.php');
  }
  else
  {
    $request = $this->connexion_bdd()->prepare('INSERT INTO dossier_patients (email, adresse_post, mutuelle, num_ss, opt, regime) VALUES (:email, :adresse_post, :mutuelle, :num_ss, :opt, :regime)');
    $request->execute(array(
      'email' => $user->getEmail(),
      'adresse_post' => $user->getAdressePost(),
      'mutuelle' => $user->getNumSS(),
      'opt' => $user->getOpt(),
      'regime' => $user->getRegime()
    ));
  }
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
