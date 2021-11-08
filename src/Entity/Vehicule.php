<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $immatriculation;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="lesVehicules")
     */
    private $leModele;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="leVehicule")
     */
    private $LesLocations;

    public function __construct()
    {
        $this->LesLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getLeModele(): ?Modele
    {
        return $this->leModele;
    }

    public function setLeModele(?Modele $leModele): self
    {
        $this->leModele = $leModele;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLesLocations(): Collection
    {
        return $this->LesLocations;
    }

    public function addLesLocation(Location $lesLocation): self
    {
        if (!$this->LesLocations->contains($lesLocation)) {
            $this->LesLocations[] = $lesLocation;
            $lesLocation->setLeVehicule($this);
        }

        return $this;
    }

    public function removeLesLocation(Location $lesLocation): self
    {
        if ($this->LesLocations->removeElement($lesLocation)) {
            // set the owning side to null (unless already changed)
            if ($lesLocation->getLeVehicule() === $this) {
                $lesLocation->setLeVehicule(null);
            }
        }

        return $this;
    }
}
