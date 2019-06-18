<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\PictureUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureUploaderTest extends TestCase
{
    public function testUpload()
    {
        $pictureUploader = new PictureUploader(__DIR__ . '/../../public/uploads/pictures');
        $fileName = md5(uniqid("", true)) . "jpg";
        copy(
            __DIR__ . '/../../public/uploads/pictures/snow-fixture1.jpg',
            __DIR__ . '/../../public/uploads/pictures/' . $fileName
        );

        $uploadedFile = new UploadedFile(
            __DIR__ . '/../../public/uploads/pictures/' . $fileName,
            $fileName,
            'image/jpg',
            null,
            true
        );

        $this->assertNotNull($pictureUploader->upload($uploadedFile));
    }
}
