<?php

namespace App\Entity;

use App\Repository\SubmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubmissionRepository::class)]
class Submission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'submission')]
    private Collection $reviews;

    /**
     * @var Collection<int, SubmitedFile>
     */
    #[ORM\OneToMany(targetEntity: SubmitedFile::class, mappedBy: 'submission')]
    private Collection $submissionFiles;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->submissionFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

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

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setSubmission($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getSubmission() === $this) {
                $review->setSubmission(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SubmitedFile>
     */
    public function getSubmissionFiles(): Collection
    {
        return $this->submissionFiles;
    }

    public function addSubmissionFile(SubmitedFile $submissionFile): static
    {
        if (!$this->submissionFiles->contains($submissionFile)) {
            $this->submissionFiles->add($submissionFile);
            $submissionFile->setSubmission($this);
        }

        return $this;
    }

    public function removeSubmissionFile(SubmitedFile $submissionFile): static
    {
        if ($this->submissionFiles->removeElement($submissionFile)) {
            // set the owning side to null (unless already changed)
            if ($submissionFile->getSubmission() === $this) {
                $submissionFile->setSubmission(null);
            }
        }

        return $this;
    }
}
