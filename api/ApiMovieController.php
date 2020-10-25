<?php
require_once './Model/MovieModel.php';
require_once 'ApiController.php';

class ApiMovieController extends ApiController {

    function __construct() {
        parent::__construct();
        $this->model = new MovieModel();
        $this->view = new APIView();
    }

    public function getMovies($params = null) {
        $tasks = $this->model->getMovies();
        $this->view->response($tasks, 200);
    }

    public function getMovie($params = null) {
        $id = $params[':ID'];
        $movie = $this->model->getMovieByIdAdm($id);

        if (!empty($movie)){
            $this->view->response($movie, 200);
        }
        else{
            $this->view->response("La pelicula no existe", 404);
        }
    }
    
    public function deleteMovie($params = null) {
        $id = $params[':ID'];
        $task = $this->model->deleteMovieId($id);
    }

}