<?php
    require_once 'Controller/adminController.php';
    require_once 'Controller/publicController.php';
    require_once 'Controller/loginController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    // PUBLIC CONTROLLER
    $r->addRoute("home", "GET", "publicController", "homeController"); // vista home
    $r->addRoute("cartelera", "GET", "publicController", "estrenosController"); // vista cartelera
    $r->addRoute("contacto", "GET", "publicController", "contactoController"); // vista contacto
    $r->addRoute("detalle/:ID", "GET", "publicController", "movieDetailController"); // detalle de cada pelicula
    $r->addRoute("genero/:GEN", "GET", "publicController", "genreController"); // pelicula por genero
    $r->addRoute("sala/:ROOM", "GET", "publicController", "moviesByRoomController"); // pelicula por sala
    $r->addRoute("salas", "GET", "publicController", "roomController"); // todas las salas
    $r->addRoute("detallesala/:ID", "GET", "publicController", "roomDetailController"); // detalle de cada sala
    $r->addRoute("buscador", "POST", "publicController", "searchController"); // buscador

    // ADMIN CONTROLLER
    $r->addRoute("admin", "GET", "adminController", "adminController");
    $r->addRoute("adminInsert", "GET", "adminController", "adminInsert"); // muestra form para agregar peli y sala
    $r->addRoute("insertMovie", "POST", "adminController", "insertMovie"); // agrega peli
    $r->addRoute("insertRoom", "POST", "adminController", "insertRoom"); // agrega sala
    $r->addRoute("deleteMovie/:ID", "GET", "adminController", "deleteMovie"); // borra peli
    $r->addRoute("deleteRoom/:ID", "GET", "adminController", "deleteRoom"); // borra sala
    $r->addRoute("editMovie/:ID", "GET", "adminController", "editMovieMode"); // muestra form para editar peli
    $r->addRoute("editarPelicula/:ID", "POST", "adminController", "editMovie"); // edita peli
    $r->addRoute("editRoom/:ID", "GET", "adminController", "editRoomMode"); // muestra form para editar sala
    $r->addRoute("editarSala/:ID", "POST", "adminController", "editRoom"); // edita sala
    $r->addRoute("editUser/:ID", "GET", "adminController", "editUserMode"); // muestra form para editar usuario
    $r->addRoute("editarUsuario/:ID", "POST", "adminController", "editUser"); // edita usuario


    // LOGIN
    $r->addRoute("login", "GET", "loginController", "showLogin");
    $r->addRoute("registrar", "GET", "loginController", "showRegisterForm");
    $r->addRoute("registerUser", "POST", "loginController", "registerUser");
    $r->addRoute("logout", "GET", "loginController", "logout");
    $r->addRoute("verifyUser", "POST", "loginController", "verifyUser");

    //Ruta por defecto.
    $r->setDefaultRoute("publicController", "homeController");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
