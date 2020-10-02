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

        function insertNewMovie(){
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

        function deleteMovie(){
            if ((isset($_GET['delete']))) {
                $delete = $_GET['delete'];
                $this->adminModel->deleteMovieId($delete);
                $this->adminController();
            }
        }

        function editMovieMode(){
            if((isset($_REQUEST['editMovie']))){
                $id = $_REQUEST['editMovie'];
                $movie = $this->adminModel->getMovieById($id);
                $this->admView->renderEditMovie($movie);
            }
        }

        function editMovie(){
            if((isset($_REQUEST['id'])) && (isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $id = $_REQUEST['id'];
                $titulo= $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $this->adminModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $sala, $id);
                $this->adminController();
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
                $this->adminController();
            }
        }

        function deleteRoom(){
            if((isset($_GET['delete']))){
                $delete = $_GET['delete'];
                if($this->adminModel->deleteRoomId($delete)){
                    $this->adminModel->deleteRoomId($delete);
                    $this->adminController();
                }
                else{
                    $this->admView->renderError();
                    $this->adminController();
                }
            }
        }

        function insertNewRoom(){
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