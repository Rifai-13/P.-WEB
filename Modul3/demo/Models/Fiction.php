<?php
namespace demo\models;

use demo\traits\Describable;

class Fiction extends Book {
    use Describable;

    public function getGenre() {
        return "Fiksi";
    }
}
