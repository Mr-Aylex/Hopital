<?php


class medecin
{
 /**
 *@var string
 */
 protected $nom;
 /**
 *@var string
 */
 protected $prenom;
 /**
 *@var int
 */
 protected $id_specialite
 /**
 *@var string
 */
 protected $email;
 /**
 *@var string
 */
 protected $telephone;
 /**
 *@var string
 */
 protected $lieu;

  /**
  * medecin constructor
  * @param array $array
  */
  public function __construct($array)
  {
    $this->hydrate($array);
  }
  /**
  * @param array $donnees
  */
  public function hydrate($donnees)
  {
    foreach($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      if(method_exists($this,$method)){
        $this->$method($value);
      }
    }
  }

  /**
  * @return string
  */
  public function getNom()
  {
    return $this->nom;
  }

  /**
  * @param string $nom
  */
  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  /**
  * @return string
  */
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
  * @param string $prenom
  */
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }

  /**
  * @return int
  */
  public function getIdSpecialite()
  {
    return $this->id_specialite;
  }

  /**
  * @param string $id_specialite
  */
  public function setIdSpecialite($id_specialite)
  {
    $this->id_specialite = $id_specialite;
  }

  /**
  * @return string
  */
  public function getEmail()
  {
    return $this->email;
  }

  /**
  * @param string $email
  */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
  * @return string
  */
  public function getTelephone()
  {
    return $this->telephone;
  }

  /**
  * @param string $telephone
  */
  public function setTelephone($telephone)
  {
    $this->telephone = $telephone;
  }

  /**
  * @return string
  */
  public function getLieu()
  {
    return $this->lieu;
  }

  /**
  * @param string $lieu
  */
  public function setLieu($lieu)
  {
    $this->lieu = $lieu;
  }



}
