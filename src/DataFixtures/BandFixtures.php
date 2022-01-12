<?php

namespace App\DataFixtures;

use App\Entity\Band;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BandFixtures extends Fixture implements DependentFixtureInterface
{
    public const BAND_PINK_FLOYD = "b1";
    public const BAND_MUSE = "b2";

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $b1 = new Band();
        $b1->setName("Pink Floy d")
            ->setStyle("Rock")
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_1))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_2))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_3))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_4))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_5))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_PINK_FLOYD_6));
        $manager->persist($b1);

        $b2 = new Band();
        $b2->setName("Muse")
            ->setStyle("Rock")
            ->addMember($this->getReference(ArtistFixtures::ARTIST_MUSE_7))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_MUSE_8))
            ->addMember($this->getReference(ArtistFixtures::ARTIST_MUSE_9));
        $manager->persist($b2);

        $manager->flush();

        $this->addReference(self::BAND_PINK_FLOYD, $b1);
        $this->addReference(self::BAND_MUSE, $b2);
    }
    public function getDependencies()
    {
        return [
            ArtistFixtures::class,
        ];
    }
}
