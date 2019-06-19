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
        $data->setDateModification(new \DateTime());
        $this->entityManager->flush();
    }
}
