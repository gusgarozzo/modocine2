<?php

    require_once './libs/smarty/Smarty.class.php';
    

    class AdminView{

        public function __construct(){
            $this->title = "MODOCINE - (ADMIN)";
            $this->smarty = new Smarty();
        }

        function renderAdmin($movies, $rooms){
            $this->smarty->assign('titulo', $this->title);
            $this->smarty->assign('movies', $movies);
            $this->smarty->assign('rooms', $rooms);

            $this->smarty->display('./templates/admin.tpl');
        }

        function renderEditMode($movie){
            foreach ($movie as $singleMovie) {
          
            $html = '<form action="editarPelicula?id='.$singleMovie->id.'" method="POST" class="formulario">
                        <label for="input_nombre">Nombre:</label>
                        <input type="text" placeholder="Titulo" name="input_nombre" value='.$singleMovie->nombre.'>
                        <label for="input_nombre">Genero:</label>
                        <input type="text" placeholder="Genero" name="input_genero" value='.$singleMovie->genero.'>
                        <label for="input_nombre">Puntaje:</label>
                        <input type="number" placeholder="Puntaje" name="input_puntaje" value='.$singleMovie->puntaje_imdb.'>
                        <label for="input_nombre">Sala:</label>
                        <input type="number" placeholder="Sala" name="input_id_sala" value='.$singleMovie->id_sala.'>
                        <h3>Ingrese la sinopsis de la película</h3>
                        <textarea name="input_sinopsis" cols="50" rows="5">'.$singleMovie->sinopsis.'</textarea>
                        <button name="editarPelicula" type="submit">Actualizar</button>
                    </form>';
            }
            echo $html;
        }

    }

?>