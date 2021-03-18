<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id_plat;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $nom;


    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string")
     */
    private $img_path;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories")
     * @ORM\JoinColumn(name="id_cat", referencedColumnName="id")
     */
    private $id_cat;

    /**
     * Produits constructor.
     * @param $id_plat
     * @param $nom
     * @param $description
     * @param $prix
     * @param $img_path
     * @param $categorie
     */
    public function __construct($id_plat, $nom, $description, $prix, $img_path, $categorie)
    {
        $this->id_plat = $id_plat;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->img_path = $img_path;
        $this->id_cat = $categorie;

    }

    /**
     * @return mixed
     */
    public function getIdcat()
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdcat($id_cat): void
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @param mixed $id_plat
     */
    public function setIdPlat($id_plat): void
    {
        $this->id_plat = $id_plat;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @param mixed $img_path
     */
    public function setImgPath($img_path): void
    {
        $this->img_path = $img_path;
    }



    //GETTERS

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }


    /**
     * @return mixed
     */
    public function getImgPath()
    {
        return $this->img_path;
    }




}
