<?php
namespace demo\traits;

trait Describable {
   public function Describable($title, $author = null) {
       return json_encode([
           'title' => $title,
           'author' => $author
       ], JSON_PRETTY_PRINT);
   }

   public function DescribableHtml($title, $author = null) {
       $html = "<html><head><meta charset='utf-8'><title>Describe</title></head><body>";

       $html .= "<pre>" . $this->Describable($title, $author) . "</pre>";

       $html .= "</body></html>";
       return $html;
   }

}

