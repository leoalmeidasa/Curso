<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event =new \Source\inheritance\Event\Event(
    "Workshop",
        new DateTime("2019-05-29 15:00"),
    2000,
    "4"
);

echo "<pre>", print_r($event, true), "</pre>";

$event->register("Leonardo", "email@email.com");
$event->register("Dimitri", "email@email.com");
$event->register("Elissandro", "email@email.com");
$event->register("Matheus", "email@email.com");
$event->register("Samuel", "email@email.com");

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\inheritance\Address("Rua dos eventos", "1234");

$event =new \Source\inheritance\Event\EventLive(
    "Workshop",
    new DateTime("2019-05-29 15:00"),
    2000,
    "4",
    $address
);

echo "<pre>", print_r($event, true), "</pre>";

$event->register("Leonardo", "email@email.com");
$event->register("Dimitri", "email@email.com");
$event->register("Elissandro", "email@email.com");
$event->register("Matheus", "email@email.com");
$event->register("Samuel", "email@email.com");

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event =new \Source\inheritance\Event\EventOnline(
    "Workshop",
    new DateTime("2019-05-29 15:00"),
    197,
    "https://www.live.com.br"
);

echo "<pre>", print_r($event, true), "</pre>";

$event->register("Leonardo", "email@email.com");
$event->register("Dimitri", "email@email.com");
$event->register("Elissandro", "email@email.com");
$event->register("Matheus", "email@email.com");
$event->register("Samuel", "email@email.com");