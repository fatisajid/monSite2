<?php

namespace App\Models;

use Config\Database;
use PDO;

class User
{
    private $conn;
    private $id;
    private $email;
    private $username;
    private $password;
    private $role;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function hydrate($data)
    {
        $this->id = $data['id'];
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->role = $data['role'];
    }

    // Créer un utilisateur
    public function createUser($data)
    {
        // Hacher le mot de passe avant de l'enregistrer
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role, created_at) 
                                  VALUES (:username, :email, :password, :role, NOW())");

        // Exécuter la requête avec les données fournies
        return $stmt->execute([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'role' => $data['role'] ?? 'user' // Par défaut, on donne le rôle 'user'
        ]);
    }

    // Méthode pour s'authentifier avec un nom d'utilisateur et un mot de passe
    public function authenticate($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']);
    }

    // Méthode pour trouver un utilisateur par e-mail
    public function findByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Si un utilisateur est trouvé, retourner ses informations
            return $user;
        }

        return null; // Si aucun utilisateur n'est trouvé
    }

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
}
