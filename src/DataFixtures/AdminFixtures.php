<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new Admin();
        $admin->setEmail('admin@localhost.com')
        ->setPassword(password_hash('azerty', PASSWORD_DEFAULT));
        $manager->persist($admin);

        $manager->flush();
    }
}
