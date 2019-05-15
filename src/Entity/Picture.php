<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\Image(
     *     maxWidth = 400,
     *     maxWidthMessage = "La largeur de l'image doit être inférieur à 400px",
     *     maxHeight = 200,
     *     maxHeightMessage = "La hauteur de l'image doit être inférieur à 200px",
     *     maxSize = "1024K",
     *     mimeTypesMessage = "Télécharger une image avatar valide"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $imageSize;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $imageType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="pictures")
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
