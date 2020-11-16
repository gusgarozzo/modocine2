<?php

    // Controlador para aquellas funciones propias del administrador
    require_once ('./Model/roomModel.php');
    require_once ('./Model/movieModel.php');
    require_once ('./View/adminView.php');
    require_once ('loginController.php');
    require_once './Model/userModel.php';

    class adminController{
        private $admView;
        private $roomModel;
        private $movieModel;
        private $userModel;

        public function __construct(){
            $this->roomModel = new RoomModel();
            $this->admView = new AdminView();
            $this->movieModel = new MovieModel();
            $this->userModel = new userModel();
        }

        // Controlador para verificar si el usuario continua logueado y activo
        function sessionController(){
            session_start();
            if (!isset($_SESSION['usuario'])){
                header("Location: ".BASE_URL."login");
                die();
            }else{
                // Pasados los 2 minutos de inactividad, se cierra automaticamente la sesión
                if(isset($_SESSION['timeout']) && (time()-$_SESSION['timeout'] > 800)){
                    header("Location: ".BASE_URL."logout");  
                    die();
                }
                // De lo contrario, se actualiza el temporizador
                $_SESSION['timeout'] = time();
            }
        }

        // Controlador para que el usuario no pueda realizar modificaciones
        // si no tiene el rol de administrador
        function verifyAdmin(){
            // Guarda en una variable el email del usuario que se encuentra logueado
            $email = $_SESSION['usuario'];
            // Busca en la base de datos el rol del usuario
            $user=$this->userModel->getUsersRol($email);

            // Si existe continúa la ejecución
            if(!empty($user)){
                // Si el rol de de administrador usuario es false (0), entonces se le notifica
                // con un mensaje de error
                if($user === '0');
                $this->admView->renderError("Sólo los administradores pueden realizar esta tarea");
                die();
            }
        }

        // Muestra la pantalla de inicio de la seccion administrador
        function adminController(){
            $this->sessionController();
            $this->verifyAdmin();
            $movies = $this->movieModel->getMovies();
            $rooms = $this->roomModel->getAllRooms();
            $users = $this->userModel->getAllUsers();
            $this->admView->renderAdmin($movies, $rooms, $users);
        }

        function adminInsert(){
            $this->sessionController();
            $this->verifyAdmin();
            $rooms = $this->roomModel->getAllRooms();
            $this->admView->renderInsertMovie($rooms);
        }

        function insertMovie(){
            $this->sessionController();
            $this->verifyAdmin();
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
            $this->sessionController();
            $this->verifyAdmin();
            $movie_id = $params[':ID'];
            $this->movieModel->deleteMovieId($movie_id);
            $this->admView->ShowAdmin();
        }

        function editMovieMode($params = null){
            $this->sessionController();
            $this->verifyAdmin();
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $movie = $this->movieModel->getMovieByIdAdm($movie_id);
                $this->admView->renderEditMovie($movie);
            }
        }

        function editMovie($params = null){
            $this->sessionController();
            $this->verifyAdmin();
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
            $this->sessionController();
            $this->verifyAdmin();
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                $room = $this->roomModel->getRoomInfoById($room_id);
                $this->admView->renderEditRoom($room);
            }
        }

        function editRoom($params = null){
            $this->sessionController();
            $this->verifyAdmin();
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
            $this->sessionController();
            $this->verifyAdmin();
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
            $this->sessionController();
            $this->verifyAdmin();
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
            $this->sessionController();
            $this->verifyAdmin();
            if((isset($params[':ID']))){
                $user_id = $params[':ID'];
                $user = $this->userModel->getUserById($user_id);
                $this->admView->renderEditUser($user);
            }
        }
    
        function editUser($params = null){
            $this->sessionController();
            $this->verifyAdmin();
            if((isset($params[':ID'])) && (isset($_POST['input_isAdmin']))){
                $user_id = $params[':ID'];
                $isAdmin = $_POST['input_isAdmin'];
                if ($isAdmin == 0 || $isAdmin == 1 ) {
                    $this->userModel->editPermission($user_id, $isAdmin);
                    $this->admView->ShowAdmin();
                }
            }
        }

    }
