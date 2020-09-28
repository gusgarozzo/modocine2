<?php 

    require_once './Controller/movieController.php';

    class MovieModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_modocine;charset=utf8', 'root', '');
        }

        function getAdminMovie(){
            $query=$this->db->prepare('SELECT * FROM pelicula');
            $query->execute();
            $allMovies=$query->fetchAll(PDO::FETCH_OBJ);
            return $allMovies;    
        }
        


        function getMovieById($id){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, pelicula.puntaje_imdb, pelicula.id_sala, sala.letra,
                                         pelicula.sinopsis FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE pelicula.id=?');
            $query->execute(array($id));
            $movie = $query->fetchAll(PDO::FETCH_OBJ);                                      //NUEVO--------------------------------------------------------------
            return $movie;
        }

        //traigo todos los elementos de la tabla pelicula
        function getAllMoviesAndRooms(){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, pelicula.id, pelicula.id_sala, sala.letra 
                                        FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id');
            $query->execute();
            $movies = $query->fetchAll(PDO::FETCH_OBJ);
            return $movies;
        }

        //traigo pelicula por genero
        function getMoviesByGenre($genre){
            $query = $this->db->prepare('SELECT pelicula.id, pelicula.nombre, pelicula.genero, sala.letra 
            FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE pelicula.genero=?');
            $query->execute(array($genre));
            $movieByGenre = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByGenre;
        }

        //traigo pelicula por sala
        function getMoviesByRoom($room){
            $query = $this->db->prepare('SELECT pelicula.id, pelicula.nombre, pelicula.genero, sala.letra 
            FROM pelicula INNER JOIN sala ON pelicula.id_sala = sala.id WHERE sala.id=?');
            $query->execute([$room]);
            $movieByRoom = $query->fetchAll(PDO::FETCH_OBJ);
            return $movieByRoom;
        }

        function InsertMovie($title,$genre,$sinopsis,$puntaje_imdb,$studio){
            $query = $this->db->prepare("INSERT INTO pelicula(nombre, genero, sinopsis, puntaje_imdb, id_sala) VALUES(?,?,?,?,?)");
            $query->execute(array($title,$genre,$sinopsis,$puntaje_imdb,$studio));
        }

        function deleteMovie($movie){
            $query = $this->db->prepare('DELETE * FROM pelicula WHERE id=?');
            $query->execute($movie);
        }

    }