<?php

namespace App\Entity;

class Picture
{
    private $id;
    private $name;
    private $imageSize;
    private $imageType;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImageSize()
    {
        return $this->imageSize;
    }

    public function getImageType()
    {
        return $this->imageType;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setImageSize($imageSize)
    {
        $this->imageSize = $imageSize;
    }

    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
    }
}
