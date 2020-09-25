<?php 

    require_once './Controller/movieController.php';

    class RoomModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_modocine;charset=utf8', 'root', '');
        }

        //traigo todos los elementos de la tabla sala
        function getAllRooms(){
            $query = $this->db->prepare('SELECT * FROM sala');
            $query->execute();
            $room = $query->fetchAll(PDO::FETCH_OBJ);
            return $room;
        }

    }

?>