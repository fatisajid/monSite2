<?php
namespace App\Models;

use PDO;

class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createOrder($data) {
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, total, status) VALUES (:user_id, :total, :status)");
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function getOrdersByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
