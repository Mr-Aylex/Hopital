<?php


class dossier
{
  {
   /**
   * @var int
   */
   protected $id;
   /**
   * @var int
   */
   protected $id_patient;
   /**
   * @var string
   */
   protected $email;
   /**
   * @var string
   */
   protected $adresse_post;
   /**
   * @var string
   */
   protected $num_ss;
   /**
   * @var string
   */
   protected $opt;
   /**
   * @var string
   */
   protected $regime;

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
    * @return int
    */
    public function getId()
    {
      return $this->id;
    }

    /**
    * @param int
    */
    public function setId($id)
    {
      $this->id = $id;
    }

    /**
    * @return int
    */
    public function getIdPatient()
    {
      return $this->id_patient;
    }

    /**
    * @param int
    */
    public function setIdPatient($id_patient)
    {
      $this->id_patient = $id_patient;
    }

    /**
    * @return string
    */
    public function getEmail()
    {
      return $this->email;
    }

    /**
    * @param string
    */
    public function setEmail($email)
    {
      $this->email = $email;
    }

    /**
    * @return string
    */
    public function getAdressePost()
    {
      return $this->adresse_post;
    }

    /**
    * @param string
    */
    public function setAdressePost($adresse_post)
    {
      $this->adresse_post = $adresse_post;
    }

    /**
    * @return string
    */
    public function getMutuelle()
    {
      return $this->mutuelle;
    }

    /**
    * @param string
    */
    public function setMutuelle($mutuelle)
    {
      $this->mutuelle = $mutuelle;
    }

    /**
    * @return string
    */
    public function getNumSS()
    {
      return $this->num_ss;
    }

    /**
    * @param string
    */
    public function setNumSS($num_ss)
    {
      $this->num_ss = $num_ss;
    }

    /**
    * @return string
    */
    public function getOpt()
    {
      return $this->opt;
    }

    /**
    * @param string
    */
    public function setOpt($opt)
    {
      $this->opt = $opt;
    }

    /**
    * @return string
    */
    public function getRegime()
    {
      return $this->regime;
    }

    /**
    * @param string
    */
    public function setRegime($regime)
    {
      $this->regime = $regime;
    }


    
}
