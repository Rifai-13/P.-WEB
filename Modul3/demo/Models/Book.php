<?php
namespace demo\models;

abstract class Book {
    var $title;
    var $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    abstract public function getGenre();
}
