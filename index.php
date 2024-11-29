<?php

require "vendor/autoload.php"; // Charge automatiquement toutes les dépendances de Composer
session_start();

use Config\Router;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\ProductController;


// Crée une instance de Router
$routes = new Router();

/** 
 * Ajoute des routes au routeur. Chaque route est associée à un contrôleur et une méthode. 
 * La méthode `addRoute` prend 3 arguments : 
 * - la route (ex : '/')
 * - le contrôleur (ex : 'HomeController')
 * - la méthode (ex : 'index')
 */

// Route pour la page d'accueil
$routes->addRoute('/', 'HomeController', 'index');

// Routes pour la connexion/déconnexion et l'inscription
$routes->addRoute('/register', 'RegisterController', 'index');
$routes->addRoute('/login', 'LoginController', 'index');
$routes->addRoute('/logout', 'LogoutController', 'logout');

// Routes pour les produits

$routes->addRoute('/product', 'ProductController', 'index'); // Affichage des produits
$routes->addRoute('/addProduct', 'ProductController', 'create'); // Ajout de produit
$routes->addRoute('/editProduct', 'ProductController', 'edit'); // Modification de produit
$routes->addRoute('/deleteProduct', 'ProductController', 'delete'); // Suppression de produit

// Traite la requête et exécute la méthode correspondante
$routes->handleRequest();
