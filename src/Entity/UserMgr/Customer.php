<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $pasaport;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numTarj;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="customers")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getPasaport(): ?string
    {
        return $this->pasaport;
    }

    public function setPasaport(string $pasaport): self
    {
        $this->pasaport = $pasaport;

        return $this;
    }

    public function getNumTarj(): ?int
    {
        return $this->numTarj;
    }

    public function setNumTarj(int $numTarj): self
    {
        $this->numTarj = $numTarj;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
