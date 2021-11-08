<?php

namespace App\Entity;

use App\Repository\ControleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ControleRepository::class)
 */
class Controle
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
    private $dateControle;

    /**
     * @ORM\ManyToOne(targetEntity=Salarie::class, inversedBy="lesControles")
     */
    private $leSalarie;

    

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="lesControles")
     */
    private $laLocation;

    /**
     * @ORM\OneToMany(targetEntity=Dommage::class, mappedBy="leControle")
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

    public function getDateControle(): ?\DateTimeInterface
    {
        return $this->dateControle;
    }

    public function setDateControle(\DateTimeInterface $dateControle): self
    {
        $this->dateControle = $dateControle;

        return $this;
    }

    public function getLeSalarie(): ?Salarie
    {
        return $this->leSalarie;
    }

    public function setLeSalarie(?Salarie $leSalarie): self
    {
        $this->leSalarie = $leSalarie;

        return $this;
    }

   

    public function getLaLocation(): ?Location
    {
        return $this->laLocation;
    }

    public function setLaLocation(?Location $laLocation): self
    {
        $this->laLocation = $laLocation;

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
            $lesDommage->setLeControle($this);
        }

        return $this;
    }

    public function removeLesDommage(Dommage $lesDommage): self
    {
        if ($this->lesDommages->removeElement($lesDommage)) {
            // set the owning side to null (unless already changed)
            if ($lesDommage->getLeControle() === $this) {
                $lesDommage->setLeControle(null);
            }
        }

        return $this;
    }
}
