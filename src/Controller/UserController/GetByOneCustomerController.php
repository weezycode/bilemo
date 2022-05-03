<?php

namespace App\Controller\UserController;

use App\Repository\CustomerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]

class GetByOneCustomerController extends AbstractController
{


    public function __invoke(CustomerRepository $customerRepository, $id)
    {
        $user = $this->getUser();
        $customerId = $customerRepository->findOneByCustomer($id, $user);

        if ($customerId === false) {
            return $this->json([
                'status' => JsonResponse::HTTP_NOT_FOUND,
                'message' => 'Cet utilisateur n\'exsite pas !',
            ], 404);
        }
        return $this->json($customerId, JsonResponse::HTTP_OK, [], ['groups' => 'list:customer']);
    }
}
