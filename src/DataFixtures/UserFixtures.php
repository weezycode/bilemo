<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Service\MetaData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private  $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $dataUsers = new MetaData();
        foreach ($dataUsers->dataUser() as $users) {
            $user = new User();
            $user->setShopName($users['shopName'])
                ->setFirstName($users['firstName'])
                ->setLastName($users['lastName'])
                ->setEmail($users['shopName'] . "@shop.fr")
                ->setPassword($this->hasher->hashPassword($user, 'pass_1234'))
                ->setCreatedAt(new \DateTimeImmutable);
            $manager->persist($user);
            $manager->flush();
            $this->setReference($users['user'], $user);
        }
    }
}
