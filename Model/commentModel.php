<?php

require_once './api/ApiMovieController.php';

class CommentModel{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
    }

    function addCommentModel($usuario, $pelicula_id, $puntaje, $mensaje){
        $query = $this->db->prepare("INSERT INTO comentario(id_usuario, id_pelicula, puntaje, comentario) VALUES(?,?,?,?)");
        $query->execute(array($usuario, $pelicula_id, $puntaje, $mensaje));
        return $query->rowCount();
    }

    function getMensaje($id){
        $query = $this->db->prepare('SELECT comentario.id, comentario.id_usuario, comentario.id_pelicula, comentario.puntaje, 
            comentario.comentario, usuario.id, usuario.email, pelicula.id, pelicula.nombre FROM comentario INNER JOIN usuario 
                ON comentario.id_usuario = usuario.id INNER JOIN pelicula ON pelicula.id =comentario.id_pelicula WHERE comentario.id=?');
        $query->execute(array($id));
        $post = $query->fetchAll(PDO::FETCH_OBJ);
        return $post;
    }
}