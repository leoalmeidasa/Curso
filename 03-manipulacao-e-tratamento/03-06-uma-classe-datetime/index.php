<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1986-07-01");
$dateStatic = DateTime::createFromFormat("d/m/Y", "10/03/2020");

$array = [$dateNow, $dateBirth, $dateStatic];

echo "<pre>", print_r($array, true), "</pre>";

var_dump([
	$dateNow->format(DATE_BR),
	$dateNow->format("d")
]);

echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")}</p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTime = new DateTime("now", $newTimeZone);

$array2 = [
	$newTimeZone,
	$newDateTime,
	$dateNow
];

echo "<pre>", print_r($array2, true), "</pre>";

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

echo "<pre>", print_r($dateInterval, true), "</pre>";

echo "<pre>", print_r($dateTime, true), "</pre>";

$birth = new DateTime("2020-10-03");
$dateNow = new DateTime("now");

$diff = $dateNow->diff($birth);

echo "<pre>", print_r($birth, true), "</pre>";

echo "<pre>", print_r($diff, true), "</pre>";

if($diff->invert) {
	echo "<p> Seu aniversario foi a {$diff->days} dias.</p>";
}else{
	echo "<p>Faltam {$diff->days} para seu aniversario.</p>";
}

$dateResources = new DateTime("now");
$dateResources->format(DATE_BR);
$dateResources->add(DateInterval::createFromDateString("10days"))->format(DATE_BR);
$dateResources->sub(DateInterval::createFromDateString("20days"))->format(DATE_BR);

echo "<pre>", print_r($dateResources, true), "</pre>";

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2020-12-25");

$period = new DatePeriod($start, $interval, $end);

$array3 = [
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR),
    $period,
    get_class_methods($period)
];

echo "<pre>", print_r($array3, true), "</pre>";


echo "<h1>Sua Assinatura:</h1>";
foreach ($period as $recurrences) {
    echo "<p>Proximo vencimento {$recurrences->format(DATE_BR)} </p>";
}









