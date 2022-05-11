<?php

namespace App\Entity;

use App\Repository\CoachesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachesRepository::class)]
class Coaches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NomCoach;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'date')]
    private $birthday;

    #[ORM\Column(type: 'string', length: 255)]
    private $salary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCoach(): ?string
    {
        return $this->NomCoach;
    }

    public function setNomCoach(string $NomCoach): self
    {
        $this->NomCoach = $NomCoach;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }
}
