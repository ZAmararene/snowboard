<?php

namespace App\DataFixtures;

use App\Entity\Video;
use App\Entity\Picture;
use Symfony\Component\Asset\Packages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PicturesVideosFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $img1 = 'bae36f4b52a66d20b1e0ca894c5cd8f5.jpeg';
        $img2 = '3ff61c199cddb576fb277e6984a6bdbd.jpeg';
        $img3 = '2d44ccf5b06ddaa082fdab3bd886f3e7.jpeg';

        $picture1 = new Picture();
        $picture1->setName($img1);
        $manager->persist($picture1);
        $this->addReference('picture1', $picture1);

        $picture2 = new Picture();
        $picture2->setName($img2);
        $manager->persist($picture2);
        $this->addReference('picture2', $picture2);

        $picture3 = new Picture();
        $picture3->setName($img3);
        $manager->persist($picture3);
        $this->addReference('picture3', $picture3);

        $video1 = new Video();
        $video1->setVideoLink('https://www.youtube.com/embed/Br6ZJM01I6s');
        $manager->persist($video1);
        $this->addReference('video1', $video1);

        $video2 = new Video();
        $video2->setVideoLink('https://www.youtube.com/embed/2Ul5P-KucE8');
        $manager->persist($video2);
        $this->addReference('video2', $video2);

        $video4 = new Video();
        $video4->setVideoLink('https://www.youtube.com/embed/XATkSnCFsRU');
        $manager->persist($video4);
        $this->addReference('video4', $video4);

        $video5 = new Video();
        $video5->setVideoLink('https://www.youtube.com/embed/vquZvxGMJT0');
        $manager->persist($video5);
        $this->addReference('video5', $video5);

        $manager->flush();
    }
}
