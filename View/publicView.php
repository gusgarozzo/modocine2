<?php 

    require_once './libs/smarty/Smarty.class.php';
    require_once './helpers/authHelper.php';

    class MovieView{

        private $log;
        private $rol;

        public function __construct(){
            $this->title = "MODOCINE";
            $this->smarty = new Smarty();
            $this->helper = new AuthHelper();
            $this->log = $this->helper->checkLoggedIn();
            $this->rol = $this->helper->isAdmin();
        }

        function renderHome(/*$mensaje = ''*/){ 
            //$this->smarty->assign('mensaje', $mensaje);
            $this->showNav();
            $this->smarty->display('./templates/index.tpl');
        }


        function renderContacto(){
            $this->showNav();
            $this->smarty->display('./templates/contacto.tpl');     
        }
        

        function renderEstrenos($movies){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->showNav();
            $this->smarty->display('./templates/mainEstrenos.tpl');
        }

        function renderMoviesByGenre($movies){
            $this->renderEstrenos($movies);
        }

        function renderMoviesByRoom($movies){
            $this->renderEstrenos($movies);
        }

        function renderMovieById($movie, $usuario, $image){ 
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movie);
            $this->smarty->assign('usuario', $usuario);
            $this->smarty->assign('image', $image);
            $this->showNav();
            $this->smarty->display('./templates/asideEstrenosDetalles.tpl');
        }

        function renderRooms($rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
            $this->showNav();
            $this->smarty->display('./templates/rooms.tpl');

        }

        function renderRoomById($rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
            $this->showNav();
            $this->smarty->display('./templates/asideRoomDetalle.tpl');
        }

        function renderSearch($results){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('results', $results);
            $this->showNav();
            $this->smarty->display('./templates/asideSearch.tpl'); // falta armar
        }

        function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function renderAdmin($user = null, $mensaje = ''){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('mensaje', $mensaje);
            $this->smarty->assign('user', $user);
            $this->smarty->display('./templates/aIndex.tpl');
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