<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

$user = new \Source\Traits\User("Leo", "Sá","email@email.com.br");
$address = new \Source\Traits\Address("Rua ali", 123, "Posto");

$register = new \Source\Traits\Register($user, $address);

echo "<pre>",print_r($register, true),"</pre>";

$cart = new \Source\Traits\Cart();
$cart->add(1, "Full Stack", 1, 1000);
$cart->add(2, "Laravel", 2, 500);
$cart->add(3, "FSPHP", 3, 400);

$cart->remove(3, 3);
$cart->remove(2,1);

$cart->checkout( $user, $address);

echo "<pre>",print_r($cart, true),"</pre>";