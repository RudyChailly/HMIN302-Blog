<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"get"}},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $urlAlias;

    /**
     * @ORM\Column(type="text")
     * @Groups({"get"})
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"get"})
     */
    private $published;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"get"})
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"get"})
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="article")
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * @ORM\OneToMany(targetEntity=ReportArticle::class, mappedBy="target")
     */
    private $reportedBy;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->reportedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUrlAlias(): ?string
    {
        return $this->urlAlias;
    }

    public function setUrlAlias(string $urlAlias): self
    {
        $this->urlAlias = $urlAlias;

        return $this;
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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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

    /**
     * @return Collection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArticle($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getArticle() === $this) {
                $comment->setArticle(null);
            }
        }

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return Collection|ReportArticle[]
     */
    public function getReportedBy()
    {
        return $this->reportedBy;
    }

    public function setReportedBy($reportedBy): self
    {
        $this->reportedBy = $reportedBy;

        return $this;
    }

    public function addReportedBy(ReportArticle $reportedBy): self
    {
        if (!$this->reportedBy->contains($reportedBy)) {
            $this->reportedBy[] = $reportedBy;
            $reportedBy->setTarget($this);
        }

        return $this;
    }

    public function removeReportedBy(ReportArticle $reportedBy): self
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
