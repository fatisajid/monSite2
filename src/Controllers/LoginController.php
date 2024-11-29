<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class LoginController extends AbstractController
{
    public function index() // Affichage de la page de connexion
    {

        // var_dump(isset($_SESSION["user"]));
        // Vérifier si l'utilisateur a soumis le formulaire de connexion
        if (isset($_POST['email'], $_POST['password'])) {
            // Valider les champs `email` et `password`
            $this->check('email', $_POST['email']);
            $this->check('password', $_POST['password']);
            // var_dump($_POST['password']);

            // Si aucune erreur de validation n'est présente
            if (empty($this->arrayError)) {
                // Nettoyer les entrées utilisateur
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                // var_dump($email);
                // var_dump($password);
                // Créer une instance de User et récupérer l'utilisateur via l'email
                $userModel = new User(null, null, $email, $password, null);
                $user = $userModel->login($email);

                // Si un utilisateur est trouvé et que le mot de passe est valide
                if ($user && password_verify($password, $user->getPassword())) {
                    // Stocker les informations de l'utilisateur dans la session
                    $_SESSION['user'] = [
                        'id' => uniqid(),
                        'email' => $user->getEmail(),
                        'username' => $user->getUsername(),
                        'userId' => $user->getId(),
                        'role' => $user->getRole()  // Exemple de rôles : 1 pour admin, 2 pour client
                    ];

                    // Redirection selon le rôle de l'utilisateur
                    if ($user->getRole() == 1) { // Rôle d'administrateur
                        $this->redirectToRoute('/admin/dashboard'); // Rediriger vers le tableau de bord admin
                    } else { // Rôle de client
                        $this->redirectToRoute('/'); // Rediriger vers la page d'accueil
                    }
                } else {
                    $error = "L'adresse email ou le mot de passe est incorrect.";
                }
            }
        }

        // Vérifier si l'utilisateur est déjà connecté
        if (isset($_SESSION['user'])) {
            $this->redirectToRoute('/');
        }

        // Charger la vue de connexion

        require_once(__DIR__ . "/../Views/security/login.view.php");
    }

    public function logout() // Méthode de déconnexion
    {
        // Détruire la session pour déconnecter l'utilisateur
        session_destroy();
        $this->redirectToRoute('/login'); // Rediriger vers la page de connexion
    }
}
