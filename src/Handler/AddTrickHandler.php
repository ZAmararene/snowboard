<?php

namespace App\Handler;

use App\Form\AddTrickType;
use App\Handler\AbstractHandler;

class AddTrickHandler extends AbstractHandler
{
    public function getFormType()
    {
        return AddTrickType::class;
    }

    public function process($data, $extraData)
    {
        $data->setUser($this->security->getUser());

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}
