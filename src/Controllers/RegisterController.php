<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;
use Config\Router;
use Config\Database;

class RegisterController extends AbstractController
{
    public function register()
    {
        // Vérifie si la requête est de type POST (formulaire soumis)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données envoyées par le formulaire
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);  // Ajout de la récupération de l'email
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hachage du mot de passe
            $role = 'user';  // Définir un rôle par défaut (tu peux changer si tu as une gestion de rôles plus avancée)

            // Créer une instance du modèle User
            $userModel = new User();

            // Créer un tableau de données à envoyer à la méthode createUser
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ];

            // Appeler la méthode createUser avec les données
            if ($userModel->createUser($data)) {
                // Si l'utilisateur a bien été créé, rediriger vers la page de connexion
                header('Location: /login');
                exit();  // N'oublie pas de quitter le script après la redirection
            } else {
                // Si une erreur survient lors de l'ajout de l'utilisateur
                echo "Erreur lors de l'inscription. Veuillez réessayer.";
            }
        }

        // Affichage de la vue d'inscription (si la méthode n'est pas POST)
        include __DIR__ . '/../Views/security/register.view.php';
    }
}
