<?php
require_once 'RouterClass.php';
require_once 'api/ApiComentController.php';

$router = new Router();

// RUTEO API REST
$router->addRoute('comentarios', 'GET', 'ApiComentController', 'showComments');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentController', 'showComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'deleteComment');
$router->addRoute('comentarios', 'POST', 'ApiComentController', 'addComment');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 