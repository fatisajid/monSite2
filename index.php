<?php



// require_once 'Config/Database.php';
// require_once 'Config/Router.php';
// require_once 'src/Controllers/HomeController.php';
// require_once 'src/Controllers/LoginController.php';
// require_once 'src/Controllers/RegisterController.php';
// require_once 'src/Controllers/ProductController.php';

// session_start();
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// \Config\Router::route($uri);





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
$routes->addRoute('/register', 'RegisterController', 'register');
$routes->addRoute('/login', 'LoginController', 'index');
$routes->addRoute('/logout', 'LogoutController', 'logout');

// Routes pour les produits
$routes->addRoute('/products', 'ProductController', 'index'); // Affichage des produits
$routes->addRoute('/product/add', 'ProductController', 'create'); // Ajout de produit
$routes->addRoute('/product/edit', 'ProductController', 'edit'); // Modification de produit
$routes->addRoute('/product/delete', 'ProductController', 'delete'); // Suppression de produit

// Traite la requête et exécute la méthode correspondante
$routes->handleRequest();
