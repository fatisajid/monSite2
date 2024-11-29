<?php

namespace App\Models;

use Config\DataBase;
use PDO;

class Categorie
{
    protected ?int $id;
    protected ?string $name;
    protected ?string $image;
    protected ?string $description;
    protected ?string $created_at;


    public function __construct(?int $id, ?string $name, ?string $image, ?string $description, ?string $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->created_at = $created_at;
    }



    public function getAllCategories()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM categories";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $categorie = new Categorie($row['id'], $row['name'], $row['image'], $row['description'], null);
                $categories[] = $categorie;
            }
            return $categories;
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
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
