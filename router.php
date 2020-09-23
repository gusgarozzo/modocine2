<?php
    require_once 'Controller/movieController.php';
    require_once 'View/movieView.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

  
    $params = explode('/', $action);
    $controller = new movieController();

switch($params[0]){
    case '':
        $controller->homeController();
    break;
    case 'home':
        $controller->homeController();
    break;
    case 'accion': case 'suspenso': case 'aventura':
        case 'drama':case 'terror':
        $controller->genreController();
    break;
    case 'id_sala': // Chequear
        $controller->moviesByRoomController();
    break;
    case 'salas':
        $controller->roomController();
    break;
}
    
