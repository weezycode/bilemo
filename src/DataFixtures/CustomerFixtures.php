<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Service\MetaData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dataCustomers = new MetaData();
        foreach ($dataCustomers->dataCustomer() as $customers) {
            $customer = (new Customer())
                ->setShopName($customers['shopName'])
                ->setFirstName($customers['firstName'])
                ->setLastName($customers['lastName'])
                ->setEmail($customers['shopName'] . "@shop.fr")
                ->setCreatedAt(new \DateTimeImmutable);
            $manager->persist($customer);
            $manager->flush();
            $this->setReference($customers['customer'], $customer);
        }
    }
}
