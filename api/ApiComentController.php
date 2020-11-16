<?php
require_once './Model/commentModel.php';
require_once 'ApiController.php';
require_once ('./helpers/authHelper.php');

class ApiComentController extends ApiController {

    function __construct() {
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new APIView();
        AuthHelper::checkLoggedIn();
        /*
        (asi lo hicieron en bolivar)

        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        */ 
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

    public function addComment($params=null){
        // Devuelve el objeto JSON enviado por POST
        if(!is_null($params)){
                $body = $this->getData();
        
                // Traigo el id de la película
                $pelicula_id = $params[':ID'];

                // Vamos a necesitar un helper para acceder a los datos del usuario logueado
                // $body->usuario = $_SESSION['usuario'];
                // $body->puntaje = $_POST['puntaje'];
                $body->comentario = $_POST['comentario'];
                // Envío los datos al model
                $action = $this->model->addCommentModel("Aca van las variables con los datos del form");
                // Verifico que el comentario exista
                if (!empty($action)) {
                    var_dump($this->model->getMensaje($action));die();
                    // Si existe envío la respuesta junto con el código 200
                    $this->view->response($this->model->getMensaje($action), 200);
                }else{
                    // Si no existe, envío mensaje con el código de error
                    $this->view->response("El mensaje no se pudo insertar", 404);
                }
        }
    }
}