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
        $controller->adminController();
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
    case 'insert':
        $controller->insertNewMovie();
    break;
    case 'VerSalas':
        $controller->roomController();
    break;
    case 'editar':
        $controller->editMovie();
    break;
    case 'borrar':
        $controller->deleteMovie();
    break;
    case 'sala':
        $controller->roomDetailController();
    break;
}