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

        for ($i = 1; $i <= 16; $i++) {
            $picture = new Picture();
            $picture->setName('snow-fixture' . $i . '.jpg');
            $manager->persist($picture);
            $this->addReference('picture' . $i, $picture);
        }

        $video1 = $this->media($manager, 'https://www.youtube.com/embed/Br6ZJM01I6s');
        $this->addReference('video1',  $video1);

        $video2 = $this->media($manager, 'https://www.youtube.com/embed/2Ul5P-KucE8');
        $this->addReference('video2',  $video2);

        $video3 = $this->media($manager, 'https://www.youtube.com/embed/hDSc7hQ0bzg');
        $this->addReference('video3',  $video3);

        $video4 = $this->media($manager, 'https://www.youtube.com/embed/XATkSnCFsRU');
        $this->addReference('video4',  $video4);

        $video5 = $this->media($manager, 'https://www.youtube.com/embed/vquZvxGMJT0');
        $this->addReference('video5',  $video5);

        $video6 = $this->media($manager, 'https://www.youtube.com/embed/P5ZI-d-eHsI');
        $this->addReference('video6',  $video6);

        $video7 = $this->media($manager, 'https://www.youtube.com/embed/IPc7cJHt1rc');
        $this->addReference('video7',  $video7);

        $video8 = $this->media($manager, 'https://www.youtube.com/embed/yK5GFfqeYfU');
        $this->addReference('video8',  $video8);

        $video9 = $this->media($manager, 'https://www.youtube.com/embed/nwic0F9CwI0');
        $this->addReference('video9',  $video9);

        $video10 = $this->media($manager, 'https://www.youtube.com/embed/2RlDSbxsnyc');
        $this->addReference('video10',  $video10);

        $video11 = $this->media($manager, 'https://www.youtube.com/embed/Ur1Nrz23sSI');
        $this->addReference('video11',  $video11);

        $video12 = $this->media($manager, 'https://www.youtube.com/embed/wlEY-D2F6Yk');
        $this->addReference('video12',  $video12);

        $video13 = $this->media($manager, 'https://www.youtube.com/embed/viznc0h6BQg');
        $this->addReference('video13',  $video13);

        $video14 = $this->media($manager, 'https://www.youtube.com/embed/CDmW1yvY1nM');
        $this->addReference('video14',  $video14);

        $video15 = $this->media($manager, 'https://www.youtube.com/embed/q-RAJnV1dfg');
        $this->addReference('video15',  $video15);

        $video16 = $this->media($manager, 'https://www.youtube.com/embed/tIW5dLjv3CM');
        $this->addReference('video16',  $video16);

        $manager->flush();
    }

    public function media(ObjectManager $manager, $media)
    {
        $video = new Video();
        $video->setVideoLink($media);
        $manager->persist($video);
        return $video;
    }
}
