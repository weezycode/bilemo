<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use App\Service\MetaData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PhoneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dataPhones = new MetaData();

        foreach ($dataPhones->dataPhone() as $phones) {
            $phone = new Phone();
            $phone->setBrand($phones['brand'])
                ->setModel($phones['model'])
                ->setColor($phones['color'])
                ->setPrice($phones['price'])
                ->setScreenSize($phones['screenSize'])
                ->setDescription($phones['description']);
            $manager->persist($phone);

            $manager->flush();
        }
    }
}
