<?php

namespace App\Entity;

class Video
{
    private $id;
    private $name;
    private $videoSize;
    private $videoType;
    private $videoLink;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVideoSize()
    {
        return $this->videoSize;
    }

    public function getVideoType()
    {
        return $this->videoType;
    }

    public function getVideoLink()
    {
        return $this->videoLink;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setVideoSize($videoSize)
    {
        $this->videoSize = $videoSize;
    }

    public function setVideoType($videoType)
    {
        $this->videoType = $videoType;
    }

    public function setVideoLink($videoLink)
    {
        $this->videoLink = $videoLink;
    }
}
