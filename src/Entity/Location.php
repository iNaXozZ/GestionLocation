<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLocation;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="LesLocations")
     */
    private $leVehicule;

    /**
     * @ORM\OneToMany(targetEntity=Controle::class, mappedBy="laLocation")
     */
    private $lesControles;

    public function __construct()
    {
        $this->lesControles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->dateLocation;
    }

    public function setDateLocation(\DateTimeInterface $dateLocation): self
    {
        $this->dateLocation = $dateLocation;

        return $this;
    }

    public function getLeVehicule(): ?Vehicule
    {
        return $this->leVehicule;
    }

    public function setLeVehicule(?Vehicule $leVehicule): self
    {
        $this->leVehicule = $leVehicule;

        return $this;
    }

    /**
     * @return Collection|Controle[]
     */
    public function getLesControles(): Collection
    {
        return $this->lesControles;
    }

    public function addLesControle(Controle $lesControle): self
    {
        if (!$this->lesControles->contains($lesControle)) {
            $this->lesControles[] = $lesControle;
            $lesControle->setLaLocation($this);
        }

        return $this;
    }

    public function removeLesControle(Controle $lesControle): self
    {
        if ($this->lesControles->removeElement($lesControle)) {
            // set the owning side to null (unless already changed)
            if ($lesControle->getLaLocation() === $this) {
                $lesControle->setLaLocation(null);
            }
        }

        return $this;
    }
}
