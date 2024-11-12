<?php

namespace App\Models;

use Config\DataBase;
use PDO;

var_dump($resultFetch);
class Product
{

    protected ?int $id;
    protected ?string $category_id;
    protected ?string $name;
    protected ?float $description;
    protected ?int $price;
    protected ?string $created_at;
    protected ?int $updated_at;


    public function __construct(?int $id, ?int $category_id, ?string $name,  ?string $description,  ?float $price, ?string $created_at, string|null $updated_at)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    public function getAllProducts()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM products";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $product = new Product($row['id'], $row['category_id'], $row['name'], $row['description'], $row['price'], null, null);
                $products[] = $product;
                var_dump($resultFetch);
            }
            return $products;
        }
    }


    public function getName(): ?string
    {
        return $this->name;
    }


    // public function createProduct($data)
    // {
    //     $stmt = $this->conn->prepare("INSERT INTO products (id, category_id, name, description, price) VALUES 
    //     (:id, :category_id, :name, :description, :price)");
    //     return $stmt->execute($data);
    // }

    // public function getProductById($id)
    // {
    //     $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
    //     $stmt->execute(['id' => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function updateProduct($id, $data)
    // {
    //     $stmt = $this->conn->prepare("UPDATE products SET category_id = :category_id, name = :name, description = :description, price = :price WHERE id = :id");
    //     $data['id'] = $id;
    //     return $stmt->execute($data);
    // }

    // public function deleteProduct($id)
    // {
    //     $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
    //     return $stmt->execute(['id' => $id]);
    // }

    // requette pour recupere les produits



    // Nouvelle méthode pour récupérer les produits par utilisateur
    //     public function getProductsByUser($userId)
    //     {
    //         $stmt = $this->conn->prepare("SELECT * FROM products WHERE user_id = :userId");
    //         $stmt->execute(['userId' => $userId]);
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }
}
