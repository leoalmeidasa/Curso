<?php


namespace Source\inheritance\Event;


class EventOnline extends Event
{
    private $link;

    public function __construct($event, \DateTime $date, $price, $link, $vacancies = null)
{
    parent::__construct($event, $date, $price, $vacancies);
    $this->link = $link;
}

    public function register($fullname, $email)
    {
        $this->vacancies += 1;
        $this->setRegister($fullname, $email);
        echo "<p class='trigger accept'>Show {$fullname}, cadastrado com sucesso !</p>";
    }

}