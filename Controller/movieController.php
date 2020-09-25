<?php
require_once ('./Model/movieModel.php');
require_once ('./View/movieView.php');

class movieController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new MovieModel();
        $this->view = new MovieView();
    }

    function homeController(){
        $this->view->renderHome();
    }

    function contactoController(){
        $this->view->renderContacto();
    }

    function estrenosController(){
        $movies=$this->model->getAllMovies();
        $this->view->renderEstrenos($movies);
    }

    function roomController(){
        $room = $this->model->getAllRooms();
        $this->view->renderRooms($room);
    }

    function genreController(){
        $genre = $_REQUEST['genre'];
        $movies = $this->model->getMoviesByGenre($genre);
        $this->view->renderMoviesByGenre($movies);

    }

    function moviesByRoomController(){
        $room = $_REQUEST['room'];
        $movies = $this->model->getMoviesByRoom($room);
        $this->view->renderMoviesByRoom($movies);
    }

    function insertNewMovie(){
        $this->model->InsertMovie($_POST['input_nombre'],$_POST['input_genero'],$_POST['input_id_sala']);

        $this->estrenosController();
    }
    
}