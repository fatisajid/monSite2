<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\User;

class RegisterController extends AbstractController
{
    public function index()
    {

        if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
            $this->check("username", $_POST['username']);
            $this->check("email", $_POST['email']);
            $this->check("password", $_POST['password']);


            // var_dump($_POST['email']);
            if (empty($this->arrayError)) {
                $username =   htmlspecialchars($_POST['username']);
                $email =   htmlspecialchars($_POST['email']);
                $password =   htmlspecialchars($_POST['password']);

                // $registerDate = date('Y-m-d');
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $role = 'customer';
                $createdAt = Date('Y-m-d');
                $user = new User(null, $username, $email, $passwordHash, $role, $createdAt);
                $user->save();
                $this->redirectToRoute('/login');
            }
        }
        require_once(__DIR__ . "/../Views/security/register.view.php");
    }
}
