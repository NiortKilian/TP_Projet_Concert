<?php

namespace App\Entity;

use App\Repository\ConcertHallRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertHallRepository::class)
 */
class ConcertHall
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=ConcertConcert::class, mappedBy="hall")
     */
    private $concertConcerts;

    public function __construct()
    {
        $this->concertConcerts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|ConcertConcert[]
     */
    public function getConcertConcerts(): Collection
    {
        return $this->concertConcerts;
    }

    public function addConcertConcert(ConcertConcert $concertConcert): self
    {
        if (!$this->concertConcerts->contains($concertConcert)) {
            $this->concertConcerts[] = $concertConcert;
            $concertConcert->setHall($this);
        }

        return $this;
    }

    public function removeConcertConcert(ConcertConcert $concertConcert): self
    {
        if ($this->concertConcerts->removeElement($concertConcert)) {
            // set the owning side to null (unless already changed)
            if ($concertConcert->getHall() === $this) {
                $concertConcert->setHall(null);
            }
        }

        return $this;
    }
}
