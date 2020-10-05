<?php
    require_once ('./Model/roomModel.php');
    require_once ('./Model/adminModel.php');
    require_once ('./View/adminView.php');

    class adminController{
        private $admView;
        private $roomModel;
        private $adminModel;

        public function __construct(){
            $this->roomModel = new RoomModel();
            $this->admView = new AdminView();
            $this->adminModel = new AdminModel();
        }

        function adminController(){
            $movies=$this->adminModel->getAdminMovie();
            $rooms=$this->roomModel->getAllRooms();
            $this->admView->renderAdmin($movies, $rooms);
        }

        function adminInsert(){
            $rooms=$this->roomModel->getAllRooms();
            $this->admView->renderInsertMovie($rooms);
        }

        function insertMovie(){
            if((isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->adminModel->insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala);
                $this->admView->ShowAdmin();
            }
        }

        function deleteMovie($params = null){
            $movie_id = $params[':ID'];
            $this->adminModel->deleteMovieId($movie_id);
            $this->admView->ShowAdmin();
        }

        function editMovieMode($params = null){
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $movie = $this->adminModel->getMovieById($movie_id);
                $this->admView->renderEditMovie($movie);
            }
        }

        function editMovie($params = null){
            if((isset($params[':ID'])) && (isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && 
            (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $movie_id = $params[':ID'];
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->adminModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $sala, $movie_id);
                $this->admView->ShowAdmin();
            }
        }

        function editRoomMode($params=null){
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                $room = $this->roomModel->getRoomInfoById($room_id);
                $this->admView->renderEditRoom($room);
            }
        }

        function editRoom($params = null){
            if((isset($params[':ID'])) && (isset($_POST['input_sala'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $room_id = $params[':ID'];
                $sala = $_POST['input_sala'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->adminModel->updateRooms($sala, $capacidad, $formato, $room_id);
                $this->admView->ShowAdmin();
            }
        }

        function deleteRoom($params = null){
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                $this->adminModel->deleteRoomId($room_id);
                $this->admView->ShowAdmin();
            }
        }

        function insertRoom(){
            if((isset($_POST['input_letra'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $sala= $_POST['input_letra'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->adminModel->insertNewRoom($sala, $capacidad, $formato);
                $this->admView->ShowAdmin();
            }
        }

    }
