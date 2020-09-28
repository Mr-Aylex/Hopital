<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');

class manager
{
 public function getmethod($class)
 {
     $tab = array();
     foreach (get_class_methods($class) as $key => $value)
     {
         if (strstr($value,'get')) {
             $nom = strtolower(substr($value,3));
             $tab[$nom] = $class->$value();
         }
     }
     return $tab;
 }
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
     $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE mail=:mail');
     $request->execute(array($signin->getMail()));
     $result = $request->fetch();
   if($result['mail'] == $signin->getMail() AND $result['mdp'] == $signin->getMdp())
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
   $request = $this->connexion_bdd()->prepare('SELECT nom, prenom FROM utilisateur WHERE nom=:nom AND prenom=:prenom');
   $request->execute(array(
     'nom' => $user->getNom(),
     'prenom' => $user->getPrenom()
   ));
   $result = $request->fetch();
   if (1==0)
   //if($result)
   {
     header(dirname($_SERVER['DOCUMENT_ROOT']). '/Hopital/forms/sign_up.php');
   } else {

     $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur(nom, prenom, mail, mdp, role_user) VALUES (:nom, :prenom, :mail, :mdp, :role_user)');
     $request->execute($this->getmethod());
     header('Location: ../forms/sign_in.php');
   }
 }

/**
* @param User $user
* Modify user's information
*/
 public function modify(User $user)
 {
   $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, mail=:mail, mdp=:mdp, role_user=:role_user WHERE id=:id');
   $request->execute($this->getmethod());
   header('Location : ../index.php');
 }

 /**
* @param User $user
* Forgotten mdpword
*/
public function new_mdp(User $user)
{
  $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET mdp=:mdp WHERE mail=:mail');
  $request->execute(array(
    'mdp' => md5($user->getMdp()),
    'mail' => $user->getMail()
  ));
  header('Location : ../index.php');
}

/**
* @param User $user
* Add user's folder
*/
public function add_dossier(User $user)
{
  $request = $this->connexion_bdd()->prepare('SELECT * FROM dossier_patients WHERE id=:id');
  $request->execute(array(
    'mail' => $user->getMail()
  ));
  $result = $request->fetch();
  if($result)
  {
    header('Location : ../index.php');
  }
  else
  {
    $request = $this->connexion_bdd()->prepare('INSERT INTO dossier_patients (mail, adresse_post, mutuelle, num_ss, opt, regime) VALUES (:mail, :adresse_post, :mutuelle, :num_ss, :opt, :regime)');
    $request->execute(array(
      'mail' => $user->getMail(),
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
   $request = $this->connexion_bdd()->prepare('INSERT INTO medecin (nom, prenom, id_specialite, mail, telephone, lieu) VALUES (:nom, :prenom, :id_specialite, :mail, :telephone, :lieu)');
   $request->execute(array(
     'nom' => $medecin->getNom(),
     'prenom' => $medecin->getPrenom(),
     'id_specialite' => $medecin->getIdSpecialite(),
     'mail' => $medecin->getmail(),
     'telephone' => $medecin->getTelephone(),
     'lieu' => $medecin->getLieu()
   ));
 }

 /**
 * @param User $administrateur
 * Add manager
 */
 public function add_administrateur(User $administrateur)
 {
   $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur (nom, prenom, mail, mdp, role_user) VALUES (:nom, :prenom, :mail, :mdp, :role_user)');
   $request->execute(array(
     'nom' => $administrateur->getNom(),
     'prenom' => $administrateur->getPrenom(),
     'mail' => $administrateur->getmail(),
     'mdp' => $administrateur->getmdp(),
     'role_user' => $administrateur->getrole_userUser()
   ));
   header('Location : ../admin.php');
 }

}
