<?php

class AuthHelper {

    public function __construct() {}

    public function isAdmin(){
        if($_SESSION['admin'] === "1"){
            return;
        }
        else {
            header("Location: ".BASE_URL."home");
        }
    }

    public function sessionController(){
        session_start();
        if (!isset($_SESSION['usuario'])){
            header("Location: ".BASE_URL."login");
            die();
        }else{
            // Pasados los 2 minutos de inactividad, se cierra automaticamente la sesión
            if(isset($_SESSION['timeout']) && (time()-$_SESSION['timeout'] > 800)){
                header("Location: ".BASE_URL."logout");  
                die();
            }
            // De lo contrario, se actualiza el temporizador
            $_SESSION['timeout'] = time();
        }
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['username'] = 'invitado';
    }


    /*public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

 static public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            return false;
        }       
        else {
            return true;
        }
    }
   */
}
