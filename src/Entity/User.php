<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields = {"email"},
 *     message = "L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide")
     * @Assert\Length(
     *     min = 5,
     *     max = 100,
     *     minMessage = "La taille du nom doit avoir au moins 5 caractères",
     *     maxMessage = "La taille du nom doit au maximum 100 caractères"
     * )
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le prénom ne peut pas être vide")
     *  @Assert\Length(
     *     min = 5,
     *     max = 100,
     *     minMessage = "La taille du prénom doit avoir au moins 5 caractères",
     *     maxMessage = "La taille du prénom doit au maximum 100 caractères"
     * )
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Le pseudo ne peut pas être vide")
     *  @Assert\Length(
     *     min = 5,
     *     max = 50,
     *     minMessage = "La taille du pseudo doit avoir au moins 5 caractères",
     *     maxMessage = "La taille du pseudo doit au maximum 50 caractères"
     * )
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Le email ne peut pas être vide")
     *  @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Image(
     *     maxWidth = 50,
     *     maxWidthMessage = "La largeur de l'image doit être inférieur à 50px",
     *     maxHeight = 50,
     *     maxHeightMessage = "La hauteur de l'image doit être inférieur à 50px",
     *     maxSize = "1024K",
     *     mimeTypesMessage = "Télécharger une image avatar valide"
     * )
     */
    private $avatar;

    /**
     * @orm\Column(type="string", length=70)
     * @Assert\NotBlank(message = "Le mot de passe ne peut pas être vide")
     * @Assert\Length(
     *     min = 8,
     *     minMessage = "La taille du mot de passe doit avoir au moins 8 caractères"
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $resetPassword = null;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $role = "user";

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateConnection;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trick", mappedBy="user")
     */
    private $tricks;

    /**
     * @Assert\EqualTo(propertyPath = "password",
     *     message = "Veuillez confirmer le même mot de passe"
     * )
     */
    private $confirmPassword;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="user")
     */
    private $comments;

    public function __construct()
    {
        $this->tricks = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function getResetPassword()
    {
        return $this->resetPassword;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getDateConnection()
    {
        return $this->dateConnection;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setResetPassword($resetPassword)
    {
        $this->resetPassword = $resetPassword;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setDateConnection($dateConnection)
    {
        $this->dateConnection = $dateConnection;
    }

    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * @return Collection|Trick[]
     */
    public function getTricks(): Collection
    {
        return $this->tricks;
    }

    public function addTrick(Trick $trick): self
    {
        if (!$this->tricks->contains($trick)) {
            $this->tricks[] = $trick;
            $trick->setUser($this);
        }

        return $this;
    }

    public function removeTrick(Trick $trick): self
    {
        if ($this->tricks->contains($trick)) {
            $this->tricks->removeElement($trick);
            // set the owning side to null (unless already changed)
            if ($trick->getUser() === $this) {
                $trick->setUser(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->pseudo;
    }

    public function eraseCredentials()
    { }

    public function getSalt()
    { }

    public function getRoles()
    {
        return ['ROLE_USER'];
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
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }
}
