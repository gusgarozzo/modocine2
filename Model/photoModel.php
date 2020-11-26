<?php 

    class PhotoModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        function insertPhoto($imagen, $nombre, $tipo, $id_pelicula){
                $query = $this->db->prepare("INSERT INTO imagen(imagen, nombre, tipo, id_pelicula) VALUES(?,?,?,?)");
                $query->execute(array($imagen, $nombre, $tipo, $id_pelicula));
            }
        }