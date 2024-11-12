<?php

// namespace Config;

// use PDO;
// use PDOException;

// class Database
// {
//     private $host = 'localhost';
//     private $db_name = 'e-commerce';
//     private $username = 'root';
//     private $password = '';
//     public $conn;

//     public function getConnection()
//     {
//         $this->conn = null;
//         try {
//             $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $exception) {
//             echo "Erreur de connexion : " . $exception->getMessage();
//         }
//         return $this->conn;
//     }
// }

namespace Config;

use PDO;
use Exception;

class DataBase
{
    static function getConnection()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=e-commerce;charset=utf8', 'root');
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
        return $pdo;
    }
}

