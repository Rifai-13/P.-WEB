<?php
namespace controllers;

use Models\Fiction;
use Models\NonFiction;

class BookController {
    public function createFictionBook($title, $author) {
        return new Fiction($title, $author);
    }

    public function createNonFictionBook($title, $author) {
        return new NonFiction($title, $author);
    }
}
