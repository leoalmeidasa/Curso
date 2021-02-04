<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new \Source\Models\User();
$array = [$user = $model->find("id = :id", "id=1")];

echo "<pre>", print_r($array, true) ,"</pre>";

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$array1 = [$user = $model->findById(2)];

echo "<pre>", print_r($array1, true) ,"</pre>";

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$array2 = [$user = $model->findByEmail("leonardo36@email.com.br")];

echo "<pre>", print_r($array2, true) ,"</pre>";

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$list = $model->all(2, 5);

echo "<pre>",print_r($list, true),"</pre>";

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap(
    "Robson",
    "Leite",
    "cursos@upinside.com.br",
    "16379489498"
);

if ($user->save()) {
    echo message()->success("Cadastro realizado com sucesso!");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);

$user = (new \Source\Models\User())->findById(51);

$user->first_name = "Gustavo";
$user->last_name = "Web";
$user->password = passwd(1231726379);

if ($user->save()) {
    echo message()->success("Dados atualizados com sucesso!");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

echo "<pre>",print_r($user, true),"</pre";