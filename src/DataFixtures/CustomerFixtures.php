<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CustomerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 15; $i++) {
            $customer = new Customer();
            $customer->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setEmail($faker->email())
                ->setUser($this->getReference('user' . rand(1, 3)))
                ->setCreatedAt(new \DateTimeImmutable);
            $manager->persist($customer);

            $manager->flush();
        }
    }


    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
