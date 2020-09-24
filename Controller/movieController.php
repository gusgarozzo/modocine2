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

    function movieController(){
        $this->model->getAllMovies();
        //$this->view->tableAllMovies();
    }

    function roomController(){
        $room = $this->model->getRoom();
        $this->view->showRoom($room);
    }

    function genreController(){
        $genre = $_REQUEST['genre'];
        var_dump($genre);
        $movies = $this->model->getMoviesByGenre($genre);
        $this->view->showMoviesByGenre($movies);

    }

    function moviesByRoomController(){
        $room = $_REQUEST['room'];
        $movies = $this->model->getMoviesByRoom($room);
        //$this->view->showMoviesByRoom($movies);
    }
    
}