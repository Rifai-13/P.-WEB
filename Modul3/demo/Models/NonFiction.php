<?php
namespace Models;

use Traits\Describable;

class NonFiction extends Book {
    use Describable;

    public function getGenre() {
        return "Non-Fiksi";
    }
}
