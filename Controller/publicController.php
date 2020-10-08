<?php
    require_once ('./Model/movieModel.php');
    require_once ('./View/publicView.php');
    require_once ('./Model/roomModel.php');

    class publicController{
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

        function genreController($params = null){
            if((isset($params[':GEN']))){
                $genre = $params[':GEN'];
                $movies = $this->movieModel->getMoviesByGenre($genre);
                $this->view->renderMoviesByGenre($movies);
            }
        }

        function movieDetailController($params = null){
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                $movie = $this->movieModel->getMovieById($id); 
                $this->view->renderMovieById($movie);
            }
        }

        function roomDetailController($params = null){
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                $room = $this->roomModel->getRoomById($id);
                $this->view->renderRoomById($room);
            }
        }

        function moviesByRoomController($params = null){
            if((isset($params[':ROOM']))){
                $room = $params[':ROOM'];
                $movies = $this->movieModel->getMoviesByRoom($room);
                $this->view->renderMoviesByRoom($movies);
            }
        }
    }
?>