<?php

namespace App\Entity;

use App\Repository\ConcertStyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertStyleRepository::class)
 */
class ConcertStyle
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
     * @ORM\ManyToMany(targetEntity=ConcertBand::class, mappedBy="style")
     */
    private $concertBands;

    public function __construct()
    {
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
            $concertBand->addStyle($this);
        }

        return $this;
    }

    public function removeConcertBand(ConcertBand $concertBand): self
    {
        if ($this->concertBands->removeElement($concertBand)) {
            $concertBand->removeStyle($this);
        }

        return $this;
    }
}
