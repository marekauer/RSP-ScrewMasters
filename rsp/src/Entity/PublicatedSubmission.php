<?php

namespace App\Entity;

use App\Repository\PublicatedSubmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicatedSubmissionRepository::class)]
class PublicatedSubmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Submission $submission = null;

    #[ORM\ManyToOne(inversedBy: 'publicatedSubmissions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Publication $publication = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $publicatedAt = null;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubmission(): ?Submission
    {
        return $this->submission;
    }

    public function setSubmission(Submission $submission): static
    {
        $this->submission = $submission;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): static
    {
        $this->publication = $publication;

        return $this;
    }

    public function getPublicatedAt(): ?\DateTimeImmutable
    {
        return $this->publicatedAt;
    }

    public function setPublicatedAt(\DateTimeImmutable $publicatedAt): static
    {
        $this->publicatedAt = $publicatedAt;

        return $this;
    }

}