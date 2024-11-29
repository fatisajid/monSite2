<?php

namespace App\Controllers;

use App\Models\Categorie;

use App\Utils\AbstractController;
use Config\Database;





class CategoryController extends AbstractController
{
    public function index()
    {

        $categorie = new Categorie(null, null, null, null, null, null, null, null);
        $categories = $categorie->getAllCategories();

        // Inclusion manuelle de la vue avec les produits
        require_once(__DIR__ . '/../Views/products/home.view.php');
    }
}
