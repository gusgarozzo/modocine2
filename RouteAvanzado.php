<?php
    require_once 'Controller/adminController.php';
    require_once 'Controller/movieController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    


    $r = new Router();

    // MOVIE CONTROLLER
    $r->addRoute("home", "GET", "movieController", "homeController"); //vista home
    $r->addRoute("cartelera", "GET", "movieController", "estrenosController"); // vista cartelera
    $r->addRoute("contacto", "GET", "movieController", "contactoController"); //vista contacto
    $r->addRoute("Detalle", "GET", "movieController", "movieDetailController"); //detalle de cada pelicula
    $r->addRoute("Genero", "GET", "movieController", "genreController"); // pelicula por genero
    $r->addRoute("Salas", "GET", "movieController", "moviesByRoomController"); //pelicula por sala
    $r->addRoute("VerSalas", "GET", "movieController", "roomController"); //todas las salas
    $r->addRoute("sala", "GET", "movieController", "roomDetailController"); //detalle de cada sala

    //$r->addRoute("insert", "POST", "TasksController", "InsertTask");
    //$r->addRoute("delete/:ID", "GET", "TasksController", "BorrarLaTaskQueVienePorParametro");
    //$r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");

    // ADMIN CONTROLLER
    // FUNCIONA
    $r->addRoute("login", "GET", "adminController", "adminController");
    $r->addRoute("adminInsert", "GET", "adminController", "adminInsert");//muestra form para agregar peli y sala
    $r->addRoute("insertMovie", "POST", "adminController", "insertMovie");//agrega peli
    $r->addRoute("insertRoom", "POST", "adminController", "insertRoom");//agrega sala
    $r->addRoute("deleteMovie/:ID", "GET", "adminController", "deleteMovie");//borra peli
    $r->addRoute("deleteRoom/:ID", "GET", "adminController", "deleteRoom");//borra sala

    // NO FUNCIONA
    $r->addRoute("editMovie/:ID", "GET", "adminController", "editMovieMode");//muestra form para editar peli
    $r->addRoute("editarPelicula/:ID", "POST", "adminController", "editMovie");//edita peli
    $r->addRoute("editRoom/:ID", "GET", "adminController", "editRoomMode");//muestra form para editar sala
    $r->addRoute("editarSala/:ID", "POST", "adminController", "editRoom");//edita sala


    //Ruta por defecto.
    $r->setDefaultRoute("movieController", "homeController");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 

?>