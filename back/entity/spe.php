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
 protected $nom;

 /**
 * spe constructor
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



}
