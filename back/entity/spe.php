<?php


class spe
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $nom_spe;

    /**
     * spe constructor.
     * @param $array
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
        foreach($donnees as $key => $value){
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
     * @return string
     */
    public function getNom_spe()
    {
        return $this->nom_spe;
    }

    /**
     * @param string $nom_spe
     */
    public function setNom_spe($nom_spe)
    {
        $this->nom_spe = $nom_spe;
    }

}