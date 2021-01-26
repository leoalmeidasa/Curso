<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
	"AC/DC",
	"Nirvana",
	"Altar Bridge"
];

$assoc = [
	"band_1" => "AC/DC",
	"band_2" => "Nirvana",
	"band_3" => "Altar Bridge"
];

array_unshift($index, "", "Pearl Jam"); //adicionando valores ao inicio do array
$assoc = ["band_4" => "", "band_5" => "Pearl Jam"] + $assoc; //adicionando valores ao inicio do array

array_push($index, ""); //adicionando valores ao final do array
$assoc = $assoc + ["band_6" => "" ]; //adicionando valores ao final do array

array_shift($index); //retirando valores do inicio do array
array_shift($assoc); //retirando valores do inicio do array

array_pop($index); //retirando valores do final do array
array_pop($assoc); //retirando valores do final do array

array_unshift($index, ""); //adicionar valor ao inicio do array

$index = array_filter($index); //excluir todo os arrays vazios

echo "<pre>", print_r($index, true), "</pre>";
echo "<pre>", print_r($assoc, true), "</pre>";
/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index); //inverter os valores do array
$assoc = array_reverse($assoc); //inverter os valores do array

asort($index); // ordenar por ordem alfabetica
asort($assoc); // ordenar por ordem alfabetica

ksort($index); // ordenar por indice
krsort($index); // inverter a ordem por indices

sort($index); // ordenar por ordem alfabetica e redefinir os indices
rsort($index); // inverter o sort


echo "<pre>", print_r($index, true), "</pre>";
echo "<pre>", print_r($assoc, true), "</pre>";

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

$array4 = [
	array_keys($assoc),
	array_values($assoc)
];

if(in_array("AC/DC", $assoc)){	//verificar se o valor esta presente no array 
	echo "<p> Cause I'm back ! </p>";
}

$arrtoString = implode(", ", $assoc); //convertendo array em string por separado por virgula e espaço.
echo "<p> Eu curto {$arrtoString} e muitas outras!</p>";
echo "<p> {$arrtoString} </p>";

$arrtoString = explode(", ", $arrtoString); //convertendo string em array retirado as virgulas e espaços.

echo "<pre>", print_r($array4, true), "</pre>";
echo "<pre>", print_r($assoc, true), "</pre>";
/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
	"name" => "Robson",
	"company" => "UpInside",
	"e-mail" => "robson@upinside.com.br"
];

$template = <<<TPL
	<article>
		<h1>{{name}}</h1>
		<p>{{company}}<br>
		<a href="mailto:{{e-mail}}" title="Enviar e-mail para {{name}}">Enviar o e-mail</a></p>
	</article
TPL;

echo $template;

echo str_replace($profile, array_values($profile), $template); //inserindo valores do profile no template

$replaces = "{{" . implode("}}&{{", array_keys($profile)). "}}"; //adicionando {{}} nos keys do profile

echo "<p> {$replaces} </p>";

echo str_replace(
	explode("&", $replaces), 
	array_values($profile), 
	$template);