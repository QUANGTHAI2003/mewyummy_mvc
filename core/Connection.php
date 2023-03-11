<?php

namespace App\Core;
use App\App;
class Connection
{
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'exam';

    private function __construct()
    {
        try {
            $this->conn = new \PDO(
                "mysql:host={$this->host};
                dbname={$this->name}",
                $this->user,
                $this->pass,
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
        } catch(\PDOException $e) {
            $mess[] = $e->getMessage();
            $error = new App;
            $error->loadError('database', $mess);
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
