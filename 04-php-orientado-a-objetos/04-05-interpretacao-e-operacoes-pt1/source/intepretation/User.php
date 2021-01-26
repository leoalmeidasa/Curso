<?php


namespace Source\intepretation;


class User
{
    private $firstName;
    private $lastName;
    private $email;

    /**
     * User constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     */
    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function __clone()
    {
        $this->firstName = null;
        $this->lastName =null;
        echo "<p class='trigger'>Clonou!</p>"; //não usa isso na pratica
    }

    public function __destruct()
    {
        echo "<pre>", print_r($this, true), "</pre>";
        echo "<p class='trigger accept'>O objeto {$this->firstName} foi destruido!</p>";
    }


    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }




}