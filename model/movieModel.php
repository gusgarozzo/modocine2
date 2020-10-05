<?php 

    require_once './Controller/publicController.php';
    require_once './Controller/adminController.php';

    class MovieModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_modocine;charset=utf8', 'root', '');
        }

        function getMovieById($id){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, pelicula.puntaje_imdb, pelicula.id_sala, sala.letra,
                                            pelicula.sinopsis FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE pelicula.id=?');
            $query->execute(array($id));
            $movie = $query->fetchAll(PDO::FETCH_OBJ);
            return $movie;
        }

        function getAllMoviesAndRooms(){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, pelicula.id, pelicula.id_sala, sala.letra 
                                        FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id');
            $query->execute();
            $movies = $query->fetchAll(PDO::FETCH_OBJ);
            return $movies;
        }

        function getMoviesByGenre($genre){
            $query = $this->db->prepare('SELECT pelicula.id, pelicula.nombre, pelicula.genero, sala.letra 
            FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE pelicula.genero=?');
            $query->execute(array($genre));
            $movieByGenre = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByGenre;
        }

        function getMoviesByRoom($room){
            $query = $this->db->prepare('SELECT pelicula.id, pelicula.nombre, pelicula.genero, sala.letra 
            FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE sala.id=?');
            $query->execute([$room]);
            $movieByRoom = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByRoom;
        }
   
    }
?>