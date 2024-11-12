<?php

namespace App\Controllers;

use App\Models\Category;
use Config\Database;

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->categoryModel = new Category($db);
    }

    public function index()
    {
        return $this->categoryModel->getAllCategories();
    }
}
