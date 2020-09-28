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

    function movieDetailController(){
        $id = $_REQUEST['id'];
        $movie = $this->movieModel->getMovieById($id); 
        $this->view->renderMovieById($movie);

    }

    function roomDetailController(){
        $id = $_REQUEST['id'];
        $room = $this->roomModel->getRoomById($id); 
        $this->view->renderRoomById($room);

    }

    function moviesByRoomController(){
        $room = $_REQUEST['room'];
        $movies = $this->movieModel->getMoviesByRoom($room);
        $this->view->renderMoviesByRoom($movies);
    }

    function adminController(){
        $movies=$this->movieModel->getAdminMovie();
        $rooms=$this->roomModel->getAllRooms();
        $this->view->renderAdmin($movies, $rooms);
    }

    function insertNewMovie(){
        $this->movieModel->InsertMovie($_POST['input_nombre'],$_POST['input_genero'],$_POST['input_sinopsis'],$_POST['input_puntaje'],$_POST['input_id_sala']);
        $this->adminController();
    }

    function deleteMovie(){
        $this->movieModel->deleteMovieId($_GET['delete']);
        $this->adminController();
    }

    /*function editMovie(){
        $this->movieModel->NewMovieValues(
    }*/
    
}