<?php
namespace demo\models;

use demo\traits\Describable;

class NonFiction extends Book {
    use Describable;

    public function getGenre() {
        return "Non-Fiksi";
    }
}
