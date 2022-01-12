<?php

namespace App\DataFixtures;

use App\Entity\Concert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConcertFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $c1 = new Concert();
        $c1->setName("Le meilleur concert des Pink Floyd")
            ->setDate(\DateTime::createFromFormat("d/m/Y", "10/02/2022"))
            ->setBand($this->getReference(BandFixtures::BAND_PINK_FLOYD))
            ->setHall($this->getReference(HallFixtures::HALL_1));
        $manager->persist($c1);

        $c2 = new Concert();
        $c2->setName("Le meilleur concert de Muse")
            ->setDate(\DateTime::createFromFormat("d/m/Y", "12/02/2022"))
            ->setBand($this->getReference(BandFixtures::BAND_MUSE))
            ->setHall($this->getReference(HallFixtures::HALL_2));
        $manager->persist($c2);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            BandFixtures::class,
            HallFixtures::class,
        ];
    }
}
