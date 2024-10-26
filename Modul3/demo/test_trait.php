<?php
require_once __DIR__ . '/Traits/Describable.php';

class Test {
    use Traits\Describable;

    // Deklarasi properti
    protected $title;
    protected $author;

    public function __construct() {
        $this->title = "Test Title";
        $this->author = "Test Author";
    }
}

$test = new Test();
echo $test->getDescription();
