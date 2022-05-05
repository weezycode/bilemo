<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\customer;
use App\Service\MetaData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CustomerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dataCustomers = new MetaData();

        foreach ($dataCustomers->dataCustomer() as $customers) {
            $customer = new Customer();
            $customer->setFirstName($customers['firstName'])
                ->setLastName($customers['lastName'])
                ->setEmail($customers['firstName'] . "@myshop.fr")
                ->setUser($this->getReference('user1'))
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
