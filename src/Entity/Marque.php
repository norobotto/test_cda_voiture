<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Annonce::class)]
    private Collection $Annonces;

    public function __construct()
    {
        $this->Annonces = new ArrayCollection();
    }

    public function __toString()  
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->Annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->Annonces->contains($annonce)) {
            $this->Annonces->add($annonce);
            $annonce->setMarque($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->Annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getMarque() === $this) {
                $annonce->setMarque(null);
            }
        }

        return $this;
    }
}
