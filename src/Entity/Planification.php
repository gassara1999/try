<?php

namespace App\Entity;

use App\Repository\PlanificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanificationRepository::class)]
class Planification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $HeureDebut;

    #[ORM\Column(type: 'string', length: 255)]
    private $HeureFin;

    #[ORM\Column(type: 'date')]
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?string
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(string $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->HeureFin;
    }

    public function setHeureFin(string $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
