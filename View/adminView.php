<?php

    require_once './libs/smarty/Smarty.class.php';

    class AdminView{

        public function __construct(){
            $this->title = "MODOCINE - Administrador";
            $this->smarty = new Smarty();
        }

        function renderAdmin($movies, $rooms, $users){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->smarty->assign('rooms', $rooms);
            $this->smarty->assign('users', $users);
            $this->smarty->display('./templates/admin.tpl');
        }

        function renderInsertMovie($rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
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

        function showLogin($mensaje = ''){
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
    
    }
