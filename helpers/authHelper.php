<?php

class AuthHelper {

    public function __construct() {}

    public function sessionController(){
        if(!isset($_SESSION)){ 
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
    }

    public function getLoggedUserName() {
        if (!isset($_SESSION)){
            session_start();
            if (session_status() == PHP_SESSION_ACTIVE){
                return $_SESSION['nickname'];
            }
            else{
                return false;
            }
        }else{
            if (session_status() == PHP_SESSION_ACTIVE){
                return $_SESSION['nickname'];
            }
            else{
                return false;
            }
        }
    }

    static public function checkLoggedIn() { 
        if (!isset($_SESSION)){
            session_start();
            if (isset($_SESSION['usuario'])) {
                return true;
            }       
            else{
                return false;
            }
        }else{
            if (isset($_SESSION['usuario'])) {
                return true;
            }       
            else{
                return false;
            }
        }
    }

    public function isAdmin(){
        if (!isset($_SESSION)){
            session_start();
            if (isset($_SESSION['usuario'])){
                if($_SESSION['admin'] === "1"){
                    return true;
                }
                else{
                    return false;
                }
            }
        }else{
            if (isset($_SESSION['usuario'])){
                if($_SESSION['admin'] === "1"){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
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


   */
}
