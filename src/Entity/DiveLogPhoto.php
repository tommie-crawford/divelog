<?php

namespace App\Entity;

use App\Repository\DiveLogPhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiveLogPhotoRepository::class)]
class DiveLogPhoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $filename = null;

    #[ORM\Column(length: 255)]
    private ?string $originalName = null;

    #[ORM\ManyToOne(inversedBy: 'diveLogPhotos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DiveLog $divelog = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): static
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getDivelog(): ?DiveLog
    {
        return $this->divelog;
    }

    public function setDivelog(?DiveLog $divelog): static
    {
        $this->divelog = $divelog;

        return $this;
    }
}
