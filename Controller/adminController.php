<?php
require_once ('./Model/movieModel.php');
require_once ('./View/movieView.php');
require_once ('./Model/roomModel.php');

class adminController{
    private $movieModel;
    private $view;
    private $roomModel;

    public function __construct(){
        $this->movieModel = new MovieModel();
        $this->roomModel = new RoomModel();
        $this->view = new MovieView();
    }

    function adminController(){
        $movies=$this->movieModel->getAdminMovie();
        $rooms=$this->roomModel->getAllRooms();
        $this->view->renderAdmin($movies, $rooms);
    }

    function insertNewMovie(){
        $titulo= $_POST['input_nombre'];
        $genero = $_POST['input_genero'];
        $sinopsis = $_POST['input_sinopsis'];
        $puntaje = $_POST['input_puntaje'];
        $sala = $_POST['input_id_sala'];
        $this->movieModel->insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala);
        
        $movies = $this->movieModel->getAdminMovie();
        $rooms = $this->roomModel->getAllRooms();
        $this->view->renderAdmin($movies, $rooms);
    }

    function deleteMovie(){
        $delete = $_GET['delete'];
        $this->movieModel->deleteMovieId($delete);
        $this->adminController();
    }

    function deleteRoom(){
        $this->roomModel->deleteRoom($_GET['delete']);
        $this->adminController();
    }

    function editMovie(){
        $titulo= $_POST['input_nombre'];
        $genero = $_POST['input_genero'];
        $sinopsis = $_POST['input_sinopsis'];
        $puntaje = $_POST['input_puntaje'];
        $id_sala = $_POST['input_id_sala'];
        $this->movieModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $id_sala);
        $this->adminController();
    }
}