<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PublicationCategory $publicationCategory = null;

    /**
     * @var Collection<int, PublicatedSubmission>
     */
    #[ORM\OneToMany(targetEntity: PublicatedSubmission::class, mappedBy: 'publication', orphanRemoval: true)]
    private Collection $publicatedSubmissions;

    public function __construct()
    {
        $this->publicatedSubmissions = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPublicationCategory(): ?PublicationCategory
    {
        return $this->publicationCategory;
    }

    public function setPublicationCategory(?PublicationCategory $publicationCategory): static
    {
        $this->publicationCategory = $publicationCategory;

        return $this;
    }

    /**
     * @return Collection<int, PublicatedSubmission>
     */
    public function getPublicatedSubmissions(): Collection
    {
        return $this->publicatedSubmissions;
    }

    public function addPublicatedSubmission(PublicatedSubmission $publicatedSubmission): static
    {
        if (!$this->publicatedSubmissions->contains($publicatedSubmission)) {
            $this->publicatedSubmissions->add($publicatedSubmission);
            $publicatedSubmission->setPublication($this);
        }

        return $this;
    }

    public function removePublicatedSubmission(PublicatedSubmission $publicatedSubmission): static
    {
        if ($this->publicatedSubmissions->removeElement($publicatedSubmission)) {
            // set the owning side to null (unless already changed)
            if ($publicatedSubmission->getPublication() === $this) {
                $publicatedSubmission->setPublication(null);
            }
        }

        return $this;
    }
}
