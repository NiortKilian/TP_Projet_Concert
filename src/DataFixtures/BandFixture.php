<?php

namespace App\DataFixtures;

use App\Entity\ConcertArtist;
use App\Entity\ConcertBand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BandFixture extends Fixture //implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $band1 = new ConcertBand();
        $band1->setName("Pink Floyd");

        $manager->persist($band1);
        $manager->flush();
    }

    /*public function getDependencies()
    {
        return [
            ConcertArtist::class,
        ];
    }*/
}
