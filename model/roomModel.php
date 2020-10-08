<?php 

    require_once './Controller/publicController.php';

    class RoomModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        function getAllRooms(){
            $query = $this->db->prepare('SELECT * FROM sala');
            $query->execute();
            $room = $query->fetchAll(PDO::FETCH_OBJ);
            return $room;
        }

        function getRoomById($id){
            $query = $this->db->prepare('SELECT pelicula.nombre, pelicula.genero, sala.letra FROM sala INNER JOIN pelicula ON sala.id = pelicula.id_sala WHERE sala.id=?');
            $query->execute(array($id));
            $room = $query->fetchAll(PDO::FETCH_OBJ);
            return $room;
        }

        function getRoomInfoById($id){
            $query = $this->db->prepare('SELECT * FROM sala WHERE sala.id=?');
            $query->execute(array($id));
            $room = $query->fetchAll(PDO::FETCH_OBJ);
            return $room;
        }

    }

?>