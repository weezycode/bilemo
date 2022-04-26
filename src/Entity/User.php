<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\UserController;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: UserRepository::class)]

/**
 * @UniqueEntity(fields="email",  message="L'adresse email '{{ value }}' existe déja !")
 * @UniqueEntity(fields="pseudo",  message="Le pseudo '{{ value }}' existe déjà !")
 */
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    /**
     * @Groups("user:list")
     */
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    /**
     * 
     * @Assert\Email(
     *     message = "L'adresse email '{{ value }}' n'est pas valide."
     * )
     * @Assert\NotBlank(message = "L'adresse email est obligatoire.")
     * @Groups("user:list")
     */
    private $email;

    #[ORM\Column(type: 'json')]

    private $roles = [];

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Groups("user:list")
     * @Assert\NotBlank(message = "Le prénom est obligatoire.")
     */
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Groups("user:list")
     * @Assert\NotBlank(message = "Le nom est obligatoire.")
     */
    private $lastName;

    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Groups("user:list")
     * @Assert\NotBlank(message = "Le pseudo est obligatoire.")
     */
    private $pseudo;

    #[ORM\Column(type: 'datetime_immutable')]
    /**
     * @Groups("user:list")
     */
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'user')]
    /**
     * @Groups("user:list")
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
