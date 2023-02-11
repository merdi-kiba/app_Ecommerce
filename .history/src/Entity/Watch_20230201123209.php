<?php

namespace App\Entity;

use App\Repository\WatchRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



#[ORM\Entity(repositoryClass: WatchRepository::class)]
#[UniqueEntity('name')]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class Watch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(min:2, max:50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    
    private ?int $note = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;
    
    

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $uptdatedAt = null;

    public function __construct()
    {
        
        $this->uptdatedAt = new \DateTimeImmutable();
        $this->createdAt = new \DateTimeImmutable();
        
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

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
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    
    public function setImageFile(?File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if (null !== $image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->uptdatedAt= new \DateTimeImmutable;
        }
    }

    

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function getUptdatedAt(): ?\DateTimeImmutable
    {
        return $this->uptdatedAt;
    }

    public function setUptdatedAt(\DateTimeImmutable $uptdatedAt): self
    {
        $this->uptdatedAt = $uptdatedAt;

        return $this;
    }
}
