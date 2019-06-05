<?php

namespace App\Service;

use App\Form\RegistrationType;
use App\Service\AbstractHandler;

class RegistrationHandler extends AbstractHandler
{
    public function getFormType()
    {
        return RegistrationType::class;
    }

    public function process($data, $extraData)
    {
        $imageName = $extraData->upload($data->getAvatar());
        $data->setAvatar($imageName);

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}
