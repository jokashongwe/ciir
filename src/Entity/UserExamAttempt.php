<?php

namespace App\Entity;

use App\Repository\UserExamAttemptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserExamAttemptRepository::class)]
class UserExamAttempt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $questions = [];

    #[ORM\Column]
    private array $answers = [];

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $resultScore = null;

    #[ORM\Column]
    private ?bool $hasSucceded = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'userExamAttempts')]
    private ?User $passedBy = null;

    #[ORM\ManyToOne(inversedBy: 'userExamAttempts')]
    private ?RequestExam $requestExam = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): static
    {
        $this->questions = $questions;

        return $this;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function setAnswers(array $answers): static
    {
        $this->answers = $answers;

        return $this;
    }

    public function getResultScore(): ?string
    {
        return $this->resultScore;
    }

    public function setResultScore(string $resultScore): static
    {
        $this->resultScore = $resultScore;

        return $this;
    }

    public function hasSucceded(): ?bool
    {
        return $this->hasSucceded;
    }

    public function setHasSucceded(bool $hasSucceded): static
    {
        $this->hasSucceded = $hasSucceded;

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

    public function getPassedBy(): ?User
    {
        return $this->passedBy;
    }

    public function setPassedBy(?User $passedBy): static
    {
        $this->passedBy = $passedBy;

        return $this;
    }

    public function getRequestExam(): ?RequestExam
    {
        return $this->requestExam;
    }

    public function setRequestExam(?RequestExam $requestExam): static
    {
        $this->requestExam = $requestExam;

        return $this;
    }
}
