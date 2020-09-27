<?php 

    require_once './libs/smarty/Smarty.class.php';
    

    class MovieView{

        public function __construct(){
            $this->title = "MODOCINE";
            $this->smarty = new Smarty();
        }

        function renderHome(){
            // Display Header

            
            // Asignación de variables Smarty
            // Header
            $this->smarty->assign('titulo', $this->title);

            // Main
            $this->smarty->assign('titulo_seccion', "NOTICIAS DE CINE Y SERIES" );
            $this->smarty->assign('titulo_noticia1', "El cine después del coronavirus");
            $this->smarty->assign('imagen_noticia1', "<img src='images/cine.jpeg' alt='cine_vacio'/>");
            $this->smarty->assign('texto_noticia1', "El mundo sigue esperando esa luz al final del túnel que nos permita regresar, en mayor o menor
            medida, a nuestra vida normal y a nuestras calles. ¿Te acuerdas de esa última vez que fuiste al
            cine
            antes de que el coronavirus los cerrara? Seguro que has visto un montón de películas y series en
            el
            tiempo que llevamos confinados. Pero a lo mejor eres de esos que está deseando volver a sentarte
            en
            una butaca y disfrutar del cine en pantalla grande.Todavía no sabemos cuándo volverán a
            abrir
            sus puertas las salas de cine, ni en qué condiciones lo harán. Se esperan cambios importantes
            para
            garantizar la seguridad del personal y de los espectadores, pero de momento, sin una fecha
            concreta,
            tampoco hay anuncios específicos por parte de las empresas. Tampoco sabemos con qué películas
            volverán a abrir, dado que los principales estrenos han movido su fecha de lanzamiento a verano
            o
            más allá. ¿Se optará por el reestreno de éxitos pasados, o será un regreso a medio gas hasta que
            podamos volver en serio a la normalidad?.");
            $this->smarty->assign('titulo_noticia2', "Es mejor para tu salud mental que veas Contagio a que pongas los informativos,
            según una psicóloga");
            $this->smarty->assign('imagen_noticia2', "<img src='images/contagio.jpg' alt='escena_de_la_pelicula'/>");
            $this->smarty->assign('texto_noticia2', "Aunque ya tenemos bastantes preocupaciones a raíz de la pandemia de coronavirus que afecta a casi
            todos los ámbitos de nuestra vida, no podemos olvidarnos de nuestra salud mental. El
            confinamiento o la incertidumbre de cuándo terminará y podremos recuperar nuestra vida normal (o al menos gran
            parte de ella) pueden afectar mucho a nuestro estado de ánimo y a nuestra cabeza. ¿Qué medidas podemos
            tomar para reducir esa carga negativa hacia el cerebro? Sorprendentemente, ponernos
            <a href='https://www.youtube.com/watch?v=s5mwBJRFAA4' class='enlace' target='_blank'>
                'Contagio'</a>. La doctora <span>Pamela Rutledge</span>, directora del Media Psychology
            Research Center, ha explicado a Insider que las películas sobre pandemias en realidad pueden
            hacer bastante bien a nuestra salud mental, sobre todo porque ofrecen una cosa muy importante que la
            realidad de momento no nos puede dar: un cierre. 'Nos hace sentir que no estamos solos, y que
            hay una resolución para estas historias así que podemos expresar nuestra ansiedad de esa manera. Ya
            sea con películas zombies o con 'Contagio', cualquier thriller aumenta mucho la ansiedad y el miedo
            que luego son resueltos al final', explica la psicóloga.</p>");
            $this->smarty->assign('titulo_noticia3', "¿Cuándo se estrenará Mulán en Argentina?");
            $this->smarty->assign('imagen_noticia3', "<img src='images/mulan.jpeg' alt='mulan_con_una_espada'>");
            $this->smarty->assign('texto_noticia3', "La versión live-action de Mulán fue uno de los tantos estrenos afectados por la pandemia de
            coronavirus. La película originalmente iba a estrenarse el 26 de marzo en Argentina. Disney
            esta semana informo que la nueva fecha de estreno será para el 23 de julio, dentro del período de
            vacaciones de invierno de este año. De ser asi, Mulán compartirá la cartelera junto a
            <span>Tenet de Christopher Nolan</span> que también se estrenaría ese dia.");
            $this->smarty->assign('titulo_noticia4', "'Doctor Strange 2', 'Thor: Love and Thunder' y las secuelas de 'Spider-Man' ya
            tienen nuevas fechas de estreno");
            $this->smarty->assign('imagen_noticia4', "<img src='images/superheroes.jpg' alt='personajes_protagonistas'>");
            $this->smarty->assign('texto_noticia4', "Debido al coronavirus, muchos estrenos, tanto cinéfilos como seriéfilos, se han visto afectados
            ya
            sea por tener que paralizar su rodaje o por tener que empezarlo mucho más tarde de lo planeado.
            Sin
            embargo, Sony y Marvel han anunciado las nuevas fechas de estreno de varias de sus
            películas. La
            secuela de <a href='https://www.youtube.com/watch?v=OaBHtiBI42U' target='_blank'>Spider-Man:
                Homecoming</a> se ha retrasado del 16 de julio de 2020 al 5 de noviembre de
            2021.
            <span>Spider-Man: Un nuevo Universo 2</span> solo se ha atrasado unos pocos meses: del 8 de
            abril de
            2022 al 7 de octubre del mismo año. Por otro lado, <span>Doctor Strange in the Multiverse of
                Madness</span> se estrenará finalmente el 25 de marzo de 2022 en vez de hacerlo el 5 de
            noviembre de 2021. Y por último, Thor: Love and Thunder de Taika Waititi sólo se ha
            atrasado
            unos pocos días: del 11 de febrero de 2022 al 18 de febrero del mismo año. Otras de las
            películas
            que se ha visto afectada por el coronavirus ha sido Uncharted con Tom Holland, que se estrenará
            finalmente el 8 de octubre de 2021 en vez de hacerlo el 16 del mismo año.");
            $this->smarty->assign('titulo_aside', "Top 10: Lo más visto en Argentina");
            $this->smarty->assign('item1', "<a href='https://www.youtube.com/watch?v=2S5QZck_lyE' target='_blank'> El
            Silencio del Pantano</a>");
            $this->smarty->assign('item2', "<a href='https://www.youtube.com/watch?v=UqWH487bpmc' target='_blank'> Elite</a>");
            $this->smarty->assign('item3', "<a href='https://www.youtube.com/watch?v=Oyuomep8Ac4' target='_blank'> El
            Hoyo</a>");
            $this->smarty->assign('item4', "<a href='https://www.youtube.com/watch?v=-DNFVYcrY5M' target='_blank'> Freud</a>");
            $this->smarty->assign('item5', "<a href='https://www.youtube.com/watch?v=Nh-mJ_5jqLA' target='_blank'> Madame C.J
            Walker: Una mujer que se hizo asi misma</a>");
            $this->smarty->assign('item6', "<a href='https://www.youtube.com/watch?v=NvwNCuLt7u8' target='_blank'> Al Final
            del Paraiso</a>");
            $this->smarty->assign('item7', "<a href='https://www.youtube.com/watch?v=wPqcNPDc0z0' target='_blank'> Los
            Asesinatos del Valhalla</a>");
            $this->smarty->assign('item8', "<a href='https://www.youtube.com/watch?v=LvTfjCsQZQ0' target='_blank'> Virus</a>");
            $this->smarty->assign('item9', "<a href='https://www.youtube.com/watch?v=DjmbrDogI0o' target='_blank'>Pandemia</a>");
            $this->smarty->assign('item10', "<a href='https://www.youtube.com/watch?v=To_kVMMu-Ls' target='_blank'> La Casa de
            Papel</a>");


            $this->smarty->display('templates/index.tpl');
        }


        function renderContacto(){

            $this->smarty->assign('titulo', "Modocine");
            $this->smarty->assign('inicio', "Inicio");
            $this->smarty->assign('estrenos', "Estrenos");
            $this->smarty->assign('contacto', "Contacto");

            $this->smarty->display('./templates/header.tpl');
            
                    $html= '<main class="main-contacto">
                        <h1>Dudas y sugerencias</h1>
                        <p>Completá el formulario con tus datos y dejanos tus dudas y sugerencias.</p>
                        <form action="" class="formulario">
                            <p>Nombre:</p>
                            <input type="text" id="nombre" placeholder="Nombre">
                            <p>Apellido:</p>
                            <input type="text" id="apellido" placeholder="Apellido">
                            <p>Correo Electrónico:</p>
                            <input type="email" id="mail" placeholder="hola@hola.com.ar">
            
                            <p class="titulo-genero">Género</p>
                            <div class="genero">
                                <div class="masculino">
                                    <p>Masculino</p>
                                    <input type="radio" name="genero" value="Masculino">
                                </div>
                                <div class="femenino">
                                    <p>Femenino</p>
                                    <input type="radio" name="genero" value="Femenino">
                                </div>
                                <div class="otro">
                                    <p>Otro</p>
                                    <input type="radio" name="genero" value="Otro">
                                </div>
                            </div>
                            <label for="genero-otro">Cual?</label>
                            <input type="text" id="genero-otro">
            
                            <p class="titulo-textarea">Mensaje</p>
                            <textarea name="Deja aqui tu mensaje" cols="50" rows="5" class="textarea"></textarea>
                            
                            <h2 class="titulo-captcha">CAPTCHA</h2>
                            <div class="captcha">
                                <input type="text" id="captcha" readonly class="captcha">
                                <input type="text" id="validar" class="captcha">
                                <p id="mensaje"></p>
                            </div>
                            <input type="submit" id="boton" class="boton">
                        </form>
                    </main>
                </div>
                <footer>
                    <div class="social">
                        <i class="fab fa-instagram fa-2x"></i>
                        <i class="fab fa-facebook fa-2x"></i>
                        <i class="fab fa-twitter fa-2x"></i>
                    </div>
                </footer>
            </body>
            
            </html>';
            echo $html;
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

        
    }