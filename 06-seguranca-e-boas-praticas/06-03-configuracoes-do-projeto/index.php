<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.03 - Configurações do projeto");

require __DIR__ . "/../source/autoload.php";

/*
 * [ configurações ] Um acesso global a tudo que pode ser configurado no projeto.
 */
fullStackPHPClassSession("configurações", __LINE__);

$array = [get_defined_constants(true)['user']];
echo "<pre>", print_r($array, true), "</pre>";
/*
 * [ refatoramento ] Iniciando o desenvolvimento de uma arquitetura de projeto.
 */
fullStackPHPClassSession("refatoramento", __LINE__);

use Source\Core\Connect;

$read = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1,1");
$read->execute();

$array1 = [$read->fetchAll()];
echo "<pre>", print_r($array1, true), "</pre>";

use Source\Models\User;

$user = (new User())->load(1);
echo "<pre>", print_r($user, true), "</pre>";