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

            $this->smarty->display('./templates/header.tpl');
            $this->smarty->display('./templates/main-estrenos.tpl');
            $this->smarty->display('./templates/aside-estrenos-tabla.tpl');
            $this->smarty->display('./templates/footer.tpl');
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

            $this->smarty->display('./templates/header.tpl');
            $this->smarty->display('./templates/main-estrenos.tpl');
            $this->smarty->display('./templates/aside-estrenos-detalles.tpl');
            $this->smarty->display('./templates/footer.tpl');
        }

        function renderRooms($rooms){
            //$this->renderEstrenos($rooms);
            $table = '<table><thead><tr>
                <th>Sala</th>
                <th>Capacidad</th>
                <th>Formato de Proyección</th>
            </tr></thead>';
            foreach ($rooms as $room) {
                $table.= "<tbody><tr>
                        <td>$room->letra</td>
                        <td>$room->capacidad personas</td>
                        <td>$room->formato</td>
                    </tr>";
            }
            $table.= '</tbody></table>';
        }

        function renderAdmin($movies, $rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->smarty->assign('rooms', $rooms);

            $this->smarty->display('./templates/admin.tpl');

        }
    }