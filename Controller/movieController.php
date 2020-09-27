<?php
require_once ('./Model/movieModel.php');
require_once ('./View/movieView.php');
require_once ('./Model/roomModel.php');

class movieController{
    private $movieModel;
    private $view;
    private $roomModel;

    public function __construct(){
        $this->movieModel = new MovieModel();
        $this->roomModel = new RoomModel();
        $this->view = new MovieView();
    }

    function homeController(){
        $this->view->renderHome();
    }

    function contactoController(){
        $this->view->renderContacto();
    }

    function estrenosController(){
        $movies=$this->movieModel->getAllMoviesAndRooms();
        $rooms=$this->roomModel->getAllRooms();
        $this->view->renderEstrenos($movies, $rooms);
    }

    function roomController(){
        $room = $this->roomModel->getAllRooms();
        $this->view->renderRooms($room);
    }

    function genreController(){
        $genre = $_REQUEST['genre'];
        $movies = $this->movieModel->getMoviesByGenre($genre);
        $this->view->renderMoviesByGenre($movies);

    }

    function detailController(){
        $id = $_REQUEST['id'];
        $movie = $this->movieModel->getMovieById($id); 
        $this->view->renderMovieById($movie);

    }

    function moviesByRoomController(){
        $room = $_REQUEST['room'];
        $movies = $this->movieModel->getMoviesByRoom($room);
        $this->view->renderMoviesByRoom($movies);
    }

    function insertNewMovie(){
        $this->movieModel->InsertMovie($_POST['input_nombre'],$_POST['input_genero'],$_POST['input_sinopsis'],$_POST['input_puntaje'],$_POST['input_id_sala']);
        $this->estrenosController();
    }
    
}