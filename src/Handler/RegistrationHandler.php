<?php

namespace App\Handler;

use App\Form\RegistrationType;
use App\Handler\AbstractHandler;

class RegistrationHandler extends AbstractHandler
{
    public function getFormType()
    {
        return RegistrationType::class;
    }

    public function process($data, $extraData)
    {
        if ($data->getAvatar() === null) {
            $imageName = 'avatar.png';
        } else {
            $imageName = $extraData->upload($data->getAvatar());
        }

        $data->setAvatar($imageName);

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}
