<?php 

require_once './api/APIView.php';

abstract class ApiController {
    private $data; 
    private $view;

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}

