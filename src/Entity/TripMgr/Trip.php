<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
 */
class Trip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Destination::class, mappedBy="trip")
     */
    private $destinations;

    /**
     * @ORM\Column(type="array")
     */
    private $transportWay = [];

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $stayingDays;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $origin = [];

    public function __construct()
    {
        $this->destinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Destination[]
     */
    public function getDestinations(): Collection
    {
        return $this->destinations;
    }

    public function addDestination(Destination $destination): self
    {
        if (!$this->destinations->contains($destination)) {
            $this->destinations[] = $destination;
            $destination->setTrip($this);
        }

        return $this;
    }

    public function removeDestination(Destination $destination): self
    {
        if ($this->destinations->removeElement($destination)) {
            // set the owning side to null (unless already changed)
            if ($destination->getTrip() === $this) {
                $destination->setTrip(null);
            }
        }

        return $this;
    }

    public function getTransportWay(): ?array
    {
        return $this->transportWay;
    }

    public function setTransportWay(array $transportWay): self
    {
        $this->transportWay = $transportWay;

        return $this;
    }

    public function getStayingDays(): ?int
    {
        return $this->stayingDays;
    }

    public function setStayingDays(?int $stayingDays): self
    {
        $this->stayingDays = $stayingDays;

        return $this;
    }

    public function getOrigin(): ?array
    {
        return $this->origin;
    }

    public function setOrigin(?array $origin): self
    {
        $this->origin = $origin;

        return $this;
    }
}
