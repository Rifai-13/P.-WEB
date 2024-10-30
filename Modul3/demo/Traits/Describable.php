<?php
namespace Traits;

trait Describable {
    protected $title;
    protected $author;

    public function getDescription() {
        return "Judul: {$this->title}, Penulis: {$this->author}";
    }
}
