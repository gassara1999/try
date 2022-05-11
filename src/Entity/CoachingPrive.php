<?php

namespace App\Entity;

use App\Repository\CoachingPriveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachingPriveRepository::class)]
class CoachingPrive
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $DateSeance;

    #[ORM\Column(type: 'date')]
    private $DateDebut;

    #[ORM\Column(type: 'date')]
    private $DateFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->DateSeance;
    }

    public function setDateSeance(\DateTimeInterface $DateSeance): self
    {
        $this->DateSeance = $DateSeance;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }
}
