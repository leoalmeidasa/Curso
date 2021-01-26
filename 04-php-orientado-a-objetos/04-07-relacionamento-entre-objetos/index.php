<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$company = new \Source\Related\Company();
$company->bootCompany(
    "UpInside",
    "Nome da rua"
);

echo "<pre>", print_r($company, true), "</pre>";

$address =new \Source\Related\Address("rua sete de setembro", "12", "Bloco A");
$company->boot(
    "FileTech",
    $address
);

echo "<pre>", print_r($company, true), "</pre>";

echo "<p>A {$company->getCompany()} tem sede na {$company->getAddress()->getStreet()}</p>";
/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsphp = new \Source\Related\Product("Full Stack PHP", 1997);
$lavadev = new \Source\Related\Product("Laravel Developer", 997);

echo "<pre>", print_r($fsphp, true), "</pre>";

$company->addProduct($fsphp);
$company->addProduct($lavadev);
$company->addProduct(
    new \Source\Related\Product("Work Control Dev", 2997)
);

echo "<pre>", print_r($company, true), "</pre>";

/**
 * @var \Source\Related\Product $product
*/

foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}

/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);


$company->addTeamMember("CEO", "Leonardo", "Almeida");
$company->addTeamMember("Manager", "Dimitri", "Camargo");
$company->addTeamMember("Support", "Elissandro", "Menezes");
$company->addTeamMember("Producer", "Joao", "Almeida");
$company->addTeamMember("Designer", "Matheus", "Almeida");


echo "<pre>", print_r($company, true), "</pre>";

/**
 * @var \Source\Related\User $member
 */

foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}




