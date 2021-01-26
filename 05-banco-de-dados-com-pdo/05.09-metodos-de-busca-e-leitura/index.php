<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);
$model = new \Source\Models\UserModel();

$user = $model->load(1);

var_dump($user);

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$user = $model->find("mateus31@email.com.br");

var_dump($user);

/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$all= $model->all( 5);

foreach ($all as $user) {
    var_dump($user);
}