<?php

namespace App\Entity;

use App\Repository\DriverLicenseRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverLicenseRequestRepository::class)]
class DriverLicenseRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'driverLicenseRequests')]
    private ?User $requestedBy = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $currentScore = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $previousScore = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastExamDate = null;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCurrentScore(): ?string
    {
        return $this->currentScore;
    }

    public function setCurrentScore(?string $currentScore): static
    {
        $this->currentScore = $currentScore;

        return $this;
    }

    public function getPreviousScore(): ?string
    {
        return $this->previousScore;
    }

    public function setPreviousScore(?string $previousScore): static
    {
        $this->previousScore = $previousScore;

        return $this;
    }

    public function getLastExamDate(): ?\DateTimeInterface
    {
        return $this->lastExamDate;
    }

    public function setLastExamDate(?\DateTimeInterface $lastExamDate): static
    {
        $this->lastExamDate = $lastExamDate;

        return $this;
    }
}
