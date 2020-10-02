<?php 

    require_once './Controller/adminController.php';

    class AdminModel{
    
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_modocine;charset=utf8', 'root', '');
        }

        function insertNewMovie($titulo, $genero, $sinopsis, $puntaje, $sala){
            $query = $this->db->prepare("INSERT INTO pelicula(nombre, genero, sinopsis, puntaje_imdb, id_sala) VALUES(?,?,?,?,?)");
            $query->execute(array($titulo, $genero, $sinopsis, $puntaje, $sala));
        }

        function insertNewRoom($sala, $capacidad, $formato){
            $query = $this->db->prepare("INSERT INTO sala(letra, capacidad, formato) VALUES(?,?,?)");
            $query->execute(array($sala, $capacidad, $formato));
        }

        function deleteMovieId($id){
            $query = $this->db->prepare("DELETE FROM pelicula WHERE id=?");
            $query->execute(array($id));
        }

        function getMovieById($id){
            $query=$this->db->prepare('SELECT * FROM pelicula WHERE id=?');
            $query->execute(array($id));
            $movie = $query->fetchAll(PDO::FETCH_OBJ);
            return $movie;
        }

        function updateValues($titulo, $genero, $sinopsis, $puntaje,$sala,$id){
            $query = $this->db->prepare('UPDATE pelicula SET nombre=?, genero=?, sinopsis=?,
            puntaje_imdb=?, id_sala=? WHERE pelicula.id=?');
            $query->execute(array($titulo, $genero, $sinopsis, $puntaje, $sala, $id));
        }

        function updateRooms($sala, $capacidad, $formato, $id){
            $query = $this->db->prepare('UPDATE sala SET letra=?, capacidad=?, formato=?
            WHERE sala.id=?');
            $query->execute(array($sala, $capacidad, $formato, $id));
        }

        function getAdminMovie(){
            $query=$this->db->prepare('SELECT * FROM pelicula');
            $query->execute();
            $allMovies=$query->fetchAll(PDO::FETCH_OBJ);
            return $allMovies;    
        }

        function deleteRoomId($id){
            $query = $this->db->prepare("DELETE FROM sala WHERE id=?");
            $query->execute(array($id));
        }
    
    }
?>