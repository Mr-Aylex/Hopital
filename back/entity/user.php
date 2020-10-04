<?php
/**
 * Class user
 */

class user
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $nom;
    /**
     * @var string
     */
    protected $prenom;
    /**
     * @var string
     */
    protected $mail;
    /**
     * @var string
     */
    protected $mdp;
    /**
     * @var string
     */
    protected $role_user;

    /**
     * user constructor.
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
        foreach($donnees as $key => $value){
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
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getRole_user()
    {
        return $this->role_user;
    }

    /**
     * @param string $role_user
     */
    public function setRole_user($role_user)
    {
        $this->role_user = $role_user;
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


}
?>