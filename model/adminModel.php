<?php 
    // Contiene aquellas sentencias que van a interactuar con la vista del Administrador
    require_once './Controller/adminController.php';

    class AdminModel{
    
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        // Agregar pelicula
        function insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala){
            $query = $this->db->prepare("INSERT INTO pelicula(nombre, genero, sinopsis, puntaje_imdb, id_sala) VALUES(?,?,?,?,?)");
            $query->execute(array($titulo, $genero, $sinopsis, $puntaje, $sala));
        }

        // Agregar Sala
        function insertNewRoom($sala, $capacidad, $formato){
            $query = $this->db->prepare("INSERT INTO sala(letra, capacidad, formato) VALUES(?,?,?)");
            $query->execute(array($sala, $capacidad, $formato));
        }

        // Borrar pelicula
        function deleteMovieId($id){
            $query = $this->db->prepare("DELETE FROM pelicula WHERE id=?");
            $query->execute(array($id));
        }

        // Traer pelicula por el id
        function getMovieById($id){
            $query=$this->db->prepare('SELECT * FROM pelicula WHERE id=?');
            $query->execute(array($id));
            $movie = $query->fetchAll(PDO::FETCH_OBJ);
            return $movie;
        }

        // Actualizar tabla peliculas
        function updateValues($titulo, $genero, $sinopsis, $puntaje,$sala,$id){
            $query = $this->db->prepare('UPDATE pelicula SET nombre=?, genero=?, sinopsis=?,
            puntaje_imdb=?, id_sala=? WHERE pelicula.id=?');
            $query->execute(array($titulo, $genero, $sinopsis, $puntaje, $sala, $id));
        }

        // Actualizar tabla salas
        function updateRooms($sala, $capacidad, $formato, $id){
            $query = $this->db->prepare('UPDATE sala SET letra=?, capacidad=?, formato=?
            WHERE sala.id=?');
            $query->execute(array($sala, $capacidad, $formato, $id));
        }

        // Trae todos los elementos de la tabla pelicula para ser mostrada en la vista del admin
        function getAdminMovie(){
            $query=$this->db->prepare('SELECT * FROM pelicula');
            $query->execute();
            $allMovies=$query->fetchAll(PDO::FETCH_OBJ);
            return $allMovies;    
        }

        // Borrar sala desde su id
        function deleteRoomId($id){
            $query = $this->db->prepare("DELETE FROM sala WHERE id=?");
            $query->execute(array($id));
        }
    
    }
?>