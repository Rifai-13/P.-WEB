<?php
namespace demo\controllers;

use demo\models\Fiction;
use demo\models\NonFiction;


class BookController {
    public function createFictionBook($title, $author) {
        return new Fiction($title, $author);
    }

    public function createNonFictionBook($title, $author) {
        return new NonFiction($title, $author);
    }
}
