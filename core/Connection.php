<?php

namespace App\Core;

use PDO;
use App\App;
use PDOException;

class Connection {

    private static ?Connection $instance = null;
    private PDO $conn;

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=$_ENV[DB_HOST];dbname=$_ENV[DB_NAME]",
                $_ENV['DB_USER'],
                $_ENV['DB_PASS'],
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            $mess[] = $e->getMessage();
            $error  = new App;
            $error->loadError('database', $mess);
        }
    }

    public static function getInstance()
    : ?Connection {
        if(!self::$instance) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConnection()
    : PDO {
        return $this->conn;
    }
}
