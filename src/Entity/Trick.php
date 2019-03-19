<?php

namespace App\Entity;

class Trick
{
    private $id;
    private $name;
    private $content;
    private $dateAdded;
    private $dateModification;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function getDateModification()
    {
        return $this->dateModification;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setDateAdded(\dateTime $dateAddded)
    {
        $this->dateAdded = $dateAddded;
    }

    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    }
}