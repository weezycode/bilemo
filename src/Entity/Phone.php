<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhoneRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
#[ApiResource(

    attributes: ["pagination_items_per_page" => 3],
    collectionOperations: [
        'get' => ["force_eager" => true],

    ],
    itemOperations: [
        'get' => ["force_eager" => true],
    ],
)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    /**
     * @Groups("phones:list")
     */
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    /**
     * @Groups("phones:list")
     */
    private $brand;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    /**
     * @Groups("phones:list")
     */
    private $model;

    #[ORM\Column(type: 'string', length: 100)]
    /**
     * @Groups("phones:list")
     */
    private $color;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2)]
    /**
     * @Groups("phones:list")
     */
    private $price;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    /**
     * @Groups("phones:list")
     */
    private $screenSize;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    /**
     * @Groups("phones:list")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getScreenSize(): ?string
    {
        return $this->screenSize;
    }

    public function setScreenSize(?string $screenSize): self
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
