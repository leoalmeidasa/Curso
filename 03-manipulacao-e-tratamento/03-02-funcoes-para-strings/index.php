<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último samurai e incrível !";

$array = [
	"string" => $string,
	"strlen" => strlen($string), //Retorna o tamanho de uma string
	"mb_strlen" => mb_strlen($string), //multibyte usado para reconhecer acentos nas strings
	"substr" => substr($string, "9"),//Retorna uma parte de uma string
	"mb_substr" => mb_substr($string, "9"),
	"strtoupper" => strtoupper($string),
	"mb_strtoupper" => mb_strtoupper($string),
];

echo "<pre>", print_r($array, true), "</pre>"; 
/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString =$string;

$array2 = [
	"mb strtoupper" => mb_strtoupper($mbString), //colocando texto maiusculo
	"mb strtolower" => mb_strtolower($mbString), //colocando texto minisculo
	"mb convert_case UPPER" => mb_convert_case($mbString,  MB_CASE_UPPER), //colocando texto maiusculo
	"mb convert case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER), //colocando texto minisculo
	"mb convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE), //primeira letra de casa frase em maiusculo
];

echo "<pre>", print_r($array2, true), "</pre>";

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . " Fui, iria novamente, e foi épico!";

$array3 =[
	"mb_string" => mb_strlen($mbReplace),
	"mb_strpos" => mb_strpos($mbReplace, ", "), //posicao do ponteiro na frase
	"mb_strrpos" => mb_strrpos($mbReplace, ", "), //segunda posicao do ponteiro na frase
	"mb_substr" => mb_substr($mbReplace, 30 ), //cortar string apartir de um posicao
	"mb_strstr" => mb_strstr($mbReplace, "! ", true), //pesquisar na string e mostra valor anterior usando true
	"mb_strrchr" => mb_strrchr($mbReplace, ", ") //retorna apartir da ultima ocorrencia de acordo com a pesquisa

];


echo "<pre>", print_r($array3, true), "</pre>";


$mbStrReplace = $string;

echo "<p>", $mbStrReplace, "</p>";
echo "<p>", str_replace("samurai", "ronin", $mbStrReplace), "</p>";
echo "<p>", str_replace("incrível", "topzeira", $mbStrReplace), "</p>";
echo "<p>", str_replace(["último", "samurai"],["primeiro", "senpai"], $mbStrReplace), "</p>";

$article = <<<ROCK
	<article>
		<h3>event</h3>
		<p>desc</p>
	</article>
ROCK;

$articleData = [
	"event" => "Rock in Rio",
	"desc" => $mbReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);


/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endpoint = "name=Leonardo&email=leozinho@gostoso.com.br";
mb_parse_str($endpoint, $parseEndPoint);

$array4 = [
	$endpoint,
	$parseEndPoint,
	(object)$parseEndPoint
];

echo "<pre>", print_r($array4, true), "</pre>";