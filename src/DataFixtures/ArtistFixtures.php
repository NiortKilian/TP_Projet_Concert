<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public const ARTIST_PINK_FLOYD_1 = "a1";
    public const ARTIST_PINK_FLOYD_2 = "a2";
    public const ARTIST_PINK_FLOYD_3 = "a3";
    public const ARTIST_PINK_FLOYD_4 = "a4";
    public const ARTIST_PINK_FLOYD_5 = "a5";
    public const ARTIST_PINK_FLOYD_6 = "a6";
    public const ARTIST_MUSE_7 = "a7";
    public const ARTIST_MUSE_8 = "a8";
    public const ARTIST_MUSE_9 = "a9";


    public function load(ObjectManager $manager): void
    {
        $a1 = new Artist();
        $a1->setName("Gilmour")
            ->setFirstName("David");
        $manager->persist($a1);

        $a2 = new Artist();
        $a2->setName("Waters")
            ->setFirstName("Roger");
        $manager->persist($a2);

        $a3 = new Artist();
        $a3->setName("Klose")
            ->setFirstName("Bob");
        $manager->persist($a3);

        $a4 = new Artist();
        $a4->setName("Barrett")
            ->setFirstName("Syd");
        $manager->persist($a4);

        $a5 = new Artist();
        $a5->setName("Wright")
            ->setFirstName("Richard");
        $manager->persist($a5);

        $a6 = new Artist();
        $a6->setName("Mason")
            ->setFirstName("Nick");
        $manager->persist($a6);

        $a7 = new Artist();
        $a7->setName("Bellamy")
            ->setFirstName("Matthew");
        $manager->persist($a7);

        $a8 = new Artist();
        $a8->setName("Howard")
            ->setFirstName("Dominic");
        $manager->persist($a8);

        $a9 = new Artist();
        $a9->setName("Wolstenholme")
            ->setFirstName("Christopher");
        $manager->persist($a9);

        $manager->flush();

        $this->addReference(self::ARTIST_PINK_FLOYD_1, $a1);
        $this->addReference(self::ARTIST_PINK_FLOYD_2, $a2);
        $this->addReference(self::ARTIST_PINK_FLOYD_3, $a3);
        $this->addReference(self::ARTIST_PINK_FLOYD_4, $a4);
        $this->addReference(self::ARTIST_PINK_FLOYD_5, $a5);
        $this->addReference(self::ARTIST_PINK_FLOYD_6, $a6);
        $this->addReference(self::ARTIST_MUSE_7, $a7);
        $this->addReference(self::ARTIST_MUSE_8, $a8);
        $this->addReference(self::ARTIST_MUSE_9, $a9);

    }
}




