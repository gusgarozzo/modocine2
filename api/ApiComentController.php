<?php
require_once './Model/commentModel.php';
require_once './Model/UserModel.php';
require_once 'ApiController.php';
require_once ('./helpers/authHelper.php');
require_once './Controller/adminController.php';

class ApiComentController extends ApiController {

    function __construct() {
        parent::__construct();
        $this->model = new CommentModel();
        $this->userModel = new userModel();
        $this->view = new APIView();
        AuthHelper::checkLoggedIn();
        /*
        (asi lo hicieron en bolivar)

        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        */ 
        //$this->control = new adminController();
    }

    public function showComments($params = null) {
        $comentarios = $this->model->getComments();
        $this->view->response($comentarios, 200);
    }

    public function showComment($params = null){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if (!empty($comment)){
            $this->view->response($comment, 200);
        }
        else {
            $this->view->response("El comentario no existe", 404);
        }
    }
    
    /*public function deleteMovie($params = null) {
        $id = $params[':ID'];
        $delete = $this->model->deleteMovieId($id);
        
        if($delete>0){
            $this->view->response("La pelicula ha sido eliminada exitosamente", 200);
        }else{
            $this->view->response("La pelicula que usted quiere borrar, no existe", 404);
        }
    }*/

    public function addComment($params=[]){
        // Devuelve el objeto JSON enviado por POST
        if(!is_null($params=[])){
                $body = $this->getData();

                // Obtengo datos del usuario que está logueado
                $usuario = $body->usuario_id;
                $pelicula = $body->pelicula_id;
                $puntaje = $body->puntaje;
                $comentario = $body->mensaje;

                var_dump($puntaje);die();

                // Envío los datos al model
                $action = $this->model->addCommentModel($usuario, $pelicula, $puntaje, $comentario);
                // Verifico que el comentario exista
                if ($action > 0) {
                   var_dump($this->model->getComment($action)); die();
                    // Si existe envío la respuesta junto con el código 200
                    $this->view->response($this->model->getMensaje($action), 200);
                }else{
                    // Si no existe, envío mensaje con el código de error
                    $this->view->response("El mensaje no se pudo insertar", 404);
                }
            }
    }
}