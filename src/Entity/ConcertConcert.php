<?php

namespace App\Entity;

use App\Repository\ConcertConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertConcertRepository::class)
 */
class ConcertConcert
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictures;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=ConcertBand::class, inversedBy="concertConcerts")
     */
    private $band;

    /**
     * @ORM\ManyToMany(targetEntity=ConcertBand::class, mappedBy="concert")
     */
    private $concertBands;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertHall::class, inversedBy="concertConcerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hall;

    public function __construct()
    {
        $this->band = new ArrayCollection();
        $this->concertBands = new ArrayCollection();
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

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(?string $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|ConcertBand[]
     */
    public function getBand(): Collection
    {
        return $this->band;
    }

    public function addBand(ConcertBand $band): self
    {
        if (!$this->band->contains($band)) {
            $this->band[] = $band;
        }

        return $this;
    }

    public function removeBand(ConcertBand $band): self
    {
        $this->band->removeElement($band);

        return $this;
    }

    /**
     * @return Collection|ConcertBand[]
     */
    public function getConcertBands(): Collection
    {
        return $this->concertBands;
    }

    public function addConcertBand(ConcertBand $concertBand): self
    {
        if (!$this->concertBands->contains($concertBand)) {
            $this->concertBands[] = $concertBand;
            $concertBand->addConcert($this);
        }

        return $this;
    }

    public function removeConcertBand(ConcertBand $concertBand): self
    {
        if ($this->concertBands->removeElement($concertBand)) {
            $concertBand->removeConcert($this);
        }

        return $this;
    }

    public function getHall(): ?ConcertHall
    {
        return $this->hall;
    }

    public function setHall(?ConcertHall $hall): self
    {
        $this->hall = $hall;

        return $this;
    }
}
