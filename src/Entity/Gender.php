<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenderRepository::class)
 */
class Gender
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
     * @ORM\OneToMany(targetEntity=Bike::class, mappedBy="gender")
     */
    private $bikes;

    public function __construct()
    {
        $this->bikes = new ArrayCollection();
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
     * @return Collection|Bike[]
     */
    public function getBikes(): Collection
    {
        return $this->bikes;
    }

    public function addBike(Bike $bike): self
    {
        if (!$this->bikes->contains($bike)) {
            $this->bikes[] = $bike;
            $bike->setGender($this);
        }

        return $this;
    }

    public function removeBike(Bike $bike): self
    {
        if ($this->bikes->removeElement($bike)) {
            // set the owning side to null (unless already changed)
            if ($bike->getGender() === $this) {
                $bike->setGender(null);
            }
        }

        return $this;
    }
}
