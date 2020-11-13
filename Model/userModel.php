<?php 

    require_once './Controller/loginController.php';

    class userModel{

        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=modocine;charset=utf8', 'root', '');
        }

        function getAllUsers(){
            $query=$this->db->prepare('SELECT * FROM usuario');
            $query->execute();
            $allUsers = $query->fetchAll(PDO::FETCH_OBJ);
            return $allUsers;  
        }

        function getUserInfo($user){
            $query = $this->db->prepare('SELECT * FROM usuario WHERE email=?');
            $query->execute(array($user));
            $datos=$query->fetch(PDO::FETCH_OBJ);
            return $datos;
        }

        function saveUserInDDBB($username, $hash){
            $query = $this->db->prepare("INSERT INTO usuario(email, password) VALUES(?,?)");
            $query->execute(array($username, $hash));
            return $query->rowCount();
        }

        function getUserById($user_id){
            $query = $this->db->prepare('SELECT usuario.id, usuario.email, usuario.admin FROM usuario WHERE id=?');
            $query->execute(array($user_id));
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }

        function editPermission($user_id, $isAdmin){
            $query = $this->db->prepare('UPDATE usuario SET admin=? WHERE id=?');
            $query->execute(array($isAdmin, $user_id));
        }

        function getUsersRol($email){
            $query = $this->db->prepare('SELECT admin FROM usuario WHERE email=?');
            $query->execute(array($email));
            $datos=$query->fetch(PDO::FETCH_OBJ);
            return $datos;
        }
    
    }