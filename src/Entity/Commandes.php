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
     * @ORM\Column(type="integer")
     */
    private $id_plat;
    /**
     * @ORM\Column(type="string")
     */
    private $nom_article;
    /**
     * @ORM\Column(type="integer")
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
     * Commandes constructor.
     * @param $id_com
     * @param $id_plat
     * @param $nom_article
     * @param $id_client
     * @param $nom_client
     * @param $date
     * @param $prix
     */
    public function __construct($id_com, $id_plat, $nom_article, $id_client, $nom_client, $date, $prix)
    {
        $this->id_com = $id_com;
        $this->id_plat = $id_plat;
        $this->nom_article = $nom_article;
        $this->id_client = $id_client;
        $this->nom_client = $nom_client;
        $this->date = $date;
        $this->prix = $prix;
    }

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
    public function getNomArticle()
    {
        return $this->nom_article;
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
