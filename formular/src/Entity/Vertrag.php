<?php

namespace App\Entity;

use App\Repository\VertragRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VertragRepository::class)
 */
class Vertrag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tarif;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startdatum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(?string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartdatum(): ?\DateTimeInterface
    {
        return $this->startdatum;
    }

    public function setStartdatum(?\DateTimeInterface $startdatum): self
    {
        $this->startdatum = $startdatum;

        return $this;
    }
}
