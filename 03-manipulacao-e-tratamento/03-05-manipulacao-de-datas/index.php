<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

$array =[
	date_default_timezone_get(),
	date(DATE_W3C),
	date("d/m/y H:i:s")
];

echo "<pre>", print_r($array,true), "</pre>";

define("DATE_BR", "d/m/y H:i:s");
define("DATE_TIMEZONE", "America/Sao_Paulo");

date_default_timezone_set(DATE_TIMEZONE);

$array2 =[
	date_default_timezone_get(),
	date(DATE_BR)
];

echo "<pre>", print_r($array2,true), "</pre>";	

var_dump(getdate());

echo "<p>Hoje é dia ", getdate()["mday"], "!</p>";

/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

$array3 = [
	"strtotime NOW" => strtotime("NOW"),
	"time" => time(),
	"strtotime+10d" => strtotime("+10days"),
	"date DATE_BR" => date(DATE_BR),
	"date +10days" => date(DATE_BR, strtotime("+10days")),
	"date -10days" => date(DATE_BR, strtotime("-10days")),
	"date +1years" => date(DATE_BR, strtotime("+1years"))
];

echo "<pre>", print_r($array3,true), "</pre>";	

$format = "%d/%m/%y %Hh%M minutos";
echo "<p>A data de hoje é ", strftime($format), "</p>";
echo strftime("<p>Hoje é dia %d do %m de %y as %H horas e %M minutos.</p>");

?>