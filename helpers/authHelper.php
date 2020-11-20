<?php

class AuthHelper {

    public function __construct() {}

    public function login($user) {
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
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USERNAME'];
    }
    
}
