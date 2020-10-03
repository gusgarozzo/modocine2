<?php

require_once './Model/userModel.php';
require_once './View/adminView.php';
require_once './Controller/adminController.php';

class loginController{
    private $admView;
    private $userModel;

    public function __construct(){
        $this->userModel = new userModel();
        $this->admView = new AdminView();
    }

    function login(){
        $this->admView->ShowLogin();
    }

    function logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);
    }

    function verifyUser(){
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['password'];

        if(isset($user)){
            $usuario = $this->userModel->getUser($user);

            if(isset($usuario) && $usuario){
                if (password_verify($pass, $usuario->password)){
                    session_start();
                    $_SESSION["EMAIL"] = $usuario->email;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    header("Location: ".BASE_URL."admin");
                } else{
                    $this->admView->ShowLogin("Contraseña incorrecta");
                }
            }else{
                $this->admView->ShowLogin("El usuario no existe");
            }

        }
    }
}