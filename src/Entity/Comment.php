<?php

namespace App\Entity;

class Comment
{
    private $id;
    private $pseudo;
    private $content;
    private $avatar;
    private $dateAdded;

    public function getId()
    {
        return $this->$id;
    }

    public function getPseudo()
    {
        return $this->$pseudo;
    }

    public function getContent()
    {
        return $this->$content;
    }

    public function getAvatar()
    {
        return $this->$avatar;
    }

    public function getDateAdded()
    {
        return $this->$dateAdded;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }
}