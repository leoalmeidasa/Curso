<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();
echo "<p>". $config::COMPANY ."</p>";

var_dump(Config::COMPANY);

echo "<pre>", print_r($config, true), "</pre>";

$reflection = new ReflectionClass(Config::class);

echo "<pre>", print_r($reflection->getConstants(), true), "</pre>";


/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

Config::$company = "UpInside";
Config::$domain = "upinside.com.br";
Config::$sector = "Educação";

$config::$sector = "Tecnologia";

echo "<pre>", print_r($reflection->getProperties(), true), "</pre>";

echo "<pre>", print_r($reflection->getDefaultProperties(), true), "</pre>";

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

$config::setConfig("", "", "");
Config::setConfig("UpInside", "upinsinde.com.br", "Educação");

echo "<pre>", print_r($config, true), "</pre>";

echo "<pre>", print_r($reflection->getMethods(), true), "</pre>";

echo "<pre>", print_r($reflection->getDefaultProperties(), true), "</pre>";


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Um objeto trigger");

echo "<pre>", print_r($trigger, true), "</pre>";

Trigger::show("Essa é uma mensagem para o usuario");
Trigger::show("Essa é uma mensagem para o usuario", Trigger::ACCEPT);
Trigger::show("Essa é uma mensagem para o usuario", Trigger::ERROR);
Trigger::show("Essa é uma mensagem para o usuario", Trigger::WARNING);

echo Trigger::push("Essa é um retorno para o usuário");
echo Trigger::push("Essa é um retorno para o usuário", Trigger::ACCEPT);
echo Trigger::push("Essa é um retorno para o usuário", Trigger::ERROR);
echo Trigger::push("Essa é um retorno para o usuário", Trigger::WARNING);








