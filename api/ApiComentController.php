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
    
    public function deleteComment($params = null) {
        $id = $params[':ID'];
        $resultado = $this->commentModel->deleteComment($id);
        
        if($resultado > 0){
            $this->view->response("El comentario con el id=$id fue eliminado", 200);
        }
        else{
            $this->view->response("El comentario con el id=$id no existe", 404);
        }
    }

    public function addComment($params=[]){
        // devuelve el objeto JSON enviado por POST
        $body = $this->getData();

        $idUsuario = $body->usuario_id;
        $idPelicula = $body->pelicula_id;
        $puntaje = $body->puntaje;
        $comentario = $body->comentario;

        $response = $this->commentModel->addCommentModel($idUsuario, $idPelicula, $puntaje, $comentario);
        if (!empty($response)) {
            $this->view->response($this->commentModel->getComments(), 201);
            die();
        }else{
            $this->view->response("El comentario no se pudo insertar", 404);
            die();
        }
    }

}