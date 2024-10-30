<?php

require_once __DIR__ . '/Traits/Describable.php';
require_once __DIR__ . '/Models/Book.php';
require_once __DIR__ . '/Models/Fiction.php';
require_once __DIR__ . '/Models/NonFiction.php';
require_once __DIR__ . '/controllers/BookController.php';

use Controllers\BookController;

// Buat instance dari BookController
$controller = new BookController();

// Buat dan tampilkan detail buku fiksi
$fictionBook = $controller->createFictionBook("Harry Potter", "J.K. Rowling");
echo $fictionBook->getDescription() . " - Genre: " . $fictionBook->getGenre() . "\n";

$fictionBook = $controller->createFictionBook("Laskar pelangi", "Andrea Hirata");
echo $fictionBook->getDescription() . " - Genre: " . $fictionBook->getGenre() . "\n";

// Buat dan tampilkan detail buku non-fiksi
$nonFictionBook = $controller->createNonFictionBook("Atomic Habits", "James Clear");
echo $nonFictionBook->getDescription() . " - Genre: " . $nonFictionBook->getGenre() . "\n";

$nonFictionBook = $controller->createNonFictionBook("The Power of Habit", "Charles Duhigg");
echo $nonFictionBook->getDescription() . " - Genre: " . $nonFictionBook->getGenre() . "\n";
