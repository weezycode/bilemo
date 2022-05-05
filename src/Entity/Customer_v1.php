<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Hateoas\Configuration\Annotation as Hateoas;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;



#[ORM\Entity(repositoryClass: CustomerRepository::class)]

#[ApiResource(
    routePrefix: 'v1',
    deprecationReason: "Create or read a Customer instead",
    sunset: "10/05/2020",
    attributes: ["pagination_items_per_page" => 5, "security" => "is_granted('ROLE_ADMIN')"],
    normalizationContext: ['groups' => ['list:customer']],
    denormalizationContext: ['groups' => ['create:customer']],
    collectionOperations: [
        'get' => [
            'path' => '/customers',
            "force_eager" => true,
            'normalization_context' => ['groups' => ['list:customer']],
            "security" => "is_granted('ROLE_ADMIN')",
            "security_message" => "la nouvelle version: https://localhost:8000/api/customers !",



        ],
        'post' => [
            'path' => '/customers',
            'denormalization_context' => ['groups' => ['create:customer']],
            "security" => "is_granted('ROLE_ADMIN')",
            "security_message" => "la nouvelle version: https://localhost:8000/api/customers !",
        ],
    ],
    itemOperations: [
        'get' => [
            'path' => '/customers/{id}',
            "force_eager" => true,
            'normalization_context' => ['groups' => ['list:customer']],
            "security" => "is_granted('ROLE_ADMIN')",
            "security_message" => "la nouvelle version: https://localhost:8000/api/customers/{id} !",
        ],
        'delete' => [
            'path' => '/customers/{id}',
            "security" => "is_granted('ROLE_ADMIN')",
        ],
    ],

)]


/**
 * 
 * @UniqueEntity(fields="email",  message="L'adresse email '{{ value }}' existe déja !")
 * 
 */

class Customer_v1
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]


    #[Groups(['list:customer'])]
    private $id;


    #[ORM\Column(type: 'string', length: 255)]
    /**
     * @Assert\NotBlank(message = "Le prénom est obligatoire.")
     */
    #[Groups(['list:customer', 'create:customer'])]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]

    #[ApiProperty(deprecationReason: "Utilisez firstName")]

    private $lastName;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    /**
     * 
     * @Assert\Email(
     *     message = "L'adresse email '{{ value }}' n'est pas valide."
     * )
     * @Assert\NotBlank(message = "L'adresse email est obligatoire.")
     */
    #[Groups(['list:customer', 'create:customer'])]
    private $email;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['list:customer'])]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd-m-Y'])]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: User::class)]


    #[Groups(['list:customer'])]
    private User $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    public function setShopName(string $shopName): self
    {
        $this->shopName = $shopName;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
