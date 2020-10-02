<?php

    require_once './libs/smarty/Smarty.class.php';


    class AdminView{

        public function __construct(){
            $this->title = "MODOCINE - Administrador";
            $this->smarty = new Smarty();
        }

        function renderAdmin($movies, $rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->smarty->assign('rooms', $rooms);

            $this->smarty->display('./templates/admin.tpl');
        }

        function renderInsertMovie(){
            $this->smarty->assign('titulo', $this->title);
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

    }
