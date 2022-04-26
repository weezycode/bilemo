<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 15; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setPseudo($faker->userName())
                ->setEmail($faker->email())
                ->setCustomer($this->getReference('customer1'))
                ->setCreatedAt(new \DateTimeImmutable);
            $manager->persist($user);

            $manager->flush();
        }
    }
}
