<?php
/**
 * Created by PhpStorm.
 * User: keyersoze
 * Date: 03-01-2018
 * Time: 13:11
 */

namespace Library\DatabaseConnection;


class DatabaseConnection
{

    private static $instanceDBase;
    private $databaseConnection;
    private $errorDBaseConnection;

    public static function getDatabaseConnection():DatabaseConnection
    {
        if(static::$instanceDBase === null)
            static::$instanceDBase = new DatabaseConnection();
        return static::$instanceDBase;

    }

    private function __construct()
    {
        try {

            $this->databaseConnection = new \PDO(
                "mysql:host=localhost;dbname=LibrarySchool",
                "douglasvaldo", "douglas.,valdo",
                array(\PDO::ERRMODE_EXCEPTION, \PDO::ERRMODE_WARNING,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

        }catch (\PDOException $exception) {
            $this->errorDBaseConnection = $exception->errorInfo;
        }
    }

    public function errorConnectingDatabase()
    {
        return $this->errorDBaseConnection;
    }

    public function DatabaseConnection():\PDO
    {
        return $this->databaseConnection;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}


