<?php

require_once './api/ApiComentController.php';

class CommentModel{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
    }

    function getComments(){
        $query=$this->db->prepare('SELECT * FROM comentario');
        $query->execute();
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function addCommentModel($idusuario, $idPelicula, $puntaje, $comentario){
        $query = $this->db->prepare("INSERT INTO comentario(id_usuario, id_pelicula, puntaje, comentario) VALUES(?,?,?,?)");
        $query->execute(array($idusuario, $idPelicula, $puntaje, $comentario));
        return $query->rowCount();
    }

    function getComment($id){
        $query = $this->db->prepare('SELECT comentario.id, comentario.id_usuario, comentario.id_pelicula, comentario.puntaje, 
            comentario.comentario, usuario.id, usuario.email, pelicula.id, pelicula.nombre FROM comentario INNER JOIN usuario 
                ON comentario.id_usuario = usuario.id INNER JOIN pelicula ON pelicula.id =comentario.id_pelicula 
                WHERE comentario.id_usuario=?');
        $query->execute(array($id));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }
}