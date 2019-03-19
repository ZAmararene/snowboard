<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal")
     */
    private $videoSize;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $videoType;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $videoLink;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="videos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

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

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }
}
