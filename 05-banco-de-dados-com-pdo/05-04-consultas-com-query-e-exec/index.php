<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert =
    "INSERT INTO users (first_name, last_name, email, document) VALUES ('Leonardo','Almeida', 'email@email.com.br', '1234556');";

try{
    //$exec = Connect::getInstance()->exec($insert);
    $exec = null; // Retorno e um boolean, ou seja, true ou false !

    $query = Connect::getInstance()->query($insert); // Retorna valores das variaveis que estão sendo enviadas !
    echo "<pre>", print_r(Connect::getInstance()->lastInsertId(), true), "</pre>";

    echo "<pre>", print_r($exec, true), "<?/pre>";

    echo "<pre>", print_r($query->errorInfo(), true), "<?/pre>";
}catch (PDOException $exception) {
    echo "<pre>", print_r($exception, true), "<?/pre>";
}
/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {
    $query = Connect::getInstance()->query("SELECT * FROM users LIMIT 2");
    echo "<pre>", print_r($query, true), "<?/pre>";
    echo "<pre>", print_r($query->rowCount(), true), "<?/pre>";
    echo "<pre>", print_r($query->fetchAll(), true), "<?/pre>";
}catch (PDOException $exception) {
    echo "<pre>", print_r($exception, true), "<?/pre>";
}
/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {
    $exec = Connect::getInstance()->exec(" UPDATE users SET first_name = 'Leonardo', last_name = 'Sá' WHERE id = 52");
    var_dump($exec);

}catch (PDOException $exception){
    echo "<pre>",print_r($exception, true),"</pre>";
}
/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {
    $exec = Connect::getInstance()->exec("DELETE from users WHERE id > 50");
    var_dump($exec);
}catch (PDOException $exception) {
    var_dump($exception);
}