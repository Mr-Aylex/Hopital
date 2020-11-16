<?php


class rdv
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $id_motif;
    /**
     * @var int
     */
    protected $id_medecin;
    /**
     * @var int
     */
    protected $id_patient;
    /**
     * @var Date
     */
    protected $date_rdv;
    /**
     * @var int
     */
    protected $heure_id;

    /**
     * rdv constructor.
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
     * @return int
     */
    public function getId_motif()
    {
        return $this->id_motif;
    }

    /**
     * @param int $id_motif
     */
    public function setId_motif($id_motif)
    {
        $this->id_motif = $id_motif;
    }

    /**
     * @return int
     */
    public function getId_medecin()
    {
        return $this->id_medecin;
    }

    /**
     * @param int $id_medecin
     */
    public function setId_medecin($id_medecin)
    {
        $this->id_medecin = $id_medecin;
    }

    /**
     * @return int
     */
    public function getId_patient()
    {
        return $this->id_patient;
    }

    /**
     * @param int $id_patient
     */
    public function setId_patient($id_patient)
    {
        $this->id_patient = $id_patient;
    }

    /**
     * @return Date
     */
    public function getDate_rdv()
    {
        return $this->date_rdv;
    }

    /**
     * @param Date $date_rdv
     */
    public function setDate_rdv($date_rdv)
    {
        $this->date_rdv = $date_rdv;
    }

    /**
     * @return int
     */
    public function getHeure_id()
    {
        return $this->heure_id;
    }

    /**
     * @param int $heure_id
     */
    public function setHeure_id($heure_id)
    {
        $this->heure_id = $heure_id;
    }

}
