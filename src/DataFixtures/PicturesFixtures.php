<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PicturesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 16; $i++) {
            $picture = new Picture();
            $picture->setName('snow-fixture' . $i . '.jpg');
            $manager->persist($picture);
            $this->addReference('picture' . $i, $picture);
            $manager->flush();
        }
    }
}
