<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertRepository::class)
 */
class Concert
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
     * @ORM\ManyToOne(targetEntity=concert::class, inversedBy="concerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $band;

    /**
     * @ORM\ManyToOne(targetEntity=Hall::class, inversedBy="concerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hall;

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

    public function getBand(): ?band
    {
        return $this->band;
    }

    public function setBand(?band $band): self
    {
        $this->band = $band;

        return $this;
    }

    public function getHall(): ?hall
    {
        return $this->hall;
    }

    public function setHall(?hall $hall): self
    {
        $this->hall = $hall;

        return $this;
    }
}
