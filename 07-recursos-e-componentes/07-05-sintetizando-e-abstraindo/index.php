<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = (new \Source\Core\Email())->bootstrap(
    "Fala maluco, esse e meu e-mail",
    "<h1>Ei Denizard!</h1><p>Olha esse Homossexual ai, curtiu ?,enviado por API by Leonardo Almeida</p>",
    "denizard.camargo@faculdadeporto.com.br",
    "Denizard Dimitri"
);

$email->attach(__DIR__ . "/../../images/gay.png", "Php");

if ($email->send()) {
    echo message()->success("E-mail enviado com sucesso!");
} else {
    echo $email->message();
}