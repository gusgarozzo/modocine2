<?php
require_once ('./Model/movieModel.php');
require_once ('./View/movieView.php');

class movieController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new movieModel();
        $this->view = new MovieView();
    }

    
}