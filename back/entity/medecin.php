<?php


class medecin
{
    /**
     * @var int
     */
    protected $id_user;
    /**
     * @var int
     */
    protected $id_specialite;
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
      * @return int
      */
      public function getId()
      {
        return $this->id;
      }

      /**
      * @param int $id
      */
      public function setId()
      {
        $this->id = $id;
      }

      /**
       * @return int
       */
      public function getId_user()
      {
          return $this->id_user;
      }

      /**
       * @param int $id_user
       */
      public function setId_user($id_user)
      {
          $this->id_user = $id_user;
      }

      /**
      * @return int
      */
      public function getId_specialite()
      {
        return $this->id_specialite;
      }

      /**
      * @param string $specialite
      */
      public function setId_specialite($id_specialite)
      {
        $this->id_specialite = $id_specialite;
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
