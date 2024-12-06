<?php

namespace App\Models;

use Config\Database;
use PDO;

class User
{
    protected ?int $id;
    protected ?string $username;
    protected ?string $email;
    protected ?string $password;
    protected int|string|null $role;

    public function __construct(?int $id, ?string $username, ?string $email, ?string $password, int|string|null $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        // $this->score = $score;
        $this->role = $role;
    }

    public function save(): bool
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO users (id,username,email,password,role) VALUES (?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id, $this->username, $this->email, $this->password, $this->role]);
    }

    public function login($email)
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$email]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row['role'] == 'admin') {
            return new Users($row['id'], $row['username'], $row['email'], $row['password'], $row['role']);
        } elseif ($row['role'] == 'customer') {
            return new User($row['id'], $row['username'], $row['email'], $row['password'], $row['role']);
        } else {
            return null;
        }
    }

    public function getUserById()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM `user` WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User($row['id'], $row['username'], $row['email'], $row['password'], $row['role']);
        } else {
            return null;
        }
    }



    // // Créer un utilisateur
    // public function createUser($data)
    // {
    //     // Hacher le mot de passe avant de l'enregistrer
    //     $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

    //     // Préparer la requête SQL pour insérer un nouvel utilisateur
    //     $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role, created_at) 
    //                               VALUES (:username, :email, :password, :role, NOW())");

    //     // Exécuter la requête avec les données fournies
    //     return $stmt->execute([
    //         'username' => $data['username'],
    //         'email' => $data['email'],
    //         'password' => $hashedPassword,
    //         'role' => $data['role'] ?? 'user' // Par défaut, on donne le rôle 'user'
    //     ]);
    // }

    // // Méthode pour s'authentifier avec un nom d'utilisateur et un mot de passe
    // public function authenticate($username, $password)
    // {
    //     $stmt = $this->conn->prepare("SELECT password FROM users WHERE username = :username");
    //     $stmt->execute(['username' => $username]);
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $user && password_verify($password, $user['password']);
    // }

    // // Méthode pour trouver un utilisateur par e-mail
    // public function findByEmail($email)
    // {
    //     $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
    //     $stmt->execute(['email' => $email]);
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($user) {
    //         // Si un utilisateur est trouvé, retourner ses informations
    //         return $user;
    //     }

    //     return null; // Si aucun utilisateur n'est trouvé
    // }

    // Méthode pour récupérer le mot de passe
    public function getPassword()
    {
        return $this->password;
    }

    // Getter pour l'email
    public function getEmail()
    {
        return $this->email;
    }

    // Getter pour le nom d'utilisateur
    public function getUsername()
    {
        return $this->username;
    }

    // Getter pour l'ID
    public function getId()
    {
        return $this->id;
    }

    // Getter pour le rôle
    public function getRole()
    {
        return $this->role;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }



    public function setIdRole(int|string $role): static
    {
        $this->role = $role;
        return $this;
    }

}
