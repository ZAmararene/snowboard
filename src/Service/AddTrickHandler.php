<?php

namespace App\Service;

use App\Form\AddTrickType;
use App\Service\AbstractHandler;

class AddTrickHandler extends AbstractHandler
{
    public function getFormType()
    {
        return AddTrickType::class;
    }

    public function process($data)
    {
        $data->setUser($this->security->getUser());

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}
