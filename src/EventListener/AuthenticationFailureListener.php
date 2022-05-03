<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {


        $response = new JWTAuthenticationFailureResponse('Mauvais identifiants, vérifiez votre email ou votre mot de passe', JsonResponse::HTTP_UNAUTHORIZED);

        $event->setResponse($response);
    }
}
