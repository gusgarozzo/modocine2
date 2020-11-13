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
        session_start();
        if (isset($_SESSION["usuario"])){
            header("Location: ".BASE_URL."admin");
        } else{
            $this->admView->ShowLogin();
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->admView->ShowLoginLocation();
    }

    function verifyUser(){
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['password'];

        if(isset($user)){
            $usuario = $this->userModel->getUserInfo($user);

            if(isset($usuario) && $usuario){
                if (password_verify($pass, $usuario->password)){
                    session_start();
                    $_SESSION["usuario"] = $usuario->email; 
                    $_SESSION['loggedInUser'];
                    $_SESSION['timeout'] = time();
                    $this->admView->ShowAdmin();
                } else{
                    $this->admView->ShowLogin("Contraseña incorrecta");
                }
            }else{
                $this->admView->ShowLogin("Usuario incorrecto");
            }
        }
    }

    function showRegisterForm(){
        $this->admView->renderRegisterForm();
    }

    function registerUser(){
        if((!empty($_POST['input_user'])) && (!empty($_POST['input_ruser'])) && (!empty($_POST['input_password'])) && (!empty($_POST['input_rpassword']))){
            $username = $_POST['input_user'];
            $rUsername =  $_POST['input_ruser'];
            $password = $_POST['input_password'];
            $rPassword = $_POST['input_rpassword'];
            $existeUsuario = $this->userModel->getUserInfo($username);
            if (!$existeUsuario) {
                if ($username === $rUsername) {
                    if ($password === $rPassword) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $user=$this->userModel->saveUserInDDBB($username, $hash);
                        if($user>0){
                            session_start();
                            $_SESSION["usuario"] = $username; 
                            $_SESSION['timeout'] = time();
                            $this->admView->ShowAdmin();
                        }else{
                            $this->admView->renderError("Registro inválido. Reintente");
                        }
                        //Aca faltaria loguearlo
                        //
                        //llevarlo al home para que siga navegando
                        //$this->admView->ShowHomeLocation();
                    }
                    else {
                        $this->admView->renderRegisterForm('Las contraseñas no coinciden');
                        die();
                    }
                }
                else {
                    $this->admView->renderRegisterForm('Los emails no coinciden');
                    die();
                }
            }
            else {
                $this->admView->renderRegisterForm('El mail ingresado no esta disponible');
                die();
            }
        }
    }

}