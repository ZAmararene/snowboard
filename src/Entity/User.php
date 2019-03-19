<?php

namespace App\Entity;

class User
{
    private $id;
    private $lastName;
    private $firstName;
    private $pseudo;
    private $email;
    private $password;
    private $resetPassword;
    private $role;
    private $dateConnection;

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getResetPassword()
    {
        return $this->resetPassword;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getDateConnection()
    {
        return $this->dateConnection;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setResetPassword($resetPassword)
    {
        $this->resetPassword = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setDateConnection($dateConnection)
    {
        $this->dateConnection = $dateConnection;
    }
}