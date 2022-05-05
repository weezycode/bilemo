<?php

namespace App\DataPersister;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

final class CustomerDataPersister extends AbstractController implements ContextAwareDataPersisterInterface
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * @return bool
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Customer;
    }
    /**
     * @return bool
     */
    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data
        $data->setCreatedAt(new \DateTimeImmutable())
            ->setUser($this->getUser());
        $this->customerRepository->add($data);
    }
    /**
     * @return bool
     */
    public function remove($data, array $context = [])
    {
        $this->customerRepository->remove($data);
    }
}
