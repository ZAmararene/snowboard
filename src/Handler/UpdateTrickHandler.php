<?php

namespace App\Handler;

use App\Form\AddTrickType;
use App\Handler\AbstractHandler;

class UpdateTrickHandler extends AbstractHandler
{
    public function getFormType()
    {
        return AddTrickType::class;
    }

    public function process($data, $extraData)
    {
        // dd($data);
        foreach ($data->getPictures() as $picture) {
            if (null === $picture->getName() || null === $picture->getId()) {
                $this->entityManager->remove($picture);
            }
        }

        foreach ($data->getVideos() as $video) {
            if (null === $video->getVideoLink()) {
                $this->entityManager->remove($video);
            }
        }

        $data->setDateModification(new \DateTime());
        $this->entityManager->flush();
    }
}
