<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureUploader
{
    // const DEFAULT_PICTURE = 'avatar.png';

    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        if ($file !== null) {
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->targetDirectory, $fileName);
            return $fileName;
        }
    }
}
