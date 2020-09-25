<?php 

    require_once './Controller/movieController.php';

    class MovieModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_modocine;charset=utf8', 'root', '');
        }

        //traigo todos los elementos de la tabla pelicula
        function getAllMovies(){
            $query = $this->db->prepare('SELECT * FROM pelicula');
            $query->execute();
            $movies = $query->fetchAll(PDO::FETCH_OBJ);
            return $movies;
        }

        //traigo pelicula por genero
        function getMoviesByGenre($genre){
            $query = $this->db->prepare('SELECT * FROM pelicula WHERE genero =?');
            $query->execute(array($genre));
            $movieByGenre = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByGenre;
        }

        //traigo pelicula por sala
        function getMoviesByRoom($room){
            $query = $this->db->prepare('SELECT * FROM pelicula WHERE id_sala = ?');
            $query->execute([$room]);
            $movieByRoom = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByRoom;
        }

        function InsertMovie($title,$genre,$studio){
            $query = $this->db->prepare("INSERT INTO pelicula(nombre, genero, id_sala) VALUES(?,?,?)");
            $query->execute(array($title,$genre,$studio));
        }

        /* SELECT producto.nombre AS nombreProd, tipo.nombre AS nombreTipo FROM producto INNER JOIN tipo on producto.id_tipo = tipo.id */
    }

?>