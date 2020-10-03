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
        case 'home'://listo
            $controller->homeController();
        break;
        case 'cartelera'://listo
            $controller->estrenosController();
        break;
        case 'Detalle'://listo
            $controller->movieDetailController();
        break;
        case 'contacto'://listo
            $controller->contactoController();
        break;
        case 'Genero'://listo
            $controller->genreController();
        break;
        case 'Salas'://listo
            $controller->moviesByRoomController();
        break;
        case 'VerSalas'://listo
            $controller->roomController();
        break;
        case 'sala'://listo
            $controller->roomDetailController();
        break;
        case 'login'://listo
            $adminController->adminController();
        break;
        case "adminInsert"://listo
            $adminController->adminInsert();
        break;
        case 'insertMovie'://listo
            $adminController->insertNewMovie();
        break;
        case 'insertRoom'://listo
            $adminController->insertNewRoom();
        break;
        case 'adminMovie'://listo
            $adminController->editMovieMode();
        break;
        case 'editarPelicula'://listo
            $adminController->editMovie();
        break;
        case 'borrarPelicula'://listo
            $adminController->deleteMovie();
        break;
        case 'adminSala'://listo
            $adminController->editRoomMode();
        break;
        case 'editarSala'://listo
            $adminController->editRoom();
        break;
        case 'borrarSala'://listo
            $adminController->deleteRoom();
        break;
       
    }

?>