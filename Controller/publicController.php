<?php
    require_once './Model/movieModel.php';
    require_once './View/publicView.php';
    require_once './Model/roomModel.php';
    require_once './Model/userModel.php';
    require_once './helpers/authHelper.php';

    class publicController{
        private $movieModel;
        private $userModel;
        private $view;
        private $roomModel;
        private $helper;

        public function __construct(){
            $this->movieModel = new MovieModel();
            $this->roomModel = new RoomModel();
            $this->userModel = new userModel();
            $this->view = new MovieView();
            $this->helper = new AuthHelper();
        }

        function homeController(){
            if ($this->helper->checkLoggedIn()) {
                $user = $this->helper->getLoggedUserName();
                $logged = $this->helper->checkLoggedIn();
                if ($this->helper->isAdmin()) {
                    $this->view->renderHome($user);
                    die();
                }
                else {
                    $this->view->renderHome($user);
                    die();
                }
            }
            else {
                $user = $this->helper->getLoggedUserName();
                $this->view->renderHome($user);
            }
           
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
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                //$user = $this->helper->getLoggedUserName();
                $user = $_SESSION['usuario'];
                $usuario = $this->userModel->getUserInfo($user);
                $movie = $this->movieModel->getMovieById($id); 
                $this->view->renderMovieById($movie, $usuario);
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
            if(isset($params[':ROOM'])){
                $room = $params[':ROOM'];
                $movies = $this->movieModel->getMoviesByRoom($room);
                $this->view->renderMoviesByRoom($movies);
            }
        }

        function searchController($params=null){
            if(isset($_POST['input-search']) && ($_POST['campo'])){
                $search = $_POST['input-search'];
                $option = $_POST['campo'];
                $result = $this->movieModel->searchMovies($option, $search);

                if($result){
                    $this->view->renderSearch($result);
                }
            }
        }
    }
