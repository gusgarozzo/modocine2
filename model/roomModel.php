<?php 

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
            $query = $this->db->prepare('SELECT * FROM sala WHERE sala.id=?');
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

        // ***************** ADMIN ******************

        // Agregar Sala
        function insertNewRoom($sala, $capacidad, $formato, $tipo, $info){
            $query = $this->db->prepare("INSERT INTO sala(letra, capacidad, formato, butaca, info_butaca) VALUES(?,?,?,?,?)");
            $query->execute(array($sala, $capacidad, $formato, $tipo, $info));
            return $query->rowCount();
        }

        // Actualizar tabla salas
        function updateRooms($sala, $capacidad, $formato, $id){
            $query = $this->db->prepare('UPDATE sala SET letra=?, capacidad=?, formato=?
            WHERE sala.id=?');
            $query->execute(array($sala, $capacidad, $formato, $id));
            return $query->rowCount();;
        }

        // Borrar sala desde su id
        function deleteRoomId($id){
            $query = $this->db->prepare("DELETE FROM sala WHERE id=?");
            $action=$query->execute(array($id));

            return $action;
        }
    }
?>