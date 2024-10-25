<?php 

include 'Controllers/ProductController.php';

use Controller\ProductController;

header('Content-Type: text/html; charset=utf-8');

$productController = new ProductController;

echo $productController->getAllProduct();
