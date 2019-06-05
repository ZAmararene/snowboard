<?php

namespace App\Service;

use App\Form\CommentType;
use App\Service\AbstractHandler;

class CommentHandler extends AbstractHandler
{
    public function getFormType()
    {
        return CommentType::class;
    }

    public function process($data, $extraData)
    {
        $data->setTrick($extraData);
        $user = $this->security->getUser();
        $data->setPseudo($user->getPseudo());
        $data->setUser($user);

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}
