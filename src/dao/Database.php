<?php
declare(strict_types=1);
namespace kanban\dao;


class Database {
    private static \PDO $db;

    private function __construct() {}

    public static function getConnection() : \PDO {

        $config = "/var/www/html/kanban/src/config/param.ini";

        // si la connexion n'est pas deja cree
        if (!isset(self::$db)) {
            // s'il y a erreur, cela sera catch par DaoResto.php

            // On recupere la config [BDD] dans param.ini
            
            if (file_exists($config)) {
                $param = parse_ini_file($config, true);
                extract($param['BDD']);     // extract du tag [BDD] et génère les variables $host, $port ... du nom donne dans param.ini          
            } 
            else throw new DaoException(MyExceptionCase::PARAM_KO);

            $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
            self::$db = new \PDO($dsn, $user, $password);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }
}