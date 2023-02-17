<?php

namespace App\Entity;

use App\Repository\PayementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementRepository::class)]
class Payement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(length: 255)]
    private ?string $curent = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $payementstatut = null;

    #[ORM\ManyToOne(inversedBy: 'payement')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'payement', targetEntity: Watch::class)]
    private Collection $watches;

    public function __construct()
    {
        $this->createdAt= new \ DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurent(): ?string
    {
        return $this->curent;
    }

    public function setCurent(string $curent): self
    {
        $this->curent = $curent;

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

    public function getPayementstatut(): ?string
    {
        return $this->payementstatut;
    }

    public function setPayementstatut(string $payementstatut): self
    {
        $this->payementstatut = $payementstatut;

        return $this;
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

}
