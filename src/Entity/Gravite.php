<?php

namespace App\Entity;

use App\Repository\GraviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GraviteRepository::class)
 */
class Gravite
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
     * @ORM\OneToMany(targetEntity=Dommage::class, mappedBy="laGravite")
     */
    private $lesDommages;

   

    public function __construct()
    {
        $this->lesDommages = new ArrayCollection();
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
     * @return Collection|Dommage[]
     */
    public function getLesDommages(): Collection
    {
        return $this->lesDommages;
    }

    public function addLesDommage(Dommage $lesDommage): self
    {
        if (!$this->lesDommages->contains($lesDommage)) {
            $this->lesDommages[] = $lesDommage;
            $lesDommage->setLaGravite($this);
        }

        return $this;
    }

    public function removeLesDommage(Dommage $lesDommage): self
    {
        if ($this->lesDommages->removeElement($lesDommage)) {
            // set the owning side to null (unless already changed)
            if ($lesDommage->getLaGravite() === $this) {
                $lesDommage->setLaGravite(null);
            }
        }

        return $this;
    }

   

   

   
}
