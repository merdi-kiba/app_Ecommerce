<?php

namespace App\Entity;

use App\Repository\CommendeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommendeRepository::class)]
class Commende
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commendes')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'commendes')]
    private ?Watch $produits = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 300)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $numeroTel = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isValide = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPayer = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProduits(): ?Watch
    {
        return $this->produits;
    }

    public function setProduits(?Watch $produits): self
    {
        $this->produits = $produits;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumeroTel(): ?int
    {
        return $this->numeroTel;
    }

    public function setNumeroTel(int $numeroTel): self
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    public function isIsValide(): ?bool
    {
        return $this->isValide;
    }

    public function setIsValide(?bool $isValide): self
    {
        $this->isValide = $isValide;

        return $this;
    }

    public function isIsPayer(): ?bool
    {
        return $this->isPayer;
    }

    public function setIsPayer(?bool $isPayer): self
    {
        $this->isPayer = $isPayer;

        return $this;
    }
}
