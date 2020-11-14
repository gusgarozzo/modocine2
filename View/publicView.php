<?php 

    require_once './libs/smarty/Smarty.class.php';
    

    class MovieView{

        public function __construct(){
            $this->title = "MODOCINE";
            $this->smarty = new Smarty();
        }

        function renderHome(){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->display('./templates/index.tpl');
        }


        function renderContacto(){
            $this->smarty->assign('titulo', "Modocine");
            $this->smarty->assign('inicio', "Inicio");
            $this->smarty->assign('estrenos', "Estrenos");
            $this->smarty->assign('contacto', "Contacto");
            $this->smarty->display('./templates/contacto.tpl');     
        }
        

        function renderEstrenos($movies){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            //$this->smarty->display('./templates/header.tpl');
            $this->smarty->display('./templates/mainEstrenos.tpl');
            //$this->smarty->display('./templates/asideEstrenosTabla.tpl');
            //$this->smarty->display('./templates/footer.tpl');
        }

        function renderMoviesByGenre($movies){
            $this->renderEstrenos($movies);
        }

        function renderMoviesByRoom($movies){
            $this->renderEstrenos($movies);
        }

        function renderMovieById($movie){ 
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movie);
            
            foreach($movie as $mov){
                $this->smarty->assign('pelicula', $mov->nombre);
            }
            //$this->smarty->display('./templates/mainEstrenos.tpl');
            $this->smarty->display('./templates/asideEstrenosDetalles.tpl');
            //$this->smarty->display('./templates/footer.tpl');
        }

        function renderRooms($rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
            $this->smarty->display('./templates/rooms.tpl');

        }

        function renderRoomById($rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('rooms', $rooms);
            $this->smarty->display('./templates/asideRoomDetalle.tpl');

        }

        function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

    }