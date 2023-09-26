<?php

namespace App\Entity;

use App\Repository\HabitudeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitudeRepository::class)]
class Habitude
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateBrossage = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbBrossage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $nettLangue = null;

    #[ORM\Column(nullable: true)]
    private ?bool $filDentaire = null;

    #[ORM\Column(nullable: true)]
    private ?bool $bainBouche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBrossage(): ?\DateTimeInterface
    {
        return $this->dateBrossage;
    }

    public function setDateBrossage(?\DateTimeInterface $dateBrossage): static
    {
        $this->dateBrossage = $dateBrossage;

        return $this;
    }

    public function getNbBrossage(): ?int
    {
        return $this->nbBrossage;
    }

    public function setNbBrossage(?int $nbBrossage): static
    {
        $this->nbBrossage = $nbBrossage;

        return $this;
    }

    public function isNettLangue(): ?bool
    {
        return $this->nettLangue;
    }

    public function setNettLangue(?bool $nettLangue): static
    {
        $this->nettLangue = $nettLangue;

        return $this;
    }

    public function isFilDentaire(): ?bool
    {
        return $this->filDentaire;
    }

    public function setFilDentaire(?bool $filDentaire): static
    {
        $this->filDentaire = $filDentaire;

        return $this;
    }

    public function isBainBouche(): ?bool
    {
        return $this->bainBouche;
    }

    public function setBainBouche(?bool $bainBouche): static
    {
        $this->bainBouche = $bainBouche;

        return $this;
    }
}
