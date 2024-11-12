<?php

namespace App\Models;

use PDO;

class Category
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createCategory($data)
    {
        $stmt = $this->db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
        return $stmt->execute($data);
    }

    public function getAllCategories()
    {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
