<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DocumentationController extends AbstractController
{
    /**
     * @Route("/", name = "api_doc")
     */
    public function home()
    {
        // return $this->redirectToRoute('api_entrypoint');
    }
}
