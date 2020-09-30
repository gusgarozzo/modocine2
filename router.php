<?php
    require_once 'Controller/movieController.php';
    require_once 'View/movieView.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; 
    }

    $params = explode('/', $action);
    $controller = new movieController();
    $adminController = new adminController();

    switch($params[0]){
        case '':
            $controller->homeController();
        break;
        case 'home':
            $controller->homeController();
        break;
        case 'cartelera':  //ex-estrenos
            $controller->estrenosController();
        break;
        case 'login':
            $adminController->adminController();
        break;
        case 'Detalle':
            $controller->movieDetailController();
        break;
        case 'contacto':
            $controller->contactoController();
        break;
        case 'Genero':
            $controller->genreController();
        break;
        case 'Salas':
            $controller->moviesByRoomController();
        break;
        case "adminInsertMovie":
            $adminController->adminInsert();
        break;
        case 'insertMovie':
            $adminController->insertNewMovie();
        break;
        case 'insertRoom':
            $adminController->insertNewRoom();
        break;
        case 'VerSalas':
            $controller->roomController();
        break;
        case 'adminMovie':
            $adminController->editMovieMode();
        break;
        case 'editarPelicula':
            $adminController->editMovie();
        break;
        case 'borrarPelicula':
            $adminController->deleteMovie();
        break;
        case 'adminSala':
            $adminController->editRoomMode();
        break;
        case 'editarSala':
            $adminController->editRoom();
        break;
        case 'borrarSala':
            $adminController->deleteRoom();
        break;
        case 'sala':
            $controller->roomDetailController();
        break;
    }
?>