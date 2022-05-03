<?php

namespace App\Controller\UserController;


use App\Repository\CustomerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;

#[AsController]

class GetCustomersController extends AbstractController
{


    /**
     * @Route("/customers", name ="user_list", methods = {"GET"})
     */
    public function __invoke(CustomerRepository $customerRepository)
    {
        $user = $this->getUser();


        return $this->json($customerRepository->findByUser($user), JsonResponse::HTTP_OK, [], ['groups' => 'list:customer']);
    }
}
