<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - InteraÃ§Ã£o com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=true'>Argumentos</a></p>";

$data = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com.br"
];

$arguments = http_build_query($data);
echo "<p><a href='index.php?{$arguments}'>Args By Array</a></p>";

var_dump($_GET);

$object = (object)$data;
var_dump(
    $object,
    http_build_query($object)
);

/*
 * [ seguranÃ§a ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("seguranÃ§a", __LINE__);

$datafilter = http_build_query([
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com.br",
    "site" => "upinside.com.br",
    "script" => "<script>alert('Esse é um JavaScript')</script>"
]);

echo "<p><a href='inde.php?{$datafilter}'>Data Filter</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

if($dataUrl) {
    if(in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam dados!</p>";
    } elseif (empty($dataUrl["mail"])) {
        echo "<p class='trigger warnung'>Falta o e-mail</p>";
    } elseif (!filter_var($dataUrl["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail inválido!</p>";
    }else {
        echo "<P class='trigger accept'>Tudo certo!</p>";
    }
}else {
    var_dump(false);
}

var_dump($dataUrl);

$dataFilter = http_build_query([
    "name" => "Robson",
    "company" => "UpInside",
    "mail" => "cursos@upinside.com.br",
    "site" => "http://upinside.com.br",
    "script" => "<script>alert('Esse é um JavaScript')</script>"
]);

parse_str($dataFilter, $arrDataFilter);
var_dump($arrDataFilter);

$dataPreFilter = [
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRING
];

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));









