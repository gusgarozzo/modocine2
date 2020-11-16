<?php
require_once 'RouterClass.php';
require_once 'api/ApiComentController.php';

$router = new Router();

// RUTEO API REST
$router->addRoute('comentarios', 'GET', 'ApiComentController', 'showComments');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController', 'showComment');
//$router->addRoute('peliculas/:ID', 'DELETE', 'ApiComentController', 'deleteMovie');
$router->addRoute('comentarios', 'POST', 'ApiComentController', 'addComment');

// $router->addRoute('peliculas', 'POST', 'ApiComentController', 'insertMovie');
// $router->addRoute('peliculas/:ID', 'PUT', 'ApiComentController', 'updateMovie');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 