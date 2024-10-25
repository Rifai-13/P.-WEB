<?php

namespace Controller;

include 'Traits/ResponseFormatter.php';
include 'Controllers/controller.php';

use Traits\ResponseFormatter;

class ProductController extends Controller {
    use ResponseFormatter;
    public function __construct() {
        $this->controllerName = 'Get All Product';
        $this->controllerMethod = 'GET';
    }
    //Array Dummy data
    public function getAllProduct() {
        $dummyData = [
            'Air Mineral',
            'Kebab',
            'Sosis',
            'Jus jeruk'
        ];
    
        return $this->ResponseFormatterHtml(200, 'Success', [
            'controller_attribute' => $this->getControllerAttributes(),
            'product' => $dummyData
        ]);
    }
};