<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
	"name" => "Robson",
	"company" => "UpInside",
	"mail" => "curso@upinside.com.br"
];
$objProfile = (object)$arrProfile;

echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
echo "<pre>", print_r($ceo,true), "</pre>";

$company = new StdClass();
$company->company = "UpInside";
$company->ceo = $ceo;
$company->manager = new StdClass();
$company->manager->name = "Kaue";
$company->manager->mail = "curso@upinside.com.br";

echo "<pre>", print_r($company,true), "</pre>";

/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$date = new DateTime();

$array = [
	"class" => get_class($date), //veridicar quais sao as classes
	"methods" => get_class_methods($date), //verificar quais são os metodos
	"vars" => get_object_vars($date),	//verificar quais são as variaveis
	"parent" => get_parent_class($date), //verificar se é filha ou herdada de uma outra classe
	"subclass" => is_subclass_of($date, "DateTime") //verificar se e subclasse de DateTime
];

echo "<pre>", print_r($array), "</pre>";

$expetion = new PDOException();

$array2 = [
	"class" => get_class($expetion),
	"methods" => get_class_methods($expetion),
	"vars" => get_object_vars($expetion),
	"parent" => get_parent_class($expetion),
	"subclass" => is_subclass_of($expetion, "Exception")
];

echo "<pre>", print_r($array2), "</pre>";