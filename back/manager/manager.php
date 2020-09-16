<?php


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
     $result = $result->fetch();
   if($result['email'] == $signin->getEmail() AND $result['pass'] == $signin->getPass())
   {
     $_SESSION['nom'] = $result['nom'];
     $_SESSION['prenom'] = $result['prenom'];
     $_SESSION['email'] = $signin->getEmail();
     $_SESSION['pass'] = $signin->getPass();
     $_SESSION['role'] = $result['role'];
     header('Location : ../index.php')
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
     'nom' => getNom(),
     'prenom' => getPrenom()
   ));
   $result = $request->fetch();
   if($data)
   {
     header(dirname($_SERVER['DOCUMENT_ROOT']). 'Hopital/forms/sign_up.php');
   } else {
     $request = $this->connexion_bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, pass, role) VALUES (:nom, :prenom, :email, :pass, :role)');
     $request->execute(array(
       'nom' => $user->getNom(),
       'prenom' => $user->getPrenom(),
       'email' => $user->getEmail(),
       'pass' => $user->getPass(),
       'role' => $user->getRole()
     ));
   }
 }
}
