<?php

namespace App\Entity;

use App\Repository\HabitudeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'habitudes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Conseil::class, mappedBy: 'habitudes')]
    private Collection $conseils;

    public function hydrate(array $vals){
        foreach($vals as $cle=>$valeur){
            if(isset($vals[$cle])){
                $nomSet = "set" . ucfirst($cle);
                $this->$nomSet($valeur);
                }
            }
        }
    
    public function __construct(array $init=[]){
        $this->hydrate($init);
        $this->conseils = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Conseil>
     */
    public function getConseils(): Collection
    {
        return $this->conseils;
    }

    public function addConseil(Conseil $conseil): static
    {
        if (!$this->conseils->contains($conseil)) {
            $this->conseils->add($conseil);
            $conseil->addHabitude($this);
        }

        return $this;
    }

    public function removeConseil(Conseil $conseil): static
    {
        if ($this->conseils->removeElement($conseil)) {
            $conseil->removeHabitude($this);
        }

        return $this;
    }


}