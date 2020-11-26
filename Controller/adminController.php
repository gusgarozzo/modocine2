<?php

    // Controlador para aquellas funciones propias del administrador
    require_once './Model/roomModel.php';
    require_once './Model/movieModel.php';
    require_once './View/adminView.php';
    require_once 'loginController.php';
    require_once './Model/userModel.php';
    require_once './helpers/authHelper.php';
    require_once './Model/photoModel.php';

    class adminController{
        private $admView;
        private $publicView;
        private $roomModel;
        private $movieModel;
        private $userModel;
        private $helper;
        private $photoModel;

        public function __construct(){
            $this->roomModel = new RoomModel();
            $this->admView = new AdminView();
            $this->publicView = new MovieView();
            $this->movieModel = new MovieModel();
            $this->userModel = new userModel();
            $this->helper = new AuthHelper();
            $this->photoModel = new PhotoModel();
        }

        // Muestra la pantalla de inicio de la seccion administrador
        function adminController(){ // TIENE EL MISMO NOMBRE QUE LA CLASE, CHEQUEAR PORQUE NOS PUEDEN LLAMAR LA ATENCIÓN
            $movies = $this->movieModel->getMovies();
            $img = $this->movieModel->getMoviePhotos();
            $rooms = $this->roomModel->getAllRooms();
            $users = $this->userModel->getAllUsers();
            $this->admView->renderAdmin($movies, $rooms, $users, $img);
        }

        function adminInsert(){
            $this->helper->sessionController();
            $rooms = $this->roomModel->getAllRooms();
            $movies = $this->movieModel->getIdAndNameMovies();
            $this->admView->renderInsertMovie($movies, $rooms);
        }

        function insertMovie(){
            $this->helper->sessionController();
            if((isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $titulo = $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->movieModel->insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala);
                $this->admView->ShowAdmin();
            }
        }

        function deleteMovie($params = null){
            $this->helper->sessionController();
            $movie_id = $params[':ID'];
            $this->movieModel->deleteMovieId($movie_id);
            $this->admView->ShowAdmin();
        }

        function editMovieMode($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $movie = $this->movieModel->getMovieByIdAdm($movie_id);
                $this->admView->renderEditMovie($movie);
            }
        }

        function editMovie($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID'])) && (isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && 
            (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $movie_id = $params[':ID'];
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->movieModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $sala, $movie_id);
                $this->admView->ShowAdmin();
            }
        }

        function editRoomMode($params=null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                $room = $this->roomModel->getRoomInfoById($room_id);
                $this->admView->renderEditRoom($room);
            }
        }

        function editRoom($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID'])) && (isset($_POST['input_sala'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $room_id = $params[':ID'];
                $sala = $_POST['input_sala'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->movieModel->updateRooms($sala, $capacidad, $formato, $room_id);
                $this->admView->ShowAdmin();
            }
        }

        function deleteRoom($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']) && !is_null($params))){
                $room_id = $params[':ID'];

                $action = null;
                $action = $this->movieModel->deleteRoomId($room_id);    
                
                switch($action){
                    case true:
                        $this->admView->ShowAdmin();
                    break;
                    case false:
                        $this->admView->renderError("Disculpe! Para eliminar la sala, primero debe eliminar 
                        todos las peliculas asociadas a la misma");
                    break;
                }
            } 
        }

        function insertRoom(){
            $this->helper->sessionController();
            if((isset($_POST['input_letra'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']) && 
            (isset($_POST['input_tipo'])) && (isset($_POST['input_info'])) )){
                $sala= $_POST['input_letra'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $tipo = $_POST['input_tipo'];
                $info = $_POST['input_info'];
                $this->adminModel->insertNewRoom($sala, $capacidad, $formato, $tipo, $info);
                $this->admView->ShowAdmin();
            }
        }

        function editUserMode($params = null) {
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $user_id = $params[':ID'];
                $user = $this->userModel->getUserById($user_id);
                $this->admView->renderEditUser($user);
            }
        }
    
        function editUser($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID'])) && (isset($_POST['input_isAdmin']))){
                $user_id = $params[':ID'];
                $isAdmin = $_POST['input_isAdmin'];
                if ($isAdmin == 0 || $isAdmin == 1 ) {
                    $this->userModel->editPermission($user_id, $isAdmin);
                    $this->admView->ShowAdmin();
                }
            }
        }

        function insertPhoto(){
            if (isset($_POST['guardar'])) {
                if (isset($_FILES['imagen']['name']) && (isset($_POST['select_movie']))){
                    $id_pelicula = $_POST['select_movie'];
                    $tipoArchivo = $_FILES['imagen']['type'];
                    $nombreArchivo = $_FILES['imagen']['name'];
                    $tamanoArchivo = $_FILES['imagen']['size'];
                    $imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
                    $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                    $this->photoModel->insertPhoto($binariosImagen, $nombreArchivo, $tipoArchivo, $id_pelicula);
                    $this->admView->ShowAdmin();
                }
            }
        }

    }
