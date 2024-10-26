<?php
namespace Traits;

trait Describable {
    var $title;
    var $author;

    public function getDescription() {
        return "Judul: {$this->title}, Penulis: {$this->author}";
    }
}
