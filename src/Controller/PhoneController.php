<?php

namespace App\Controller;

use App\Repository\PhoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PhoneController extends AbstractController
{
    /**
     * @Route("/phones", name = "liste_phones", methods = {"GET"})
     */
    public function phones(PhoneRepository $phoneRepository)
    {
        return $this->json($phoneRepository->findAll(), 200, [], ['groups' => 'phone:list']);
    }

    /**
     * @Route("/phones/{id}", name = "one_phone", methods = {"GET"})
     */
    public function findByOnephones(PhoneRepository $phoneRepository, $id)
    {
        return $this->json($phoneRepository->findOneBy($id), 200, [], ['groups' => 'phone:list']);
    }
}
