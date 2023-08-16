<?php

namespace App\Entity;

use App\Repository\PersonenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonenRepository::class)]
class Personen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vorname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nachname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $strasse = null;

    #[ORM\Column(nullable: true)]
    private ?int $hausnummer = null;

    #[ORM\Column(nullable: true)]
    private ?int $plz = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ort = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $team = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): static
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(?string $nachname): static
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(?string $strasse): static
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getHausnummer(): ?int
    {
        return $this->hausnummer;
    }

    public function setHausnummer(?int $hausnummer): static
    {
        $this->hausnummer = $hausnummer;

        return $this;
    }

    public function getPlz(): ?int
    {
        return $this->plz;
    }

    public function setPlz(?int $plz): static
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(?string $ort): static
    {
        $this->ort = $ort;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(?string $team): static
    {
        $this->team = $team;

        return $this;
    }
}
