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
     * @var Collection<int, SubmitedFile>
     */
    #[ORM\OneToMany(targetEntity: SubmitedFile::class, mappedBy: 'submission')]
    private Collection $submitedFiles;

    #[ORM\ManyToOne(inversedBy: 'submissions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Author $author = null;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'submission', orphanRemoval: true)]
    private Collection $reviews;

    /**
     * @var Collection<int, ReviewSubmission>
     */
    #[ORM\OneToMany(targetEntity: ReviewSubmission::class, mappedBy: 'submission', orphanRemoval: true)]
    private Collection $reviewSubmissions;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->submitedFiles = new ArrayCollection();
        $this->reviewSubmissions = new ArrayCollection();
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
     * @return Collection<int, SubmitedFile>
     */
    public function getSubmitedFiles(): Collection
    {
        return $this->submitedFiles;
    }

    public function addSubmitedFiles(SubmitedFile $submissionFile): static
    {
        if (!$this->submitedFiles->contains($submissionFile)) {
            $this->submitedFiles->add($submissionFile);
            $submissionFile->setSubmission($this);
        }

        return $this;
    }

    public function removeSubmitedFile(SubmitedFile $submitedFile): static
    {
        if ($this->submitedFiles->removeElement($submitedFile)) {
            if ($submitedFile->getSubmission() === $this) {
                $submitedFile->setSubmission(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;

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
     * @return Collection<int, ReviewSubmission>
     */
    public function getReviewSubmissions(): Collection
    {
        return $this->reviewSubmissions;
    }

    public function addReviewSubmission(ReviewSubmission $reviewSubmission): static
    {
        if (!$this->reviewSubmissions->contains($reviewSubmission)) {
            $this->reviewSubmissions->add($reviewSubmission);
            $reviewSubmission->setSubmission($this);
        }

        return $this;
    }

    public function removeReviewSubmission(ReviewSubmission $reviewSubmission): static
    {
        if ($this->reviewSubmissions->removeElement($reviewSubmission)) {
            // set the owning side to null (unless already changed)
            if ($reviewSubmission->getSubmission() === $this) {
                $reviewSubmission->setSubmission(null);
            }
        }

        return $this;
    }
}
