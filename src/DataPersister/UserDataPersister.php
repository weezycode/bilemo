<?php

namespace App\DataPersister;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserDataPersister extends AbstractController implements ContextAwareDataPersisterInterface
{
    private $customerRepository;
    private $hasher;

    public function __construct(UserRepository $customerRepository, UserPasswordHasherInterface $hasher)
    {
        $this->customerRepository = $customerRepository;
        $this->hasher = $hasher;
    }
    public function supports($data, array $context = []): bool
    {
        return $data instanceof User;
    }

    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data
        $data->setCreatedAt(new \DateTimeImmutable())
            ->setPassword($this->hasher->hashPassword($data, $data->getPassword()));
        $this->customerRepository->add($data);
    }

    public function remove($data, array $context = [])
    {
        $this->customerRepository->remove($data);
    }
}
