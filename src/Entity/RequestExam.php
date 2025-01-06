<?php

namespace App\Entity;

use App\Repository\RequestExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequestExamRepository::class)]
class RequestExam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $questions = [];

    #[ORM\Column]
    private array $goodAnswers = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $examType = null;

    #[ORM\Column(length: 255)]
    private ?string $maxScore = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $successScore = null;

    /**
     * @var Collection<int, UserExamAttempt>
     */
    #[ORM\OneToMany(targetEntity: UserExamAttempt::class, mappedBy: 'requestExam')]
    private Collection $userExamAttempts;

    public function __construct()
    {
        $this->userExamAttempts = new ArrayCollection();
    }

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

    public function getGoodAnswers(): array
    {
        return $this->goodAnswers;
    }

    public function setGoodAnswers(array $goodAnswers): static
    {
        $this->goodAnswers = $goodAnswers;

        return $this;
    }

    public function getExamType(): ?string
    {
        return $this->examType;
    }

    public function setExamType(?string $examType): static
    {
        $this->examType = $examType;

        return $this;
    }

    public function getMaxScore(): ?string
    {
        return $this->maxScore;
    }

    public function setMaxScore(string $maxScore): static
    {
        $this->maxScore = $maxScore;

        return $this;
    }

    public function getSuccessScore(): ?string
    {
        return $this->successScore;
    }

    public function setSuccessScore(?string $successScore): static
    {
        $this->successScore = $successScore;

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
            $userExamAttempt->setRequestExam($this);
        }

        return $this;
    }

    public function removeUserExamAttempt(UserExamAttempt $userExamAttempt): static
    {
        if ($this->userExamAttempts->removeElement($userExamAttempt)) {
            // set the owning side to null (unless already changed)
            if ($userExamAttempt->getRequestExam() === $this) {
                $userExamAttempt->setRequestExam(null);
            }
        }

        return $this;
    }
}
