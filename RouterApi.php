<?php
require_once 'RouterClass.php';
require_once 'api/ApiMovieController.php';

$router = new Router();

// RUTEO API REST
$router->addRoute('peliculas', 'GET', 'ApiMovieController', 'getMovies');
$router->addRoute('peliculas/:ID', 'GET', 'ApiMovieController', 'getMovie');
$router->addRoute('peliculas/:ID', 'DELETE', 'ApiMovieController', 'deleteMovie');
$router->addRoute('comentar/:ID', 'POST', 'ApiMovieController', 'addComment');

// $router->addRoute('peliculas', 'POST', 'ApiMovieController', 'insertMovie');
// $router->addRoute('peliculas/:ID', 'PUT', 'ApiMovieController', 'updateMovie');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 