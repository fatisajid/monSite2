<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\Product;

class HomeController extends AbstractController
{
    public function index()
    {
        // Vérifie si un utilisateur est connecté
        if (isset($_SESSION['user'])) {
            // Crée une instance de la classe Product

            $product = new Product(null, null, null, null, null, null, null, null, null, null, null);

            //  $product = new Product($this->db);


            // Si l'utilisateur est un administrateur (par exemple rôle = 1)
            if ($_SESSION['user']['role'] == 1) {
                // Récupère les produits associés à l'utilisateur
                $arrayProductsByUsers = $product->getProductsByUser($_SESSION['user']['id']);
            }
        }

        // Inclut la vue de la page d'accueil des produits
        require_once(__DIR__ . '/../Views/products/home.view.php');
    }
}
