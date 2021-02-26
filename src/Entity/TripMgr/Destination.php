<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
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
    private $cod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="array")
     */
    private $stayingPlace = [];

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Landmark::class, mappedBy="destination")
     */
    private $landmarks;

    /**
     * @ORM\ManyToOne(targetEntity=Trip::class, inversedBy="destinations")
     */
    private $trip;

    public function __construct()
    {
        $this->landmarks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCod(): ?string
    {
        return $this->cod;
    }

    public function setCod(string $cod): self
    {
        $this->cod = $cod;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStayingPlace(): ?array
    {
        return $this->stayingPlace;
    }

    public function setStayingPlace(array $stayingPlace): self
    {
        $this->stayingPlace = $stayingPlace;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Landmark[]
     */
    public function getLandmarks(): Collection
    {
        return $this->landmarks;
    }

    public function addLandmark(Landmark $landmark): self
    {
        if (!$this->landmarks->contains($landmark)) {
            $this->landmarks[] = $landmark;
            $landmark->setDestination($this);
        }

        return $this;
    }

    public function removeLandmark(Landmark $landmark): self
    {
        if ($this->landmarks->removeElement($landmark)) {
            // set the owning side to null (unless already changed)
            if ($landmark->getDestination() === $this) {
                $landmark->setDestination(null);
            }
        }

        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): self
    {
        $this->trip = $trip;

        return $this;
    }
}
