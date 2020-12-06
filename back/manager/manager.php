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
    public function afficher_medecin($array = null) {
        $request = null;
        $execute = null;
        if(isset($array['spe']) and isset($array['nom'])) {
            $execute = array();
            if ($array['spe'] != '0' and $array['nom'] != '') {
                $request = 'WHERE specialites.nom = :spe AND utilisateur.nom = :nom';
                $execute['nom'] = $array['nom'];
                $execute['spe'] = $array['spe'];
            }
            elseif ($array['nom'] != '') {
                $request = 'WHERE utilisateur.nom = :nom';
                $execute['nom'] = $array['nom'];
            }
            elseif ($array['spe'] != '0'){
                $request = 'WHERE specialites.id = :spe';
                $execute['spe'] = $array['spe'];
            }
        }


        $req = $this->connexion_bdd()->prepare(
            'SELECT medecin.id, utilisateur.nom,id_specialite as id_spe,
 specialites.nom_spe as specialite FROM medecin 
 INNER JOIN specialites on specialites.id = medecin.id_specialite 
 INNER JOIN utilisateur ON utilisateur.id = medecin.id_user '.$request);
        $a = $req->execute($execute);
        //$req->debugDumpParams();
        $res = $req->fetchAll();
        $i = 0;
        $medecins = array();
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
     * @param Dossier
     * Export folder
     */
    public function export_dossier(Dossier $exporting)
    {
        $request = $this->connexion_bdd()->prepare(
            'SELECT utilisateur.nom, utilisateur.prenom, utilisateur.mail, adresse_post, mutuelle, num_ss, opt, regime
    FROM dossier_patients INNER JOIN utilisateur ON utilisateur.id = id_patient');
        $request->execute($this->getmethod($exporting));
        $result = $request->fetchAll();
        $excel = "Nom \t Prénom \t Mail \t Adresse Postale \t Mutuelle \t Numero_Securite_Social \t Option \t Regime \n";
        foreach($result as $row)
        {
            $excel .= "$row[nom] \t $row[prenom] \t $row[mail] \t$row[adresse_post] \t$row[mutuelle] \t$row[num_ss] \t$row[opt] \t$row[regime] \n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=dossier-patients.xls");
        print $excel;
        exit;
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
     * @param RDV
     * Appointment booking visibilty
     */
    public function get_rdv()
    {
        $request = $this->connexion_bdd()->prepare(
            'SELECT utilisateur.nom, motif.nom_motif,specialites.nom_spe, heure.nom_heure, date_rdv FROM rdv INNER JOIN medecin ON id_medecin = medecin.id
    INNER JOIN utilisateur ON medecin.id_user = utilisateur.id INNER JOIN heure ON heure_id = heure.id INNER JOIN specialites ON specialites.id = medecin.id_specialite
    INNER JOIN motif ON motif.id = rdv.id_motif');
        $request->execute();
        $rdv = $request->fetchAll();
        return $rdv;
    }

    /**
     * @param RDV
     * Export Appointment Booking
     */
    public function export_rdv(RDV $rdv)
    {
        $request = $this->connexion_bdd()->prepare(
            'SELECT utilisateur.nom, motif.nom_motif,specialites.nom_spe, heure.nom_heure, date_rdv FROM rdv INNER JOIN medecin ON id_medecin = medecin.id
    INNER JOIN utilisateur ON medecin.id_user = utilisateur.id INNER JOIN heure ON heure_id = heure.id INNER JOIN specialites ON specialites.id = medecin.id_specialite
    INNER JOIN motif ON motif.id = rdv.id_motif');
        $request->execute($this->getmethod($rdv));
        $result = $request->fetchAll();
        $excel = "Médecin \t Motif \t Spécialité \t Horaire \t Date du RDV\n";
        foreach($result as $row)
        {
            $excel .= "$row[nom] \t $row[nom_motif] \t $row[nom_spe] \t$row[nom_heure] \t$row[date_rdv] \n";
        }
        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=rdv.xls");
        print $excel;
        exit;
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
        if(1==0)
        {
            header(dirname($_SERVER['DOCUMENT_ROOT']) .'Hopital/forms/nouveau_admin.php');
        } else {
            $request = $this->connexion_bdd()->prepare('INSERT INTO utilisateur (nom, prenom, mail, mdp, role_user) VALUES (:nom, :prenom, :mail, :mdp, :role_user)');
            $request->execute($this->getmethod($administrateur));
        }
        header('Location: ../admin.php');
    }
    public function get_horaire() {
        $request = $this->connexion_bdd()->prepare('SELECT * FROM heure');
        $request->execute();
        $a = $request->fetchAll();
        return $a;
    }
    public function get_unused_horaire($medecin,$date) {
        $request = $this->connexion_bdd()->prepare('SELECT * FROM heure WHERE id not in (SELECT heure_id FROM rdv WHERE id_medecin=:id_medecin AND date_rdv = :date_rdv)');
        $request->execute(array(
            'id_medecin'=>$medecin,
            'date_rdv'=>$date
        ));
        $heure = $request->fetchAll();
        $heure2 = array();
        $i = 0;
        foreach ($heure as $key1 => $value1) {
            $array = array();
            foreach ($value1 as $key => $value) {
                if (!is_int($key)) {
                    $array[$key] = $value;
                }
            }
            $heure2[$i] = $array;
            $i++;


        }
        return $heure2;
    }
}
