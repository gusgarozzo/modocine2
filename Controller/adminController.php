<?php
    require_once ('./Model/roomModel.php');
    require_once ('./Model/adminModel.php');
    require_once ('./View/adminView.php');

    class adminController{
        private $AdmView;
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

        function insertMovie(){
            if((isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->adminModel->insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala);
                $movies = $this->adminModel->getAdminMovie();
                $rooms = $this->roomModel->getAllRooms();
                $this->admView->renderAdmin($movies, $rooms);
            }
        }

        function deleteMovie($params = null){
            $movie_id = $params[':ID'];
            $this->adminModel->deleteMovieId($movie_id);
            header("Location: ".BASE_URL."login");
        }

        function editMovieMode($params = null){
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $movie = $this->adminModel->getMovieById($movie_id);
                $this->admView->renderEditMovie($movie);
            }
        }

        function editMovie($params = null){
            if((isset($params[':ID'])) && (isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $movie_id = $params[':ID'];
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->adminModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $sala, $movie_id);
                header("Location: ".BASE_URL."login");
            }
        }

        function editRoomMode(){
            if((isset($_GET['editRoom']))){
                $id = $_GET['editRoom'];
                $room = $this->roomModel->getRoomInfoById($id);
                $this->admView->renderEditRoom($room);
            }
        }

        function editRoom(){
            if((isset($_REQUEST['id'])) && (isset($_POST['input_sala'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $id = $_REQUEST['id'];
                $sala= $_POST['input_sala'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->adminModel->updateRooms($sala, $capacidad, $formato, $id);
                header("Location: ".BASE_URL."login");
            }
        }

        function deleteRoom($params = null){
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                if($this->adminModel->deleteRoomId($room_id)){
                    $this->adminModel->deleteRoomId($room_id);
                    header("Location: ".BASE_URL."login");
                }
                else{
                    header("Location: ".BASE_URL."login"); //con esto no funca el cartel de error, pero sin esto se concatena mal la url
                    $this->admView->renderError();
                }
            }
        }

        function insertRoom(){
            if((isset($_POST['input_letra'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $sala= $_POST['input_letra'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->adminModel->insertNewRoom($sala, $capacidad, $formato);
                $movies = $this->adminModel->getAdminMovie();
                $rooms = $this->roomModel->getAllRooms();
                $this->admView->renderAdmin($movies, $rooms);
            }
        }

        function adminInsert(){
            $this->admView->renderInsertMovie();
        }
    }
?>