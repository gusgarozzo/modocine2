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
        $delete = $this->model->deleteMovieId($id);
        
        if($delete>0){
            $this->view->response("La pelicula ha sido eliminada exitosamente", 200);
        }else{
            $this->view->response("La pelicula que usted quiere borrar, no existe", 404);
        }
    }

    public function addComment($params=null){
        // Devuelve el objeto JSON enviado por POST
        $body = $this->getData();
        
        // Guardo los datos ingresados por el usuario, en variables
        $usuario = $body->usuario;
        $pelicula = $body->pelicula;
        var_dump($pelicula);die();
        $puntaje = $body->puntaje;
        $mensaje = $body->mensaje;

        // Envío los datos al model
        $action = $this->model->addCommentModel($usuario, $pelicula, $puntaje, $mensaje);
        
        // Verifico que el comentario exista
        if (!empty($action)) {
            // Si existe envío la respuesta junto con el código 200
            $this->view->response($this->model->getMensaje($action), 200);
        }else{
            // Si no existe, envío mensaje con el código de error
            $this->view->response("El mensaje no se pudo insertar", 404);
        }
    }

}