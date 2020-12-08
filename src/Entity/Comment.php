<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity=ReportComment::class, mappedBy="target")
     */
    private $reportedBy;

    public function __construct()
    {
        $this->reportedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished(\DateTimeInterface $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * @return Collection|ReportComment[]
     */
    public function getReportedBy(): Collection
    {
        return $this->reportedBy;
    }

    public function addReportedBy(ReportComment $reportedBy): self
    {
        if (!$this->reportedBy->contains($reportedBy)) {
            $this->reportedBy[] = $reportedBy;
            $reportedBy->setTarget($this);
        }

        return $this;
    }

    public function removeReportedBy(ReportComment $reportedBy): self
    {
        if ($this->reportedBy->removeElement($reportedBy)) {
            // set the owning side to null (unless already changed)
            if ($reportedBy->getTarget() === $this) {
                $reportedBy->setTarget(null);
            }
        }

        return $this;
    }
}
