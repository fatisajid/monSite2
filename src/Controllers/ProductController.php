<?php

namespace App\Controllers;

use App\Models\Product;
use App\Utils\AbstractController;
use App\Models\User;

use Config\Database;

class ProductController extends AbstractController
{
    public function index()
    {

        $product = new Product(null, null, null, null, null, null, null, null);
        $products = $product->getAllProducts();

        // Inclusion manuelle de la vue avec les produits
        require_once(__DIR__ . '/../Views/products/home.view.php');
    }


    public function show()
    {

        // Récupération d'un produit spécifique par ID
        $productModel = new Product(null, null, null, null, null, null, null, null);
        $product = $productModel->getAllProducts();


        // Inclusion manuelle de la vue avec les produits
        include __DIR__ . '/../views/products/product.view.php'; // Inclure la vue
    }

    public function create()
    {


        // Vérification si l'utilisateur est connecté et autorisé à créer un produit (exemple : admin)
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
            if (isset($_POST['name'])) {
                $this->check('name', $_POST['name']);
                // $this->check('created_at', $_POST['created_at']);
                $this->check('description', $_POST['description']);
                $this->check('price', $_POST['price']);
                $target_dir = "public/img/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



                if (empty($this->arrayError)) {
                    $name = htmlspecialchars($_POST['name']);
                    $created_at = date('Y-m-d H:i:s');
                    $description = htmlspecialchars($_POST['description']);
                    $price = htmlspecialchars($_POST['price']);
                    // $id_user = $_SESSION['user']['idUser'];
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $img = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                        $img_path =  $img;
                    }
                    $product = new Product(null, null, $name, $description, $price, $created_at, null, $img_path);

                    $product->create();
                    // $this->redirectToRoute('/');
                }
            }
            require_once(__DIR__ . '/../Views/products/create.view.php');
        } else {
            require_once(__DIR__ . '/../Views/error/404.php');
        }
    }

    public function edit()
    {
        if ($_SESSION['user']['role'] == 'admin') {


            if (isset($_GET['id'])) {
                $idProduct = htmlspecialchars($_GET['id']);
                $productModel = new Product($idProduct, null, null, null, null, null, null, null);
                $products = $productModel->getProductById();
            }


            if (!$products) {
                $this->redirectToRoute('/products');
            }

            if (isset($_POST['name'], $_POST['description'], $_POST['price'])) {
                var_dump($products);

                $this->check('name', $_POST['name']);
                $this->check('description', $_POST['description']);
                $this->check('price', $_POST['price']);
                $target_dir = "public/img/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                var_dump($_FILES['image']);



                if (empty($this->arrayError)) {
                    $name = htmlspecialchars($_POST['name']);
                    $image = htmlspecialchars($_FILES['image']['name']);
                    $description = htmlspecialchars($_POST['description']);
                    $price = htmlspecialchars($_POST['price']);
                    $updatedAt = date('Y-m-d H:i:s');
                    if ($products->getImage()) {
                        $img_path = $products->getImage();
                    } else {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $img = htmlspecialchars(basename($_FILES["image"]["name"]));
                            $img_path =  $img;
                        }
                    }



                    $product = new Product($idProduct, null, $name, $description, $price, null, $updatedAt, $img_path);

                    $product->updateProduct();

                    $this->redirectToRoute('/');
                }
            }
            require_once(__DIR__ . '/../Views/products/edit.view.php');
        } else {
            $this->redirectToRoute('/');
        }
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $idProduct = htmlspecialchars($_POST['id']);
            $product = new Product($idProduct, null, null, null, null, null, null, null);

            $myProduct = $product->getProductById();
            $image = $myProduct->getImage();
            unlink("public/img/" . $image);
            $product->deleteProduct();
            var_dump($image);

            $this->redirectToRoute('/');
        }
    }
}
