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
    $r->addRoute("home", "GET", "publicController", "showHome"); // vista home
    $r->addRoute("cartelera", "GET", "publicController", "showCartelera"); // vista cartelera
    $r->addRoute("contacto", "GET", "publicController", "showContacto"); // vista contacto
    $r->addRoute("detalle/:ID", "GET", "publicController", "showMovieDetail"); // detalle de cada pelicula
    $r->addRoute("genero/:GEN", "GET", "publicController", "showMovieByGenre"); // pelicula por genero
    $r->addRoute("sala/:ROOM", "GET", "publicController", "showMoviesByRoom"); // pelicula por sala
    $r->addRoute("salas", "GET", "publicController", "showRooms"); // todas las salas
    $r->addRoute("detallesala/:ID", "GET", "publicController", "showRoomDetail"); // detalle de cada sala
    $r->addRoute("buscador", "POST", "publicController", "showSearchResult"); // buscador

    // ADMIN CONTROLLER
    $r->addRoute("admin", "GET", "adminController", "showAdminView"); // muestra la vista del admin
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
    $r->addRoute("insertPhoto", "POST", "adminController", "insertPhoto"); // agrega foto a pelicula
    $r->addRoute("deletePhoto/:ID", "GET", "adminController", "deletePhoto"); // borrar foto
    $r->addRoute("editPhoto/:ID", "GET", "adminController", "editPhotoMode"); // muestra form para editar foto
    $r->addRoute("updatePhoto", "POST", "adminController", "editPhoto"); // editar foto

    // LOGIN
    $r->addRoute("login", "GET", "loginController", "showLogin");
    $r->addRoute("registrar", "GET", "loginController", "showRegisterForm");
    $r->addRoute("registerUser", "POST", "loginController", "registerUser");
    $r->addRoute("logout", "GET", "loginController", "logout");
    $r->addRoute("verifyUser", "POST", "loginController", "verifyUser");

    //Ruta por defecto.
    $r->setDefaultRoute("publicController", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
