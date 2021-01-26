<?php


namespace Source\DataBase;

use \PDO;
use \PDOException;

class Connect
{
    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "fullstackphp";
    private const PASSWD = "mysql";

    private const OPTIONS = [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if(empty(self::$instance)){
            try {
                self::$instance =  new PDO(
                    "mysql:host=".self::HOST.";dbname=". self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            }catch (PDOException $exception){
                die("<H1>Whoops! Erro ao conectar...</H1>");
            }
        }
        return self::$instance;
    }



    final private function __construct()
    {
    }

    final private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}