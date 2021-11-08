<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="leModele")
     */
    private $lesVehicules;

    public function __construct()
    {
        $this->lesVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getLesVehicules(): Collection
    {
        return $this->lesVehicules;
    }

    public function addLesVehicule(Vehicule $lesVehicule): self
    {
        if (!$this->lesVehicules->contains($lesVehicule)) {
            $this->lesVehicules[] = $lesVehicule;
            $lesVehicule->setLeModele($this);
        }

        return $this;
    }

    public function removeLesVehicule(Vehicule $lesVehicule): self
    {
        if ($this->lesVehicules->removeElement($lesVehicule)) {
            // set the owning side to null (unless already changed)
            if ($lesVehicule->getLeModele() === $this) {
                $lesVehicule->setLeModele(null);
            }
        }

        return $this;
    }
}
