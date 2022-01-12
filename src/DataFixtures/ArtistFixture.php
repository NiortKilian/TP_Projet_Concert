<?php

namespace App\DataFixtures;

use App\Entity\ConcertArtist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artist1 = new ConcertArtist();
        $artist1->setName("Gilmour")
                ->setFirstName("David");
        $artist1->setBand($this->getReference(BandFixture::ADMIN_USER_REFERENCE));
        $manager->persist($artist1);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BandFixture::class,
        ];
    }
}
