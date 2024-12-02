<?php

namespace App\Models;

use Config\DataBase;
use PDO;


class Product
{

    protected ?int $id;
    protected ?string $category;
    protected ?string $name;
    protected ?string $description;
    protected ?float $price;
    protected ?string $created_at;
    protected ?string $updated_at;
    protected ?string $image;

    public function __construct(?int $id, ?string $category, ?string $name,  ?string $description,  ?float $price, ?string $created_at, string|null $updated_at, ?string $image)
    {
        $this->id = $id;
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->image = $image;
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
                $product = new Product($row['id'], $row['category_id'], $row['name'], $row['description'], $row['price'], null, null, $row['image']);
                $products[] = $product;
            }
            return $products;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }


    public function create()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO `products` (id, category, name, description, price, created_at, updated_at, image) VALUES (?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id, $this->category, $this->name, $this->description, $this->price, $this->created_at, $this->updated_at, $this->image]);
    }

    public function getProductById()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM `products` WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Product($row['id'], $row['category'], $row['name'], $row['description'], $row['price'], $row['created_at'], $row['updated_at'], $row['image']);
        } else {
            return null;
        }
    }

    public function getProductByCategory()
    {
        $pdo = DataBase::getConnection();
        $sql = 'SELECT * FROM `products` WHERE `category` = ?';
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->category]);
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $product = new Product($row['id'], $row['category'], $row['name'], $row['description'], $row['price'], null, null, $row['image']);
                $products[] = $product;
            }
            return $products;
        }
    }



    public function updateProduct()
    {

        $pdo = DataBase::getConnection();
        $sql = "UPDATE `products` 
        SET `name` = ?, `description` = ?, `price` = ?,`updated_at` = ?, `image` = ?
        WHERE `id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->name, $this->description, $this->price, $this->updated_at, $this->image, $this->id]);
    }

    public function deleteProduct()
    {
        $pdo = DataBase::getConnection();
        $sql = 'DELETE FROM `products` WHERE `id` = ?';
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id]);
    }

    // requette pour recupere les produits



    // Nouvelle méthode pour récupérer les produits par utilisateur
    //     public function getProductsByUser($userId)
    //     {
    //         $stmt = $this->conn->prepare("SELECT * FROM products WHERE user_id = :userId");
    //         $stmt->execute(['userId' => $userId]);
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }
}
