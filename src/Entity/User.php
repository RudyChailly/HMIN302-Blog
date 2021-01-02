<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"get"})
     * @Assert\NotBlank(
     *   message = "Le pseudo ne peut être nul."
     * )
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Le pseudo est trop court (3 caractères minimum).",
     *      maxMessage = "Le pseudo est trop long (20 caractères maximum)."
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Le mot de passe est trop court (8 caractères minimum).",
     *      maxMessage = "Le mot de passe est trop long (25 caractères maximum)."
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="author", cascade={"remove"})
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="author", cascade={"remove"})
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="followers")
     */
    private $follows;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="follows")
     */
    private $followers;

    /**
     * @ORM\OneToMany(targetEntity=ReportUser::class, mappedBy="author", cascade={"remove"})
     */
    private $reportsUser;

    /**
     * @ORM\OneToMany(targetEntity=ReportUser::class, mappedBy="target", cascade={"remove"})
     */
    private $reportedBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profilePicture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coverPicture;

    /**
     * @ORM\OneToMany(targetEntity=ReportArticle::class, mappedBy="author", cascade={"remove"})
     */
    private $reportsArticle;

    /**
     * @ORM\OneToMany(targetEntity=ReportComment::class, mappedBy="author", cascade={"remove"})
     */
    private $reportsComment;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->follows = new ArrayCollection();
        $this->followers = new ArrayCollection();
        $this->reportsUser = new ArrayCollection();
        $this->reportedBy = new ArrayCollection();
        $this->reportsArticle = new ArrayCollection();
        $this->reportsComment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setAuthor($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getAuthor() === $this) {
                $article->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAuthor($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getAuthor() === $this) {
                $comment->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFollows(): Collection
    {
        return $this->follows;
    }

    public function addFollow(self $follow): self
    {
        if (!$this->follows->contains($follow) && $this->getId() != $follow->getId()) {
            $this->follows[] = $follow;
            $follow->addFollower($this);
        }

        return $this;
    }

    public function removeFollow(self $follow): self
    {
        $this->follows->removeElement($follow);
        $follow->removeFollower($this);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    public function addFollower(self $follower): self
    {
        if (!$this->followers->contains($follower) && $this->getId() != $follower->getId()) {
            $this->followers[] = $follower;
        }

        return $this;
    }

    public function removeFollower(self $follower): self
    {
        $this->followers->removeElement($follower);
        return $this;
    }

    public function isFollowing(self $user) {
        return $this->follows->contains($user);
    }

    public function isAdmin() {
        return (in_array("ROLE_SUPER_ADMIN", $this->getRoles()) || in_array("ROLE_ADMIN", $this->getRoles()));
    }

    public function isSuperAdmin() {
        return (in_array("ROLE_SUPER_ADMIN", $this->getRoles()));
    }

    public function hasAccess(self $utilisateur) {
        return ($this->isAdmin() || ($this->getId() == $utilisateur->getId()));
    }

    /**
     * @return Collection|ReportUser[]
     */
    public function getReportsUser(): Collection
    {
        return $this->reportsUser;
    }

    public function addReportsUser(ReportUser $reportsUser): self
    {
        if (!$this->reportsUser->contains($reportsUser)) {
            $this->reportsUser[] = $reportsUser;
            $reportsUser->setAuthor($this);
        }

        return $this;
    }

    public function removeReportsUser(ReportUser $reportsUser): self
    {
        if ($this->reportsUser->removeElement($reportsUser)) {
            // set the owning side to null (unless already changed)
            if ($reportsUser->getAuthor() === $this) {
                $reportsUser->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReportUser[]
     */
    public function getReportedBy(): Collection
    {
        return $this->reportedBy;
    }

    public function addReportedBy(ReportUser $reportedBy): self
    {
        if (!$this->reportedBy->contains($reportedBy)) {
            $this->reportedBy[] = $reportedBy;
            $reportedBy->setTarget($this);
        }

        return $this;
    }

    public function removeReportedBy(ReportUser $reportedBy): self
    {
        if ($this->reportedBy->removeElement($reportedBy)) {
            // set the owning side to null (unless already changed)
            if ($reportedBy->getTarget() === $this) {
                $reportedBy->setTarget(null);
            }
        }

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        if ($this->profilePicture != null) {
            return $this->profilePicture;
        }
        return "default-avatar.jpg";
    }

    public function setProfilePicture(?string $profilePicture): self
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    public function getCoverPicture(): ?string
    {
        return $this->coverPicture;
    }

    public function setCoverPicture(?string $coverPicture): self
    {
        $this->coverPicture = $coverPicture;

        return $this;
    }

    /**
     * @return Collection|ReportArticle[]
     */
    public function getReportsArticle(): Collection
    {
        return $this->reportsArticle;
    }

    public function addReportsArticle(ReportArticle $reportsArticle): self
    {
        if (!$this->reportsArticle->contains($reportsArticle)) {
            $this->reportsArticle[] = $reportsArticle;
            $reportsArticle->setAuthor($this);
        }

        return $this;
    }

    public function removeReportsArticle(ReportArticle $reportsArticle): self
    {
        if ($this->reportsArticle->removeElement($reportsArticle)) {
            // set the owning side to null (unless already changed)
            if ($reportsArticle->getAuthor() === $this) {
                $reportsArticle->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReportComment[]
     */
    public function getReportsComment(): Collection
    {
        return $this->reportsComment;
    }

    public function addReportsComment(ReportComment $reportsComment): self
    {
        if (!$this->reportsComment->contains($reportsComment)) {
            $this->reportsComment[] = $reportsComment;
            $reportsComment->setAuthor($this);
        }

        return $this;
    }

    public function removeReportsComment(ReportComment $reportsComment): self
    {
        if ($this->reportsComment->removeElement($reportsComment)) {
            // set the owning side to null (unless already changed)
            if ($reportsComment->getAuthor() === $this) {
                $reportsComment->setAuthor(null);
            }
        }

        return $this;
    }
}
