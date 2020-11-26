<?php

    require_once './libs/smarty/Smarty.class.php';
    require_once './helpers/authHelper.php';

    class AdminView{

        private $log;
        private $rol;

        public function __construct(){
            $this->title = "MODOCINE";
            $this->smarty = new Smarty();
            $this->helper = new AuthHelper();
            $this->log = $this->helper->checkLoggedIn();
            $this->rol = $this->helper->isAdmin();
        }

        function renderAdmin($movies, $rooms, $users, $img){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->smarty->assign('rooms', $rooms);
            $this->smarty->assign('users', $users);
            $this->smarty->assign('img', $img);
            $this->showNav();
            $this->smarty->display('./templates/admin.tpl');
        }

        function renderInsertMovie($movies, $rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
            $this->smarty->assign('movies', $movies);
            $this->smarty->display('./templates/adminInsert.tpl');
        }

        function renderEditMovie($movie){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movie', $movie);
            $this->smarty->display('./templates/adminMovieEdit.tpl');
        }

        function renderEditRoom($room){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('room', $room);
            $this->smarty->display('./templates/adminRoomEdit.tpl');
        }

        function renderError($mensaje = ''){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('mensaje', $mensaje);
            $this->smarty->display('./templates/error.tpl');
        }

        function renderLogin($mensaje = ''){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('mensaje', $mensaje);
            $this->smarty->display('./templates/login.tpl');
        }

        function ShowLoginLocation(){
            header("Location: ".BASE_URL."login");
        }

        function ShowAdmin(){
            header("Location: ".BASE_URL."admin");
        }

        function renderRegisterForm($mensaje = ''){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('mensaje', $mensaje);
            $this->smarty->display('./templates/register.tpl');
        }

        function showRegisterForm(){
            header("Location: ".BASE_URL."registrar");
        }

        function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function renderEditUser($user){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('user', $user);
            $this->smarty->display('./templates/adminUserEdit.tpl');
        }

        function showNav(){
            $this->smarty->assign('titulo', $this->title);
            switch ($this->log) {
                case true:
                    switch ($this->rol) {
                        case true:
                            $this->smarty->display('./templates/nav-admin.tpl');
                        break;
                        case false:
                            $this->smarty->display('./templates/nav-user.tpl');
                        break;
                    };
                    break;
                case false:
                $this->smarty->display('./templates/nav.tpl');
                break;
            }
        }
    
    }
