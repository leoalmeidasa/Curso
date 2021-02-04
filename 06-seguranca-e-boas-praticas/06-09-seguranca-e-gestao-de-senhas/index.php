<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

session();

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);

//$pass = password_hash(12345, PASSWORD_DEFAULT, ["cost" => 12]);

$pass = password_hash(123456, PASSWORD_DEFAULT);

var_dump($pass);

$array = [
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify(12345, $pass)
];

echo "<pre>", print_r($array, true), "</pre>";

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = (new \Source\Models\User())->load(1);

$user->password = $pass;

$user->save();

$array1 = [
    password_verify(123456, $user->password),
    $user
];
echo "<pre>", print_r($array1, true), "</pre>";

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = (new \Source\Models\User())->find("robson1@email.com.br");
echo "<pre>", print_r($login, true), "</pre>";

if (!$login) {
    echo message()->info("E-mail informado não confere!");

} elseif (!password_verify(123456, $login->password)) {
    echo message()->error("Senha não confere!");

} else {
    $login->password = password_hash(123456, PASSWORD_DEFAULT);
    $login->save();

    session()->set("login", $login->data());

    echo message()->success("Bem vindo(a) de volta {$login->user_name}");
    $array2 = [
        session()->all()
    ];
    echo "<pre>", print_r($array2, true), "</pre>";
}

/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = "29847683";
$array3 = [
    $passwd = passwd($pass),
    passwd_verify($pass, $passwd),
    passwd_rehash($passwd)
];

echo "<pre>", print_r($array3, true), "</pre>";