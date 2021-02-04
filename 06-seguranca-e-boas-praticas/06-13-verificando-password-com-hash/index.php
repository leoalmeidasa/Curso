<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.13 - Verificando password com hash");

require __DIR__ . "/../source/autoload.php";

/*
 * [ hash ]
 */
fullStackPHPClassSession("hash", __LINE__);

$user = (new \Source\Models\User())->findById(1);
//$user->password = 134524234;
$user->save();

echo "<pre>",print_r($user, true),"</pre>";

echo "<pre>",print_r(password_get_info(123142431), true),"</pre>";

echo "<pre>",print_r(password_get_info(passwd(123142431)), true),"</pre>";