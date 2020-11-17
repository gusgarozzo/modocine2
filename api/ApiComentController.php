<?php
require_once './Model/commentModel.php';
require_once './Model/UserModel.php';
require_once 'ApiController.php';
require_once './helpers/authHelper.php';
require_once './Controller/adminController.php';

class ApiComentController extends ApiController {
    private $commentModel;
    private $userModel;
    private $view;

    function __construct() {
        parent::__construct();
        $this->commentModel = new CommentModel();
        $this->userModel = new userModel();
        $this->view = new APIView();
    }

    public function showComments($params = null) {
        $comentarios = $this->commentModel->getComments();
        if(!empty($comentarios)){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("No hay mensajes disponibles", 404);
        }
        
    }

    public function showComment($params = null){
        $id = $params[':ID'];
        $comment = $this->commentModel->getComment($id);
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
        // devuelve el objeto JSON enviado por POST
        $body = $this->getData();

        $idUsuario = $body->usuario_id;
        $idPelicula = $body->pelicula_id;
        $puntaje = $body->puntaje;
        $comentario = $body->comentario;

        $response = $this->commentModel->addCommentModel($idUsuario, $idPelicula, $puntaje, $comentario);
        if (!empty($response)) {
            $this->view->response($this->commentModel->getComments(), 200);
            die();
        }else{
            $this->view->response("El comentario no se pudo insertar", 404);
            die();
        }
    }
}