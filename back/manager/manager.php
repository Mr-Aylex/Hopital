<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/Dossier.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/rdv.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Hopital/back/entity/spe.php');

class manager
{
 public function getmethod($class)
 {
     $tab = array();
     foreach (get_class_methods($class) as $key => $value)
     {
         if (strstr($value,'get')) {
             $nom = strtolower(substr($value,3));
             if (!is_null($class->$value())) {
                 $tab[$nom] = $class->$value();
             }
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
 public function connexion($signin)
 {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE mail=:mail and mdp=:mdp');
     $request->execute($this->getmethod($signin));
     $result = $request->fetch();
     if ($result) {
         $user = new user($result);
         return $user;
     }
     else {
         return null;
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

     $request = $this->connexion_bdd()->prepare(
         'INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)');
     $request->execute($this->getmethod($user));
     header('Location: ../forms/sign_in.php');
   }
 }
    public function recovery_data($id)
    {
        $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE id =:id');
        $request->execute(array(
            'id' => $id
        ));
        $result = $request->fetch();
        return $result;
    }
    public function afficher_medecin() {
        $req = $this->connexion_bdd()->prepare(
'SELECT medecin.id, utilisateur.nom, specialites.nom_spe as specialite FROM medecin INNER JOIN specialites on specialites.id = medecin.id_specialite INNER JOIN utilisateur ON utilisateur.id = medecin.id_user');
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

/**
* @param User $user
* Modify user's information
*/
 public function modify(User $user)
 {
     var_dump($user);
   $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, mail=:mail, mdp=:mdp WHERE id=:id');
   $request->execute(array(
       'id'=>$user->getId(),
       'mdp'=>$user->getMdp(),
       'mail'=>$user->getMail(),
       'nom'=>$user->getNom(),
       'prenom'=>$user->getPrenom()
   ));
   //header('Location: ../index.php');
 }
 public function get_modification($user) {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE mail=:mail and mdp=:mdp');
     $request->execute(array(
         'mdp'=>$user->getMdp(),
         'mail'=>$user->getMail()

         ));
     $result = $request->fetch();
     if ($result) {
         $user = new user($result);
         return $user;
     }
     else {
         return null;
     }
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
  header('Location: ../index.php');
}

/**
* @param Dossier
* Add user's folder
*/
public function add_dossier(Dossier $dossier)
{
    $request = $this->connexion_bdd()->prepare('INSERT INTO dossier_patients (id_patient, mail, adresse_post, mutuelle, num_ss, opt, regime) VALUES (:id_patient, :mail, :adresse_post, :mutuelle, :num_ss, :opt, :regime)');
    $request->execute(array(
        'mail' => $dossier->getMail(),
        'adresse_post' => $dossier->getAdressePost(),
        'mutuelle' => $dossier->getMutuelle(),
        'num_ss' => $dossier->getNumSS(),
        'opt' => $dossier->getOpt(),
        'regime' => $dossier->getRegime()
    ));
}

/**
* @param RDV
* Appointment booking
*/
public function rdv($rdv)
{
  $req = $this->connexion_bdd()->prepare('SELECT id, motif, id_patient, id_medecin, date_rdv from rdv INNER JOIN dossier_patients on dossier_patients.id_patient = rdv.id_patient INNER JOIN medecin on medecin.id_medecin = rdv.id_medecin');
  $req->execute($this->getmethod($rdv));
  $result = $req->fetch();
  if($result)
  {
    $rdv = new rdv($result);
    return $rdv;
  }
  else {
    $req = $this->connexion_bdd()->prepare('INSERT INTO rdv(motif, date_rdv) VALUES(:motif, NOW())');
    $req->execute($this->getmethod($rdv));
    header('Location: ../.php');
  }
}

 /**
 * @param User $medecin
 * Add doctors
 */
 public function add_medecin(User $user,medecin $medecin)
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

         $request = $this->connexion_bdd()->prepare(
             'INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (:nom, :prenom, :mail, :mdp)');
         var_dump($user);
         $request->execute($this->getmethod($user));
         $request = $this->connexion_bdd()->prepare(
             'SELECT id FROM utilisateur WHERE nom=:nom AND prenom=:prenom');
         $request->execute(array(
             'nom' => $user->getNom(),
             'prenom' => $user->getPrenom()
         ));
         $result = $request->fetch();
         $medecin->setId_user($result['id']);
         $request = $this->connexion_bdd()->prepare(
             'INSERT INTO medecin(id_user, id_specialite, telephone, lieu) VALUES (:id_user, :id_specialite, :telephone, :lieu)');
         var_dump($medecin);
         var_dump($this->getmethod($medecin));
         $request->execute($this->getmethod($medecin));
         header('Location: ../web/admin.php');
     }
 }
 public function get_spetialite() {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM specialites');
     $request->execute();
     $spe = $request->fetchAll();
     $tab_spe = array();
     foreach ($spe as $key => $value) {
        $nom = $value['nom_spe'];
        $tab_spe[$nom] = new spe($value);
     }
     return $tab_spe;
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
   header('Location: ../admin.php');
 }

}
