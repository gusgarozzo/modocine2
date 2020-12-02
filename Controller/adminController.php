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
        private $roomModel;
        private $movieModel;
        private $userModel;
        private $helper;
        private $photoModel;

        public function __construct(){
            $this->roomModel = new RoomModel();
            $this->admView = new AdminView();
            $this->movieModel = new MovieModel();
            $this->userModel = new userModel();
            $this->helper = new AuthHelper();
            $this->photoModel = new PhotoModel();
        }

        // Carga la vista del administrador
        function showAdminView(){
            // Trae todas las peliculas
            $movies = $this->movieModel->getMovies();

            // Trae las imágenes
            $img = $this->photoModel->getMoviePhotos();

            // Trae todas las salas
            $rooms = $this->roomModel->getAllRooms();

            // Trae los datos de todos los usuarios
            $users = $this->userModel->getAllUsers();

            // Envía toda la info al view
            $this->admView->renderAdmin($movies, $rooms, $users, $img);
        }

        // Carga la vista para insertar pelicula en la base de datos
        function adminInsert(){
            // Controla que el administrador se encuentre logueado
            $this->helper->sessionController();

            // Trae la información de todas las salas
            $rooms = $this->roomModel->getAllRooms();

            // Trae info de peliculas
            $movies = $this->movieModel->getIdAndNameMovies();

            // Envia la info a la vista del admin
            $this->admView->renderInsertMovie($movies, $rooms);
        }


        // Inserta pelicula en la base de datos
        function insertMovie(){
            // Controla que el administrador se encuentre logueado
            $this->helper->sessionController();
            if((isset($_POST['input_nombre'])) && (isset($_POST['input_genero'])) && (isset($_POST['input_sinopsis']))
                && (isset($_POST['input_puntaje'])) && (isset($_POST['input_id_sala']))){
                $titulo = $_POST['input_nombre'];
                $genero = $_POST['input_genero'];
                $sinopsis = $_POST['input_sinopsis'];
                $puntaje = $_POST['input_puntaje'];
                $sala = $_POST['input_id_sala'];
                $action=$this->movieModel->insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala);
                
                if($action > 0){
                    $this->admView->ShowAdmin();
                }else{
                    $this->admView->renderError("No pudo insertarse la pelicula. Reintente");
                }
                
            }else{
                $this->admView->renderError("Hubo un error. Revise los campos y reintente");
            }
        }

        // Borra película
        function deleteMovie($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $action=$this->movieModel->deleteMovieId($movie_id);

                if($action){
                    $this->admView->ShowAdmin();
                }else{
                    $this->admView->renderError("Hubo un error. Revise y reintente");
                }
                
            }else{
                $this->admView->renderError("Hubo un error. Reintente");
            }
        }

        // Trae los datos de pelicula solicitada para su posterior edición
        function editMovieMode($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $movie_id = $params[':ID'];
                $action=$movie = $this->movieModel->getMovieByIdAdm($movie_id);
                if ($action>0){
                    $this->admView->renderEditMovie($movie);
                }else{
                    $this->admView->renderError("Hubo un error. Revise y reintente");
                }
                
            }else{
                $this->admView->renderError("Hubo un error. Reintente");
            }
        }

        // Edita película
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
                $action=$this->movieModel->updateValues($titulo, $genero, $sinopsis, $puntaje, $sala, $movie_id);
                if ($action>0){
                    $this->admView->ShowAdmin();
                }else{
                    $this->admView->renderError("Hubo un error. Revise y reintente");
                }
                
            }else{
                $this->admView->renderError("Hubo un error. Reintente");
            }
        }

        // Imprime el formulario para editar imagen
        function editRoomMode($params=null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $room_id = $params[':ID'];
                $room = $this->roomModel->getRoomInfoById($room_id);
                
                if(count($room)>0){
                    $this->admView->renderEditRoom($room);
                }else{
                    $this->admView->renderError("No hay salas relacionadas con el ID $room_id");
                }
            }else{
                $this->admView->renderError("Hubo un error. Revise los campos y reintente");
            }
        }

        
        function editRoom($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID'])) && (isset($_POST['input_sala'])) && (isset($_POST['input_capacidad'])) && (isset($_POST['input_formato']))){
                $room_id = $params[':ID'];
                $sala = $_POST['input_sala'];
                $capacidad = $_POST['input_capacidad'];
                $formato = $_POST['input_formato'];
                $this->roomModel->updateRooms($sala, $capacidad, $formato, $room_id);
                $this->admView->ShowAdmin();
            }
        }

        function deleteRoom($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']) && !is_null($params))){
                $room_id = $params[':ID'];

                $action = null;
                $action = $this->roomModel->deleteRoomId($room_id);    
                
                if($action>0){
                    $this->admView->ShowAdmin();
                }else{
                    $this->admView->renderError("Disculpe! No se puede eliminar la imagen");
                }   
            } else{ 
                $this->admView->renderError("Para borrar la sala, primero debe eliminar una película");
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
                $action = $this->roomModel->insertNewRoom($sala, $capacidad, $formato, $tipo, $info);
                if($action > 0){
                    $this->admView->ShowAdmin();
                }else{
                    $this->admView->renderError("Disculpe! Revise bien los campos ingresados y reintente");
                }
                
            }else{
                $this->admView->renderError("No se admiten campos vacíos");
            }
        }

        function editUserMode($params = null) {
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $user_id = $params[':ID'];
                $user = $this->userModel->getUserById($user_id);
                if ($user){
                    $this->admView->renderEditUser($user);
                }else{
                    $this->admView->renderError("No hay usuarios relacionados con el ID= $user_id");
                } 
            }else{
                $this->admView->renderError("Ocurrió un error, revise y reintente");
            }
        }
    
        function editUser($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID'])) && (isset($_POST['input_isAdmin']))){
                $user_id = $params[':ID'];
                $isAdmin = $_POST['input_isAdmin'];
                if ($isAdmin == 0 || $isAdmin == 1 ) {
                    $action=$this->userModel->editPermission($user_id, $isAdmin);
                    if($action > 0){
                        $this->admView->ShowAdmin();
                    }else{
                        $this->admView->renderError("No se pudo editar los permisos del usuario con id=$user_id. Revise y reintente");
                    }
                }else{
                    $this->admView->renderError("Ocurrió un error, revise y reintente");
                }
            }
        }

        function insertPhoto(){
            if (isset($_POST['guardar'])) {
                if (isset($_FILES['imagen']['name']) && (isset($_POST['select_movie']))){
                    $id_pelicula = $_POST['select_movie'];
                    $tipoArchivo = $_FILES['imagen']['type'];
                    $permitido = array("image/png", "image/jpeg", "image/x-icon");
                    if ( in_array($tipoArchivo,$permitido) == false ) {
                        $this->admView->renderError('Este tipo de archivo no es permitido, pruebe con .png / .jpeg / .x-ico');
                        die();
                    }
                    else {
                        $nombreArchivo = $_FILES['imagen']['name'];
                        $tamanoArchivo = $_FILES['imagen']['size'];
                        $imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
                        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                        $action=$this->photoModel->insertPhoto($binariosImagen, $nombreArchivo, $tipoArchivo, $id_pelicula);
                        if($action > 0){
                            $this->admView->showAdmin();
                        }else{
                            $this->admView->renderError("No se pudo insertar la imagen");
                        }
                        
                    }
                }else{
                    $this->admView->renderError("Ocurrió un error, revise y reintente");
                }
            }
        }

        function deletePhoto($params = null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $img_id = $params[':ID'];
                $action=$this->photoModel->deleteImg($img_id);
                if($action>0){
                    $this->admView->showAdmin();
                }else{
                    $this->admView->renderError("No se pudo eliminar la imagen con id=$img_id");
                }
                
            }else{
                $this->admView->renderError("Ocurrió un error. Reintente");
            }
        }

        function editPhotoMode($params=null){
            $this->helper->sessionController();
            if((isset($params[':ID']))){
                $img_id = $params[':ID'];

                $image = $this->photoModel->getPhotoById($img_id);
                if($image){
                    $this->admView->renderEditPhoto($image);
                }else{
                    $this->admView->renderError("Ocurrió un error, reintente nuevamente");
                }
            }

        }

        function editPhoto(){
            if (isset($_POST['guardar'])) {
                if (isset($_FILES['imagen']['name'])){
                    $tipoArchivo = $_FILES['imagen']['type'];
                    $permitido = array("image/png", "image/jpeg", "image/x-icon");
                    if ( in_array($tipoArchivo,$permitido) == false ) {
                        $this->admView->renderError('Este tipo de archivo no es permitido, pruebe con .png / .jpeg / .x-ico');
                        die();
                    }
                    else {
                        $nombreArchivo = $_FILES['imagen']['name'];
                        $tamanoArchivo = $_FILES['imagen']['size'];
                        $id_pelicula = $_POST['id_pelicula'];
                        
                        $imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
                        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                        $action=$this->photoModel->editPhoto($binariosImagen, $nombreArchivo, $tipoArchivo, $id_pelicula);
                        if ($action > 0){
                            $this->admView->showAdmin();
                        }else{
                            $this->admView->renderError("Ocurrió un error. Revise los campos y reintente");
                        }
                        
                    }
                }
            }
        }
    }
