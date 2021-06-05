<?php

namespace App\Entity;

use App\Repository\BikeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BikeRepository::class)
 */
class Bike
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
  
    private $details;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recommandation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxsize;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="bikes")
     */
    private $category;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $creationDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSold;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $soldDate;

    /**
     * @ORM\ManyToOne(targetEntity=Propulsion::class, inversedBy="bikes")
     */
    private $propulsion;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="bikes")
     */
    private $gender;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getRecommandation(): ?string
    {
        return $this->recommandation;
    }

    public function setRecommandation(?string $recommandation): self
    {
        $this->recommandation = $recommandation;

        return $this;
    }

    public function getMinSize(): ?int
    {
        return $this->minSize;
    }

    public function setMinSize(?int $minSize): self
    {
        $this->minSize = $minSize;

        return $this;
    }

    public function getMaxsize(): ?int
    {
        return $this->maxsize;
    }

    public function setMaxsize(?int $maxsize): self
    {
        $this->maxsize = $maxsize;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIsSold(): ?bool
    {
        return $this->isSold;
    }

    public function setIsSold(bool $isSold): self
    {
        $this->isSold = $isSold;

        return $this;
    }

    public function getSoldDate(): ?\DateTimeInterface
    {
        return $this->soldDate;
    }

    public function setSoldDate(?\DateTimeInterface $soldDate): self
    {
        $this->soldDate = $soldDate;

        return $this;
    }

    public function getPropulsion(): ?Propulsion
    {
        return $this->propulsion;
    }

    public function setPropulsion(?Propulsion $propulsion): self
    {
        $this->propulsion = $propulsion;

        return $this;
    }

    /**
     * Get the value of details
     */
    public function getDetails(): ?string
    {
        return $this->details;
    }

    /**
     * Set the value of details
     *
     * @return  self
     */
    public function setDetails(?string $details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get the value of size
     */
    public function getSize(): ?string 
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize(?string $size)
    {
        $this->size = $size;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}
