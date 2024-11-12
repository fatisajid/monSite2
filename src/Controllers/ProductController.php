<?php

namespace App\Controllers;

use App\Models\Product;
use App\Utils\AbstractController;

use Config\Database;

class ProductController extends AbstractController
{
    public function index()
    {

        $product = new Product(null, null, null, null, null, null, null);
        $products = $product->getAllProducts();

        // Inclusion manuelle de la vue avec les produits
        require_once(__DIR__ . '/../Views/products/home.view.php');
    }


    //     public function show($id)
    //     {
    //         // Récupérer la connexion à la base de données
    //         $db = DataBase::getConnection();

    //         // Récupération d'un produit spécifique par ID
    //         $productModel = new Product($db);
    //         $product = $productModel->getProductById($id);

    //         // Si le produit n'existe pas, rediriger vers la liste des produits
    //         if (!$product) {
    //             $this->redirectToRoute('/products');
    //         }


    //         // Inclusion manuelle de la vue avec les produits
    //         include __DIR__ . '/../views/products/product.view.php'; // Inclure la vue
    //     }

    //     public function create()
    //     {
    //         // Récupérer la connexion à la base de données
    //         $db = DataBase::getConnection();

    //         // Vérification si l'utilisateur est connecté et autorisé à créer un produit (exemple : admin)
    //         if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    //             $this->redirectToRoute('/');
    //         }

    //         // Traitement du formulaire de création de produit
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             // Validation des champs
    //             $this->check('name', $_POST['name']);
    //             $this->check('description', $_POST['description']);
    //             $this->check('price', $_POST['price']);

    //             // Si aucune erreur n'est trouvée
    //             if (empty($this->arrayError)) {
    //                 $data = [
    //                     'name' => htmlspecialchars($_POST['name']),
    //                     'description' => htmlspecialchars($_POST['description']),
    //                     'price' => $_POST['price']
    //                 ];

    //                 $productModel = new Product($db);
    //                 if ($productModel->createProduct($data)) {
    //                     // Redirection vers la liste des produits après création
    //                     $this->redirectToRoute('/products');
    //                 } else {
    //                     $error = "Erreur lors de la création du produit.";
    //                 }
    //             }
    //         }


    //         // Inclusion manuelle de la vue avec les produits
    //         include __DIR__ . '/../views/products/create.view.php'; // Inclure la vue
    //     }

    //     public function edit($id)
    //     {
    //         // Vérification si l'utilisateur est connecté et autorisé à modifier un produit (exemple : admin)
    //         if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    //             $this->redirectToRoute('/');
    //         }

    //         // Récupération du produit à modifier

    //         // Récupérer la connexion à la base de données
    //         $db = DataBase::getConnection();

    //         $productModel = new Product($db);
    //         $product = $productModel->getProductById($id);

    //         // Si le produit n'existe pas, rediriger vers la liste des produits
    //         if (!$product) {
    //             $this->redirectToRoute('/products');
    //         }

    //         // Traitement du formulaire de modification du produit
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             // Validation des champs
    //             $this->check('name', $_POST['name']);
    //             $this->check('description', $_POST['description']);
    //             $this->check('price', $_POST['price']);

    //             // Si aucune erreur n'est trouvée
    //             if (empty($this->arrayError)) {
    //                 $data = [
    //                     'name' => htmlspecialchars($_POST['name']),
    //                     'description' => htmlspecialchars($_POST['description']),
    //                     'price' => $_POST['price']
    //                 ];

    //                 if ($productModel->updateProduct($id, $data)) {
    //                     // Redirection vers la liste des produits après mise à jour
    //                     $this->redirectToRoute('/products');
    //                 } else {
    //                     $error = "Erreur lors de la mise à jour du produit.";
    //                 }
    //             }
    //         }

    //         // Rendu de la vue de modification de produit
    //         // $this->render('products/edit.view.php', ['product' => $product]);
    //         // Inclusion manuelle de la vue avec les produits
    //         include __DIR__ . '/../Views/products/edit.view.php'; // Inclure la vue
    //     }

    //     public function delete($id)
    //     {
    //         // Vérification si l'utilisateur est connecté et autorisé à supprimer un produit (exemple : admin)
    //         if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    //             $this->redirectToRoute('/');
    //         }

    //         // Suppression du produit
    //         // Récupérer la connexion à la base de données
    //         $db = DataBase::getConnection();

    //         $productModel = new Product($db);
    //         if ($productModel->deleteProduct($id)) {
    //             // Redirection vers la liste des produits après suppression
    //             $this->redirectToRoute('/products');
    //         } else {
    //             $error = "Erreur lors de la suppression du produit.";
    //         }
    //     }
}
