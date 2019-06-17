<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\PictureUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureUploaderTest extends TestCase
{
    const DEFAULT_PICTURE = 'avatar.png';

    public function uploadTest()
    {
        // tester la classe UploadedFile, vérifier que la méthode upload est applelé une fois
        $client = $this->getMock('PictureUploader');
        $client->expect($this->once())
            ->method('upload')
            ->willReturn();
    }

    public function uploadPictureTest()
    {
        $client = $this->getMockBuilder('UploadedFile')
            ->disableOriginalConstructor()
            ->getMock();
        $client->method('upload')
            ->willReturn();
    }
}
