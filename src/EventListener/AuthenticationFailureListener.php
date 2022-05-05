<?php

namespace App\EventListener;

use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Symfony\Component\Security\Core\Exception\TooManyLoginAttemptsAuthenticationException;

class AuthenticationFailureListener extends AbstractController
{


    /**
     * @param AuthenticationFailureEvent $event
     * @param $request
     */
    public function onAuthenticationFailureResponse()
    {


        //     $response = new JWTAuthenticationFailureResponse('Mauvais identifiants, vérifiez votre email ou votre mot de passe');

        // $event->setResponse($response);
    }
    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {

        $code = 403;
        $message = 'FORBIDDEN';
        if ($exception instanceof TooManyLoginAttemptsAuthenticationException) {
            $code = Response::HTTP_UNAUTHORIZED;
            $message = 'Too many failed login attempts, please try again in a few minutes.';
            $MessageData = $exception->getMessageData();
            if (is_array($MessageData)) {
                if (key_exists('%minutes%', $MessageData)) {
                    $message = $exception->getMessageKey();
                    $message = str_replace("%minutes%", $MessageData['%minutes%'], $message);
                }
            }
        } else if ($exception instanceof BadCredentialsException) {
            $code = 401;
            $message = $exception->getMessage();
        }
        return new JsonResponse(['error' => $message], $code);
    }
}
