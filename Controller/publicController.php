<?php
    require_once './Model/movieModel.php';
    require_once './View/publicView.php';
    require_once './Model/roomModel.php';
    require_once './Model/userModel.php';
    require_once './helpers/authHelper.php';
    require_once './Model/photoModel.php';

    class publicController{
        private $movieModel;
        private $userModel;
        private $view;
        private $roomModel;
        private $helper;
        private $admView;
        private $photoModel;

        public function __construct(){
            $this->movieModel = new MovieModel();
            $this->roomModel = new RoomModel();
            $this->userModel = new userModel();
            $this->view = new MovieView();
            $this->admView = new AdminView();
            $this->helper = new AuthHelper();
            $this->photoModel = new PhotoModel();
        }

        function showHome(){
            
            if ($this->helper->checkLoggedIn()) {
                $username = $this->helper->getLoggedUserName();
                $this->view->renderHome($username);
            }
            else{
                $this->view->renderHome();
            }
        }

        function showContacto(){
            $this->view->renderContacto();
        }

        function showCartelera(){
            $movies=$this->movieModel->getAllMoviesAndRooms();
            $rooms=$this->roomModel->getAllRooms();
            $this->view->renderEstrenos($movies, $rooms);
        }

        function showRooms(){
            $room = $this->roomModel->getAllRooms();
            $this->view->renderRooms($room);
        }

        function showMovieByGenre($params = null){
            if((isset($params[':GEN']))){
                $genre = $params[':GEN'];
                $movies = $this->movieModel->getMoviesByGenre($genre);
                $this->view->renderMoviesByGenre($movies);
            }
        }

        function showMovieDetail($params = null){
            $log = $this->helper->checkLoggedIn();
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                $movie = $this->movieModel->getMovieById($id); 
                if($log == true){
                    $user = $_SESSION['usuario'];
                    $usuario = $this->userModel->getUserInfo($user);
                }else{
                    $usuario = empty($usuario);
                }
                $image = $this->photoModel->getMoviePhotos();
                $this->view->renderMovieById($movie, $usuario, $image);
            }
        }

        function showRoomDetail($params = null){
            if((isset($params[':ID']))){
                $id = $params[':ID'];
                $room = $this->roomModel->getRoomById($id);
                $this->view->renderRoomById($room);
            }
        }

        function showMoviesByRoom($params = null){
            if(isset($params[':ROOM'])){
                $room = $params[':ROOM'];
                $movies = $this->movieModel->getMoviesByRoom($room);
                $this->view->renderMoviesByRoom($movies);
            }
        }

        function showSearchResult($params=null){
            if(isset($_POST['input-search']) && ($_POST['campo'])){
                $search = $_POST['input-search'];
                $option = $_POST['campo'];
                if (!empty($search)){
                    $result = $this->movieModel->searchMovies($option, $search);
                    if($result){
                        $this->view->renderSearchResult($result);
                    }else{
                        $this->admView->renderError("La búsqueda no arrojó resultados");
                    }
                }else{
                    $this->admView->renderError("No se admiten campos vacíos");
                }
                
            }
        }
    }