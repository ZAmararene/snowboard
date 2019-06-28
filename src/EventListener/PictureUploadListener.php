<?php

namespace App\EventListener;

use App\Entity\Picture;
use App\Service\PictureUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

        $file = $picture->getFile();
        // only upload new file
        if (!$file instanceof UploadedFile) {
            return;
        }
        $fileName = $this->uploader->upload($file);
        $picture->setName($fileName);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $picture = $args->getEntity();

        if (!$picture instanceof Picture) {
            return;
        }

        $file = $picture->getFile();
        // only upload new file
        if (!$file instanceof UploadedFile) {
            return;
        }
        $fileName = $this->uploader->upload($file);
        $picture->setName($fileName);
    }
}
