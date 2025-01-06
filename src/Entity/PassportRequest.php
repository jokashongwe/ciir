<?php

namespace App\Entity;

use App\Repository\PassportRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassportRequestRepository::class)]
class PassportRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'passportRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $requestedBy = null;

    #[ORM\Column(length: 255)]
    private ?string $provinceOfOrigin = null;

    #[ORM\Column(length: 255)]
    private ?string $motherName = null;

    #[ORM\Column(length: 255)]
    private ?string $fatherName = null;

    #[ORM\Column(length: 255)]
    private ?string $grandFatherName = null;

    #[ORM\Column(length: 255)]
    private ?string $grandMotherName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passeportPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $identityCardPhoto = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isVerified = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestedBy(): ?User
    {
        return $this->requestedBy;
    }

    public function setRequestedBy(?User $requestedBy): static
    {
        $this->requestedBy = $requestedBy;

        return $this;
    }

    public function getProvinceOfOrigin(): ?string
    {
        return $this->provinceOfOrigin;
    }

    public function setProvinceOfOrigin(string $provinceOfOrigin): static
    {
        $this->provinceOfOrigin = $provinceOfOrigin;

        return $this;
    }

    public function getMotherName(): ?string
    {
        return $this->motherName;
    }

    public function setMotherName(string $motherName): static
    {
        $this->motherName = $motherName;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    public function setFatherName(string $fatherName): static
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    public function getGrandFatherName(): ?string
    {
        return $this->grandFatherName;
    }

    public function setGrandFatherName(string $grandFatherName): static
    {
        $this->grandFatherName = $grandFatherName;

        return $this;
    }

    public function getGrandMotherName(): ?string
    {
        return $this->grandMotherName;
    }

    public function setGrandMotherName(string $grandMotherName): static
    {
        $this->grandMotherName = $grandMotherName;

        return $this;
    }

    public function getPasseportPicture(): ?string
    {
        return $this->passeportPicture;
    }

    public function setPasseportPicture(?string $passeportPicture): static
    {
        $this->passeportPicture = $passeportPicture;

        return $this;
    }

    public function getIdentityCardPhoto(): ?string
    {
        return $this->identityCardPhoto;
    }

    public function setIdentityCardPhoto(?string $identityCardPhoto): static
    {
        $this->identityCardPhoto = $identityCardPhoto;

        return $this;
    }

    public function isVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setVerified(?bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
}
