<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.03 - Gestão de dependências");

/*
 * [ get composer ]
 */
fullStackPHPClassSession("get composer", __LINE__);

require __DIR__ . "/../vendor/autoload.php";

echo "<pre>",print_r(get_defined_constants(true)['user']),"</pre>";

$user = user()->findById(1);

echo "<pre>",print_r($user, true),"</pre>";

$user1 = (new \Source\Models\User())->findById(2);

echo "<pre>",print_r($user1, true),"</pre>";