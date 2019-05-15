<?php

namespace App\EventListener;

use App\Entity\Picture;
use App\Service\PictureUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PictureUploadListener
{
    private $uploader;

    public function __construct(PictureUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $picture = $args->getEntity();

        if (!$picture instanceof Picture) {
            return;
        }

        $file = $picture->getName();

        // only upload new file
        if (!$file instanceof UploadedFile) {
            return;
        }

        $this->uploadFile($file);
    }

    // public function preUpdate(PreUpdateEventArgs $args)
    // {
    //     $entity = $args->getEntity();
    //     $this->uploadFile($entity);
    // }

    public function uploadFile($file)
    {
        // if (!$picture instanceof Picture) {
        //     return;
        // }

        // $file = $picture->getName();

        // // only upload new file
        // if (!$file instanceof UploadedFile) {
        //     return;
        // }
        $fileName = $this->uploader->uploadPicture($file);
        $file->setName($fileName);
    }
}
