<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, PassportRequest>
     */
    #[ORM\OneToMany(targetEntity: PassportRequest::class, mappedBy: 'requestedBy', orphanRemoval: true)]
    private Collection $passportRequests;

    /**
     * @var Collection<int, DriverLicenseRequest>
     */
    #[ORM\OneToMany(targetEntity: DriverLicenseRequest::class, mappedBy: 'requestedBy')]
    private Collection $driverLicenseRequests;

    /**
     * @var Collection<int, UserExamAttempt>
     */
    #[ORM\OneToMany(targetEntity: UserExamAttempt::class, mappedBy: 'passedBy')]
    private Collection $userExamAttempts;

    public function __construct()
    {
        $this->passportRequests = new ArrayCollection();
        $this->driverLicenseRequests = new ArrayCollection();
        $this->userExamAttempts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, PassportRequest>
     */
    public function getPassportRequests(): Collection
    {
        return $this->passportRequests;
    }

    public function addPassportRequest(PassportRequest $passportRequest): static
    {
        if (!$this->passportRequests->contains($passportRequest)) {
            $this->passportRequests->add($passportRequest);
            $passportRequest->setRequestedBy($this);
        }

        return $this;
    }

    public function removePassportRequest(PassportRequest $passportRequest): static
    {
        if ($this->passportRequests->removeElement($passportRequest)) {
            // set the owning side to null (unless already changed)
            if ($passportRequest->getRequestedBy() === $this) {
                $passportRequest->setRequestedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DriverLicenseRequest>
     */
    public function getDriverLicenseRequests(): Collection
    {
        return $this->driverLicenseRequests;
    }

    public function addDriverLicenseRequest(DriverLicenseRequest $driverLicenseRequest): static
    {
        if (!$this->driverLicenseRequests->contains($driverLicenseRequest)) {
            $this->driverLicenseRequests->add($driverLicenseRequest);
            $driverLicenseRequest->setRequestedBy($this);
        }

        return $this;
    }

    public function removeDriverLicenseRequest(DriverLicenseRequest $driverLicenseRequest): static
    {
        if ($this->driverLicenseRequests->removeElement($driverLicenseRequest)) {
            // set the owning side to null (unless already changed)
            if ($driverLicenseRequest->getRequestedBy() === $this) {
                $driverLicenseRequest->setRequestedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserExamAttempt>
     */
    public function getUserExamAttempts(): Collection
    {
        return $this->userExamAttempts;
    }

    public function addUserExamAttempt(UserExamAttempt $userExamAttempt): static
    {
        if (!$this->userExamAttempts->contains($userExamAttempt)) {
            $this->userExamAttempts->add($userExamAttempt);
            $userExamAttempt->setPassedBy($this);
        }

        return $this;
    }

    public function removeUserExamAttempt(UserExamAttempt $userExamAttempt): static
    {
        if ($this->userExamAttempts->removeElement($userExamAttempt)) {
            // set the owning side to null (unless already changed)
            if ($userExamAttempt->getPassedBy() === $this) {
                $userExamAttempt->setPassedBy(null);
            }
        }

        return $this;
    }
}
