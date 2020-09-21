<?php


class spe
{
    /**
     * spe constructor.
     * @param int $id
     * @param string $nom
     */
    public function __construct($id, $nom)
    {
        $this->setId($id);
        $this->setNom($nom);
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
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $nom;
}