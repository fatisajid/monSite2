<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\Product;



class HomeController extends AbstractController
{


    public function index()
    {

        $product = new Product(null, null, null, null, null, null, null,null);
        $products = $product->getAllProducts();

        // Inclusion manuelle de la vue avec les produits


        // Inclut la vue de la page d'accueil des produits
        require_once(__DIR__ . '/../Views/products/home.view.php');
    }
}
