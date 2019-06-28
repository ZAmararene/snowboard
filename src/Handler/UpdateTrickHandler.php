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
        // dd($this->form->getData());
        $newFile = $this->form->getData()['file'];
        // dd($newFile);
        // $newFile = $this->form['file']->getData();

        // foreach ($newFile as $picture) {
        //     if ($picture) {
        //         $file = $extraData->upload($picture->getName());
        //         $picture->setName($file);
        //     }
        // }
        $data->setDateModification(new \DateTime());
        $this->entityManager->flush();
    }
}
