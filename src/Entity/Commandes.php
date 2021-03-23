<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_com;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produits")
     * @ORM\JoinColumn(name="id_plat", referencedColumnName="id")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom_plat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateurs")
     * @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     */
    private $id_client;

    /**
     * @ORM\Column(type="string")
     */
    private $nom_client;
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
     * @ORM\Column(type="integer")
     */
    private $prix;


    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->id_com;
    }

    /**
     * @return mixed
     */
    public function getIdPlat()
    {
        return $this->id_plat;
    }

    /**
     * @return mixed
     */
    public function getNomPlat()
    {
        return $this->nom_plat;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * @return mixed
     */
    public function getNomClient()
    {
        return $this->nom_client;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }



}
