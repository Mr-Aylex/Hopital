<?php


class dossier
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
   protected $mail;
   /**
   * @var string
   */
   protected $adresse_post;
   /**
   * @var string
   */
   protected $mutuelle;
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
    * @param int $id
    */
    public function setId($id)
    {
      $this->id = $id;
    }

    /**
    * @return int
    */
    public function getId_Patient()
    {
      return $this->id_patient;
    }

    /**
    * @param int $id_patient
    */
    public function setId_Patient($id_patient)
    {
      $this->id_patient = $id_patient;
    }

    /**
    * @return string
    */
    public function getMail()
    {
      return $this->mail;
    }

    /**
    * @param string $mail
    */
    public function setMail($mail)
    {
      $this->mail = $mail;
    }

    /**
    * @return string
    */
    public function getAdresse_Post()
    {
      return $this->adresse_post;
    }

    /**
    * @param string $adresse_post
    */
    public function setAdresse_Post($adresse_post)
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
    * @param string $mutuelle
    */
    public function setMutuelle($mutuelle)
    {
      $this->mutuelle = $mutuelle;
    }

    /**
    * @return string
    */
    public function getNum_SS()
    {
      return $this->num_ss;
    }

    /**
    * @param string $num_ss
    */
    public function setNum_SS($num_ss)
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
    * @param string $opt
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
    * @param string $regime
    */
    public function setRegime($regime)
    {
      $this->regime = $regime;
    }



}
