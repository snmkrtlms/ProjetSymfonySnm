<?php

namespace App\Entity;

use App\Repository\ConseilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseilRepository::class)]
class Conseil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageCons = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contenu = null;

    #[ORM\ManyToMany(targetEntity: Habitude::class, inversedBy: 'conseils')]
    private Collection $habitude;

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
        $this->habitude = new ArrayCollection();      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageCons(): ?string
    {
        return $this->imageCons;
    }

    public function setImageCons(?string $imageCons): static
    {
        $this->imageCons = $imageCons;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * @return Collection<int, Habitude>
     */
    public function getHabitude(): Collection
    {
        return $this->habitude;
    }

    public function addHabitude(Habitude $habitude): static
    {
        if (!$this->habitude->contains($habitude)) {
            $this->habitude->add($habitude);
        }

        return $this;
    }

    public function removeHabitude(Habitude $habitude): static
    {
        $this->habitude->removeElement($habitude);

        return $this;
    }
}
