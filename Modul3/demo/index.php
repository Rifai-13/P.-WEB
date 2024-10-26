<?php
require_once 'controllers/BookController.php';
require_once 'models/Book.php';
require_once 'models/Fiction.php';
require_once 'models/NonFiction.php';
require_once 'traits/Describable.php';

use demo\controllers\BookController;

$controller = new BookController();

$fictionBook = $controller->createFictionBook("Harry Potter", "J.K. Rowling");
echo $fictionBook->getDescription() . " - Genre: " . $fictionBook->getGenre() . PHP_EOL;

$nonFictionBook = $controller->createNonFictionBook("Sapiens", "Yuval Noah Harari");
echo $nonFictionBook->getDescription() . " - Genre: " . $nonFictionBook->getGenre() . PHP_EOL;
