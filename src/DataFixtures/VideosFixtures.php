<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VideosFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->media($manager, 'https://www.youtube.com/embed/Br6ZJM01I6s', 1);
        $this->media($manager, 'https://www.youtube.com/embed/2Ul5P-KucE8', 2);
        $this->media($manager, 'https://www.youtube.com/embed/hDSc7hQ0bzg', 3);
        $this->media($manager, 'https://www.youtube.com/embed/XATkSnCFsRU', 4);
        $this->media($manager, 'https://www.youtube.com/embed/vquZvxGMJT0', 5);
        $this->media($manager, 'https://www.youtube.com/embed/P5ZI-d-eHsI', 6);
        $this->media($manager, 'https://www.youtube.com/embed/IPc7cJHt1rc', 7);
        $this->media($manager, 'https://www.youtube.com/embed/Z1gCwhmTV7A', 8);
        $this->media($manager, 'https://www.youtube.com/embed/nwic0F9CwI0', 9);
        $this->media($manager, 'https://www.youtube.com/embed/NQ1MERtpFLQ', 10);
        $this->media($manager, 'https://www.youtube.com/embed/Ur1Nrz23sSI', 11);
        $this->media($manager, 'https://www.youtube.com/embed/wlEY-D2F6Yk', 12);
        $this->media($manager, 'https://www.youtube.com/embed/JJy39dO_PPE', 13);
        $this->media($manager, 'https://www.youtube.com/embed/V9xuy-rVj9w', 14);
        $this->media($manager, 'https://www.youtube.com/embed/q-RAJnV1dfg', 15);
        $this->media($manager, 'https://www.youtube.com/embed/tIW5dLjv3CM', 16);
    }

    public function media(ObjectManager $manager, $media, $order)
    {
        $video = new Video();
        $video->setVideoLink($media);
        $manager->persist($video);
        $this->addReference('video' . $order,  $video);
        $manager->flush();
    }
}
