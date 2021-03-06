<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 */
class Carte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $statistique;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $caracteristique;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $rarete;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $jeu;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $nomphoto;

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

    public function getStatistique(): ?string
    {
        return $this->statistique;
    }

    public function setStatistique(?string $statistique): self
    {
        $this->statistique = $statistique;

        return $this;
    }

    public function getCaracteristique(): ?string
    {
        return $this->caracteristique;
    }

    public function setCaracteristique(?string $caracteristique): self
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getRarete(): ?string
    {
        return $this->rarete;
    }

    public function setRarete(?string $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getJeu(): ?string
    {
        return $this->jeu;
    }

    public function setJeu(?string $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    public function getNomphoto(): ?string
    {
        return $this->nomphoto;
    }

    public function setNomphoto(?string $nomphoto): self
    {
        $this->nomphoto = $nomphoto;

        return $this;
    }
}
