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
    protected $motif;
    /**
     * @var string
     */
    protected $id_patient;
    /**
     * @var \mysql_xdevapi\DatabaseObject
     */
    protected $date_rdv;

    /**
     * rdv constructor.
     * @param int $id
     * @param string $motif
     * @param int $id_patient
     * @param \mysql_xdevapi\DatabaseObject $date_rdv
     */
    public function __construct($id, $id_patient, \mysql_xdevapi\DatabaseObject $date_rdv)
    {
        $this->id = $id;
        $this->motif = $motif;
        $this->id_patient = $id_patient;
        $this->date_rdv = $date_rdv;
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
     public function getMotif()
     {
        return $this->motif;
     }

    /**
     * @param string $motif
     */
     public function setMotif($motif)
     {
       $this->motif = $motif;
     }

    /**
     * @return int
     */
    public function getIdPatient()
    {
        return $this->id_patient;
    }

    /**
     * @param int $id_patient
     */
    public function setIdPatient($id_patient)
    {
        $this->id_patient = $id_patient;
    }

    /**
     * @return \mysql_xdevapi\DatabaseObject
     */
    public function getDateRdv()
    {
        return $this->date_rdv;
    }

    /**
     * @param \mysql_xdevapi\DatabaseObject $date_rdv
     */
    public function setDateRdv($date_rdv)
    {
        $this->date_rdv = $date_rdv;
    }

}
