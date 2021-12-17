<?php

namespace App\Entity;

use App\Repository\ConcertArtistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertArtistRepository::class)
 */
class ConcertArtist
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
    private $first_name;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertBand::class, inversedBy="concertArtists")
     * @ORM\JoinColumn(nullable=true)
     */
    private $band;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertBand::class, inversedBy="artists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $concertBand;

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

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getBand(): ?ConcertBand
    {
        return $this->band;
    }

    public function setBand(?ConcertBand $band): self
    {
        $this->band = $band;

        return $this;
    }

    public function getConcertBand(): ?ConcertBand
    {
        return $this->concertBand;
    }

    public function setConcertBand(?ConcertBand $concertBand): self
    {
        $this->concertBand = $concertBand;

        return $this;
    }
}
