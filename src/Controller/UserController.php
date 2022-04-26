<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as ValidatorValidatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/customers/{id}/users", name = "user_list", methods = {"GET"})
     */
    public function userList(UserRepository $userRepository)
    {
        return $this->json($userRepository->findAll(), 200, [], ['groups' => 'user:list']);
    }

    /**
     * @Route("/customers/{id}/users", name= "add_user", methods ={"POST"})
     */
    public function addUser(Request $request, SerializerInterface $serializerInterface, UserRepository $userRepository, ValidatorValidatorInterface $validator)
    {

        try {

            $jsonData = $request->getContent();
            $data = $serializerInterface->deserialize($jsonData, User::class, 'json');
            $data->setCreatedAt(new \DateTimeImmutable());
            $error = $validator->validate($data);
            if (count($error) > 0) {
                return $this->json(
                    $error,
                    400
                );
            }

            $userRepository->add($data);
            return $this->json($data, 201, [], ['groups' => 'user:list']);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
