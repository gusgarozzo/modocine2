<?php 

    class MovieModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        function getMovieById($id){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, pelicula.puntaje_imdb, pelicula.id, pelicula.id_sala, sala.letra,
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

        function searchMovies($option, $search){
            $query = $this->db->prepare("SELECT * FROM pelicula INNER JOIN sala WHERE pelicula.id_sala = sala.id 
                AND $option LIKE '%".$search."%'");
            $query->execute(array($option, $search));
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        function getIdAndNameMovies(){
            $query = $this->db->prepare("SELECT pelicula.nombre, pelicula.id FROM pelicula");
            $query->execute();
            $movies = $query->fetchAll(PDO::FETCH_OBJ);
            return $movies;
        }
        // *********************** ACA EMPIEZA LO DEL ADMIN ************************

        // Agregar pelicula
        function insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala){
            $query = $this->db->prepare("INSERT INTO pelicula(nombre, genero, sinopsis, puntaje_imdb, id_sala) VALUES(?,?,?,?,?)");
            $query->execute(array($titulo, $genero, $sinopsis, $puntaje, $sala));
            return $query->rowCount();
        }

        // Agregar Sala
        function insertNewRoom($sala, $capacidad, $formato, $tipo, $info){
            $query = $this->db->prepare("INSERT INTO sala(letra, capacidad, formato, butaca, info_butaca) VALUES(?,?,?,?,?)");
            $query->execute(array($sala, $capacidad, $formato, $tipo, $info));
            return $query->rowCount();
        }

        // Borrar pelicula
        function deleteMovieId($id){
            $query = $this->db->prepare("DELETE FROM pelicula WHERE id=?");
            $query->execute(array($id));
            return $query->rowCount();
        }

        // Traer pelicula por el id
        function getMovieByIdAdm($id){
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
            return $query->rowCount();
        }

        // Actualizar tabla salas
        function updateRooms($sala, $capacidad, $formato, $id){
            $query = $this->db->prepare('UPDATE sala SET letra=?, capacidad=?, formato=?
            WHERE sala.id=?');
            $query->execute(array($sala, $capacidad, $formato, $id));
            return $query->rowCount();;
        }

        // Trae todos los elementos de la tabla pelicula para ser mostrada en la vista del admin
        function getMovies(){
            $query=$this->db->prepare('SELECT * FROM pelicula');
            $query->execute();
            $allMovies=$query->fetchAll(PDO::FETCH_OBJ);
            return $allMovies;
        }

        function getMoviePhotos(){
            $query=$this->db->prepare('SELECT * FROM pelicula INNER JOIN imagen WHERE pelicula.id = imagen.id_pelicula');
            $query->execute();
            $moviePhoto = $query->fetchAll(PDO::FETCH_OBJ);
            return $moviePhoto;
        }

        // Borrar sala desde su id
        function deleteRoomId($id){
            $query = $this->db->prepare("DELETE FROM sala WHERE id=?");
            $action=$query->execute(array($id));

            return $action;
        }
   
    }