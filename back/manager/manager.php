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
     var_dump($result);
   if ($result==false) {
       $request = $this->connexion_bdd()->prepare(
           "INSERT INTO utilisateur(nom, prenom, mail, mdp, role_user) VALUES (:nom, :prenom, :mail, :mdp, :role_user)");
       $request->execute($this->getmethod($user));
        return 1;
   }
   else {

         return 0;
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
'SELECT medecin.id, utilisateur.nom,id_specialite as id_spe, specialites.nom_spe as specialite FROM medecin INNER JOIN specialites on specialites.id = medecin.id_specialite INNER JOIN utilisateur ON utilisateur.id = medecin.id_user');
        $req->execute();
        $res = $req->fetchAll();
        $i = 0;
        foreach ($res as $key1 => $value1) {
            $array = array();
            foreach ($value1 as $key => $value) {
                if (!is_int($key)) {
                    $array[$key] = $value;
                }
            }
            $medecins[$i] = $array;
            $i++;
        }
        return $medecins;
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
public function if_mail_exist($mail) {
    $request = $this->connexion_bdd()->prepare('SELECT * FROM utilisateur WHERE mail=:mail');
    $request->execute(array('mail'=>$mail));

    return $request->fetch();

}
 /**
* @param User $user
* Forgotten mdpword
*/
public function new_mdp(User $user)
{
  $request = $this->connexion_bdd()->prepare('UPDATE utilisateur SET mdp=:mdp WHERE mail=:mail');
  $request->execute(array(
    'mdp' => $user->getMdp(),
    'mail' => $user->getMail()
  ));
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
  $req = $this->connexion_bdd()->prepare('INSERT INTO rdv(id_patient, id_medecin, id_motif, date_rdv, heure_id) VALUE (:id_patient, :id_medecin, :id_motif, :date_rdv, :heure_id)');
  $req->execute($this->getmethod($rdv));

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
             'INSERT INTO utilisateur(nom, prenom, mail, mdp,role_user) VALUES (:nom, :prenom, :mail, :mdp, :role_user)');
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
         var_dump($medecin);
         $request = $this->connexion_bdd()->prepare(
             'INSERT INTO medecin(id_user, id_specialite, telephone, lieu) VALUES (:id_user, :id_specialite, :telephone, :lieu)');
         $request->execute($this->getmethod($medecin));
     }
 }

    /**
     * @return array
     */
 public function get_spetialite() {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM specialites');
     $request->execute();
     $spe = $request->fetchAll();
     return $spe;
 }
public function get_motif(){
    $request = $this->connexion_bdd()->prepare('SELECT * FROM motif');
    $request->execute();
    $motif = $request->fetchAll();
    $motif2 = array();
    $i = 0;
    foreach ($motif as $key1 => $value1) {
        $array = array();
        foreach ($value1 as $key => $value) {
            if (!is_int($key)) {
                $array[$key] = $value;
            }
        }
        $motif2[$i] = $array;
        $i++;


    }
    return $motif2;
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
 public function get_horaire() {
     $request = $this->connexion_bdd()->prepare('SELECT * FROM heure');
     $request->execute();
     $a = $request->fetchAll();
     return $a;
 }
public function get_used_horaire() {
 $request = $this->connexion_bdd()->prepare('SELECT heure_id, date_rdv, id_medecin FROM rdv');
 $request->execute();
 return $request->fetchAll();
 }
}
