<?php
namespace Controller;

class Controller {
    //variable attribut
    var $controllerName;
    var $controllerMethod;

    //Method untuk mengambil semua atribut
    public function getControllerAttributes() {
        return[
            'controllerName' => $this->controllerName,
            'Method' => $this->controllerMethod
        ];
    }
}