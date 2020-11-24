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
        private $admView;

        public function __construct(){
            $this->movieModel = new MovieModel();
            $this->roomModel = new RoomModel();
            $this->userModel = new userModel();
            $this->view = new MovieView();
            $this->admView = new AdminView();
            $this->helper = new AuthHelper();
        }

        function homeController(){
            $log = $this->helper->checkLoggedIn();
            var_dump($log);
            $rol = $this->helper->isAdmin();
            var_dump($rol);
            //$username = $this->helper->getLoggedUserName();
            $this->view->showNav($log, $rol);
            $this->view->renderHome(/*$username*/);
        }

        function contactoController(){
            $log = $this->helper->checkLoggedIn();
            $rol = $this->helper->isAdmin();
            $this->view->showNav($log, $rol);
            $this->view->renderContacto();
        }

        function estrenosController(){
            $movies=$this->movieModel->getAllMoviesAndRooms();
            $rooms=$this->roomModel->getAllRooms();
            $log = $this->helper->checkLoggedIn();
            $rol = $this->helper->isAdmin();
            $this->view->showNav($log, $rol);
            $this->view->renderEstrenos($movies, $rooms);
        }

        function roomController(){
            $room = $this->roomModel->getAllRooms();
            $log = $this->helper->checkLoggedIn();
            $rol = $this->helper->isAdmin();
            $this->view->showNav($log, $rol);
            $this->view->renderRooms($room);
        }

        function genreController($params = null){
            if((isset($params[':GEN']))){
                $genre = $params[':GEN'];
                $movies = $this->movieModel->getMoviesByGenre($genre);
                $log = $this->helper->checkLoggedIn();
                $rol = $this->helper->isAdmin();
                $this->view->showNav($log, $rol);
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
                $log = $this->helper->checkLoggedIn();
                $rol = $this->helper->isAdmin();
                $this->view->showNav($log, $rol);
                $this->view->renderMovieById($movie, $usuario);
            }
        }

        function roomDetailController($params = null){
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                $room = $this->roomModel->getRoomById($id);
                $log = $this->helper->checkLoggedIn();
                $rol = $this->helper->isAdmin();
                $this->view->showNav($log, $rol);
                $this->view->renderRoomById($room);
            }
        }

        function moviesByRoomController($params = null){
            if(isset($params[':ROOM'])){
                $room = $params[':ROOM'];
                $movies = $this->movieModel->getMoviesByRoom($room);
                $log = $this->helper->checkLoggedIn();
                $rol = $this->helper->isAdmin();
                $this->view->showNav($log, $rol);
                $this->view->renderMoviesByRoom($movies);
            }
        }

        function searchController($params=null){
            $log = $this->helper->checkLoggedIn();
            $rol = $this->helper->isAdmin();
            $this->view->showNav($log, $rol);
            if(isset($_POST['input-search']) && ($_POST['campo'])){
                $search = $_POST['input-search'];
                if (!empty($search)){
                    $option = $_POST['campo'];
                    $result = $this->movieModel->searchMovies($option, $search);

                    if($result){
                        $this->view->renderSearch($result);
                    }else{
                        $this->admView->renderError("La búsqueda no arrojó resultados");
                    }
                }else{
                    $this->admView->renderError("No se admiten campos vacíos");
                }
                
            }
        }
    }
