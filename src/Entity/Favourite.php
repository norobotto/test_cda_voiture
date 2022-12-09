<?php

namespace App\Entity;

use App\Repository\FavouriteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavouriteRepository::class)]
class Favourite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favourites')]
    private ?User $annonceFav = null;

    #[ORM\ManyToOne(inversedBy: 'favourites')]
    private ?Annonce $usersfav = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceFav(): ?User
    {
        return $this->annonceFav;
    }

    public function setAnnonceFav(?User $annonceFav): self
    {
        $this->annonceFav = $annonceFav;

        return $this;
    }

    public function getUsersfav(): ?Annonce
    {
        return $this->usersfav;
    }

    public function setUsersfav(?Annonce $usersfav): self
    {
        $this->usersfav = $usersfav;

        return $this;
    }
}
