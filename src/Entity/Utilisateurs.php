<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 */
class Utilisateurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $prenom;


    /**
     * @ORM\Column(type="string", length=64)
     */
    private $nom;

    /**
     * @ORM\Column(type="string")
     */
    private $email;


    /**
     * @ORM\Column(type="string", length=64)
     */
    private $mdp;

    //GETTERS

    /**
     * Produits constructor.
     * @param $id_user
     * @param $prenom
     * @param $nom
     * @param $email
     * @param $mdp
     */
    public function __construct($id_user, $prenom, $nom, $email, $mdp)
    {
        $this->id_user = $id_user;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }
}
