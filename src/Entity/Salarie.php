<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalarieRepository::class)
 */
class Salarie
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=Controle::class, mappedBy="leSalarie")
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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
            $lesControle->setLeSalarie($this);
        }

        return $this;
    }

    public function removeLesControle(Controle $lesControle): self
    {
        if ($this->lesControles->removeElement($lesControle)) {
            // set the owning side to null (unless already changed)
            if ($lesControle->getLeSalarie() === $this) {
                $lesControle->setLeSalarie(null);
            }
        }

        return $this;
    }
}
