<?php

namespace App\Entity;

use App\Repository\DommageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DommageRepository::class)
 */
class Dommage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Gravite::class, inversedBy="lesDommages")
     */
    private $laGravite;

    /**
     * @ORM\ManyToOne(targetEntity=Element::class, inversedBy="lesDommages")
     */
    private $lElement;

    /**
     * @ORM\ManyToOne(targetEntity=Controle::class, inversedBy="lesDommages")
     */
    private $leControle;
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLaGravite(): ?Gravite
    {
        return $this->laGravite;
    }

    public function setLaGravite(?Gravite $laGravite): self
    {
        $this->laGravite = $laGravite;

        return $this;
    }

    public function getLElement(): ?Element
    {
        return $this->lElement;
    }

    public function setLElement(?Element $lElement): self
    {
        $this->lElement = $lElement;

        return $this;
    }

    public function getLeControle(): ?Controle
    {
        return $this->leControle;
    }

    public function setLeControle(?Controle $leControle): self
    {
        $this->leControle = $leControle;

        return $this;
    }

  

}
