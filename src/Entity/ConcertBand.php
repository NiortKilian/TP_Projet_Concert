<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class ConcertBand
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
    private $picture;


    /**
     * @ORM\OneToMany(targetEntity=ConcertArtist::class, mappedBy="band")
     */
    private $concertArtists;

    /**
     * @ORM\ManyToMany(targetEntity=ConcertStyle::class, inversedBy="concertBands")
     */
    private $style;

    /**
     * @ORM\ManyToMany(targetEntity=ConcertConcert::class, mappedBy="band")
     */
    private $concertConcerts;

    /**
     * @ORM\ManyToMany(targetEntity=ConcertConcert::class, inversedBy="concertBands")
     */
    private $concert;

    /**
     * @ORM\OneToMany(targetEntity=ConcertArtist::class, mappedBy="concertBand")
     */
    private $artists;

    public function __construct()
    {
        $this->concertArtists = new ArrayCollection();
        $this->style = new ArrayCollection();
        $this->concertConcerts = new ArrayCollection();
        $this->concert = new ArrayCollection();
        $this->artists = new ArrayCollection();
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|ConcertArtist[]
     */
    public function getConcertArtists(): Collection
    {
        return $this->concertArtists;
    }

    public function addConcertArtist(ConcertArtist $concertArtist): self
    {
        if (!$this->concertArtists->contains($concertArtist)) {
            $this->concertArtists[] = $concertArtist;
            $concertArtist->setBand($this);
        }

        return $this;
    }

    public function removeConcertArtist(ConcertArtist $concertArtist): self
    {
        if ($this->concertArtists->removeElement($concertArtist)) {
            // set the owning side to null (unless already changed)
            if ($concertArtist->getBand() === $this) {
                $concertArtist->setBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ConcertStyle[]
     */
    public function getStyle(): Collection
    {
        return $this->style;
    }

    public function addStyle(ConcertStyle $style): self
    {
        if (!$this->style->contains($style)) {
            $this->style[] = $style;
        }

        return $this;
    }

    public function removeStyle(ConcertStyle $style): self
    {
        $this->style->removeElement($style);

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
            $concertConcert->addBand($this);
        }

        return $this;
    }

    public function removeConcertConcert(ConcertConcert $concertConcert): self
    {
        if ($this->concertConcerts->removeElement($concertConcert)) {
            $concertConcert->removeBand($this);
        }

        return $this;
    }

    /**
     * @return Collection|ConcertConcert[]
     */
    public function getConcert(): Collection
    {
        return $this->concert;
    }

    public function addConcert(ConcertConcert $concert): self
    {
        if (!$this->concert->contains($concert)) {
            $this->concert[] = $concert;
        }

        return $this;
    }

    public function removeConcert(ConcertConcert $concert): self
    {
        $this->concert->removeElement($concert);

        return $this;
    }

    /**
     * @return Collection|ConcertArtist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(ConcertArtist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
            $artist->setConcertBand($this);
        }

        return $this;
    }

    public function removeArtist(ConcertArtist $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            // set the owning side to null (unless already changed)
            if ($artist->getConcertBand() === $this) {
                $artist->setConcertBand(null);
            }
        }

        return $this;
    }
}
