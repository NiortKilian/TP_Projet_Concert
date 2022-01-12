<?php

namespace App\DataFixtures;

use App\Entity\Hall;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HallFixtures extends Fixture
{
    public const HALL_1 = "h1";
    public const HALL_2 = "h2";

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $h1 = new Hall();
        $h1->setName("La plus grande salle")
            ->setAdress("6 Rue de la plus grande salle");
        $manager->persist($h1);

        $h2 = new Hall();
        $h2->setName("La salle presque la plus grande mais un tout petit peu plus petite que l'autre")
            ->setAdress("3 Rue de la salle presque la plus grande mais un tout petit peu plus petite que l'autre");
        $manager->persist($h2);

        $manager->flush();

        $this->addReference(self::HALL_1,$h1);
        $this->addReference(self::HALL_2,$h2);
    }
}
