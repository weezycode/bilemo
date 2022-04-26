<?php

declare(strict_types=1);

namespace App\Service;

class MetaData
{

    public function dataPhone()
    {
        $phones = [
            ['brand' => 'Samsung', 'model' => 'Galaxie S22', 'color' => 'Noir', 'price' => 859, 'screenSize' => '6.8', 'description' => 'Smart Android version Fr'],

            ['brand' => 'Oppo', 'model' => 'Reno 6', 'color' => 'Gris', 'price' => 399.99, 'screenSize' => '6.43', 'description' => 'Charge Rapide cam 64 MP'],

            ['brand' => 'Xiaomi', 'model' => 'Redmi Note 11', 'color' => 'Blanc', 'price' => 199.99, 'screenSize' => '6.43', 'description' => 'Amoled Dotdisplay, Snapdragon 680, Quadruple caméra IA '],

            ['brand' => 'Apple', 'model' => 'Iphone 13 pro Max', 'color' => 'Gris', 'price' => 1839.55, 'screenSize' => '7.2', 'description' => '1to Graphite, Design unique'],

            ['brand' => 'Samsung', 'model' => 'Galaxy Z Fold3', 'color' => 'Noir', 'price' => 1349, 'screenSize' => '7.6', 'description' => ' Écran Infinity Flex de 7,6 pouces'],
        ];
        return $phones;
    }

    public function dataUser()
    {
        $names = [
            ['firstName' => 'Mariame', 'lastName' => 'Bal'],
            ['firstName' => 'Albert', 'lastName' => 'Belt'],
            ['firstName' => 'Amala', 'lastName' => 'Klama'],
            ['firstName' => 'Jean', 'lastName' => 'Nanj'],
            ['firstName' => 'Lototo', 'lastName' => 'Tolo'],
            ['firstName' => 'Pedro', 'lastName' => 'Dope'],
            ['firstName' => 'Michel', 'lastName' => 'Chem'],
            ['firstName' => 'Paul', 'lastName' => 'Laup'],

        ];
        return $names;
    }

    public function dataCustomer()
    {
        $customers = [
            ['shopName' => 'Mauritel', 'firstName' => 'Jack', 'lastName' => 'Jones', 'customer' => 'customer1'],
            ['shopName' => 'Tonteltel', 'firstName' => 'Awa', 'lastName' => 'Bones', 'customer' => 'customer2'],
            ['shopName' => 'Getel', 'firstName' => 'Amélie', 'lastName' => 'Carlos', 'customer' => 'customer3'],

        ];
        return $customers;
    }
}
