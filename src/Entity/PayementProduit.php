<?php

namespace App\Entity;

use App\Repository\PayementProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementProduitRepository::class)]
class PayementProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $payementRef = null;

    #[ORM\Column(length: 255)]
    private ?string $tokenStripe = null;

    #[ORM\Column(length: 255)]
    private ?string $stripeBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $stripeLast4 = null;

    #[ORM\Column(length: 255)]
    private ?string $idStripeCharge = null;

    #[ORM\Column(length: 255)]
    private ?string $stripeStatus = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayementRef(): ?string
    {
        return $this->payementRef;
    }

    public function setPayementRef(string $payementRef): self
    {
        $this->payementRef = $payementRef;

        return $this;
    }

    public function getTokenStripe(): ?string
    {
        return $this->tokenStripe;
    }

    public function setTokenStripe(string $tokenStripe): self
    {
        $this->tokenStripe = $tokenStripe;

        return $this;
    }

    public function getStripeBrand(): ?string
    {
        return $this->stripeBrand;
    }

    public function setStripeBrand(string $stripeBrand): self
    {
        $this->stripeBrand = $stripeBrand;

        return $this;
    }

    public function getStripeLast4(): ?string
    {
        return $this->stripeLast4;
    }

    public function setStripeLast4(string $stripeLast4): self
    {
        $this->stripeLast4 = $stripeLast4;

        return $this;
    }

    public function getIdStripeCharge(): ?string
    {
        return $this->idStripeCharge;
    }

    public function setIdStripeCharge(string $idStripeCharge): self
    {
        $this->idStripeCharge = $idStripeCharge;

        return $this;
    }

    public function getStripeStatus(): ?string
    {
        return $this->stripeStatus;
    }

    public function setStripeStatus(string $stripeStatus): self
    {
        $this->stripeStatus = $stripeStatus;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
