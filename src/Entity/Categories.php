<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     *
     */
    private $nom;


    /**
     * Categories constructor.
     * @param $id
     * @param $nom
     */
    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getIdplat()
    {
        return $this->id_plat;
    }


    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $id_plat
     */
    public function setIdplat($id_plat): void
    {
        $this->id_plat = $id_plat;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
