<?php
namespace Models;

use Traits\Describable;

class Fiction extends Book {
    use Describable;

    public function getGenre() {
        return "Fiksi";
    }
}
