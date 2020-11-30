<?php

require_once './Model/userModel.php';
require_once './View/adminView.php';
require_once './Controller/adminController.php';

class loginController{
    private $admView;
    private $userModel;
    private $publicView;

    public function __construct(){
        $this->userModel = new userModel();
        $this->admView = new AdminView();
        $this->publicView = new MovieView();
    }


    function showLogin(){
        $this->admView->renderLogin();
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
                    //$_SESSION['loggedInUser'];
                    $_SESSION['timeout'] = time();
                    $_SESSION['admin'] = $usuario->admin;
                    $_SESSION['nickname'] = $usuario->nickname;

                    if($_SESSION['admin']=== "1"){
                        header("Location: ".BASE_URL."admin");
                        die();
                    }else{
                        header("Location: ".BASE_URL."home");
                        die();
                    }
                } else{
                    $this->admView->renderLogin("Contraseña incorrecta");
                }
            }else{
                $this->admView->renderLogin("Usuario incorrecto");
            }
        }
    }

    function showRegisterForm(){
        $this->admView->renderRegisterForm();
    }

    function registerUser(){
        if((!empty($_POST['nick'])) && (!empty($_POST['input_user'])) && (!empty($_POST['input_ruser'])) && (!empty($_POST['input_password'])) && (!empty($_POST['input_rpassword']))){
            $nickname = $_POST['nick'];
            $username = $_POST['input_user'];
            $rUsername =  $_POST['input_ruser'];
            $password = $_POST['input_password'];
            $rPassword = $_POST['input_rpassword'];
            $existeUsuario = $this->userModel->getUserInfo($username);
            if (!$existeUsuario) {
                if ($username === $rUsername) {
                    if ($password === $rPassword) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $user = $this->userModel->saveUserInDDBB($nickname, $username, $hash);
                        if($user>0){
                            $info=$this->userModel->getUserInfo($user);
                            $_SESSION["usuario"] = $username; 
                            $_SESSION['timeout'] = time();
                            $_SESSION['admin'] = $info->admin;
                            $_SESSION['nickname'] = $info->nickname;
                            header("Location: ".BASE_URL."home");
                        }else{
                            $this->admView->renderError("Registro inválido. Reintente");
                        }
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