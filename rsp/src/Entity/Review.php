<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $timeliness = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $interest = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $usefulness = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $originality = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $professionalLevel = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $languageLevel = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $stylisticLevel = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $evaluation = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $reviewer = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Submission $submission = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeliness(): ?int
    {
        return $this->timeliness;
    }

    public function setTimeliness(int $timeliness): static
    {
        $this->timeliness = $timeliness;

        return $this;
    }

    public function getInterest(): ?int
    {
        return $this->interest;
    }

    public function setInterest(int $interest): static
    {
        $this->interest = $interest;

        return $this;
    }

    public function getUsefulness(): ?int
    {
        return $this->usefulness;
    }

    public function setUsefulness(int $usefulness): static
    {
        $this->usefulness = $usefulness;

        return $this;
    }

    public function getOriginality(): ?int
    {
        return $this->originality;
    }

    public function setOriginality(int $originality): static
    {
        $this->originality = $originality;

        return $this;
    }

    public function getProfessionalLevel(): ?int
    {
        return $this->professionalLevel;
    }

    public function setProfessionalLevel(int $professionalLevel): static
    {
        $this->professionalLevel = $professionalLevel;

        return $this;
    }

    public function getLanguageLevel(): ?int
    {
        return $this->languageLevel;
    }

    public function setLanguageLevel(int $languageLevel): static
    {
        $this->languageLevel = $languageLevel;

        return $this;
    }

    public function getStylisticLevel(): ?int
    {
        return $this->stylisticLevel;
    }

    public function setStylisticLevel(int $stylisticLevel): static
    {
        $this->stylisticLevel = $stylisticLevel;

        return $this;
    }

    public function getEvaluation(): ?int
    {
        return $this->evaluation;
    }

    public function setEvaluation(int $evaluation): static
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getReviewer(): ?User
    {
        return $this->reviewer;
    }

    public function setReviewer(?User $reviewer): static
    {
        $this->reviewer = $reviewer;

        return $this;
    }

    public function getSubmission(): ?Submission
    {
        return $this->submission;
    }

    public function setSubmission(?Submission $submission): static
    {
        $this->submission = $submission;

        return $this;
    }

}