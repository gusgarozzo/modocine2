<?php 

    require_once './Controller/loginController.php';

    class userModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        function getUser($user){
            $query = $this->db->prepare('SELECT * FROM usuario WHERE email=?');
            $query->execute(array($user));
            $datos=$query->fetch(PDO::FETCH_OBJ);
            return $datos;
        }

        function saveUserInDDBB($username, $hash){
            $query = $this->db->prepare("INSERT INTO usuario(email, password) VALUES(?,?)");
            $query->execute(array($username, $hash));
        }
    
    }