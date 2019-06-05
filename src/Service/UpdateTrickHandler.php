<?php

namespace App\Service;

use App\Form\AddTrickType;
use App\Service\AbstractHandler;

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
