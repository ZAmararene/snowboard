<?php

namespace App\Service;

use App\Form\AddTrickType;
use App\Service\AbstractHandler;

class DeleteTrickHandler extends AbstractHandler
{
    public function getFormType()
    {
        return AddTrickType::class;
    }

    public function process($data)
    {
        $data->setDateModification(new \DateTime());
        $this->entityManager->flush();
    }
}
