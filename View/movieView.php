<?php 

    class MovieView{

        function renderHome(){

            $html = '<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>ModoCine</title>
                <link rel="stylesheet" href="css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/menu.js"></script>
                <base href="' . BASE_URL . '">
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>MODOCINE</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home">INICIO</a></li>
                                    <li><a href="estrenos">ESTRENOS</a></li>
                                    <li><a href="contacto">CONTACTO</a></li>
                                </ul>
                        </nav>
                    </header>
            
                    <main class="mainIndex">
                        <section>
                            <h1>NOTICIAS DE CINE Y SERIES</h1>
                            <article>
                                <h2 class="titulo">El cine después del coronavirus</h2>
                                <img src="images/cine.jpeg" alt="cine_vacio" />
                                <p>El mundo sigue esperando esa luz al final del túnel que nos permita regresar, en mayor o menor
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
                                    podamos volver en serio a la normalidad?.</p>
                            </article>
                            <article>
                                <h2 class="titulo">Es mejor para tu salud mental que veas "Contagio" a que pongas los informativos,
                                    según una
                                    psicóloga
                                </h2>
                                <img src="images/contagio.jpg" alt="escena_de_la_pelicula" />
                                <p>Aunque ya tenemos bastantes preocupaciones a raíz de la pandemia de coronavirus que afecta a casi
                                    todos los ámbitos de nuestra vida, no podemos olvidarnos de nuestra salud mental. El
                                    confinamiento o
                                    la incertidumbre de cuándo terminará y podremos recuperar nuestra vida normal (o al menos gran
                                    parte
                                    de ella) pueden afectar mucho a nuestro estado de ánimo y a nuestra cabeza. ¿Qué medidas podemos
                                    tomar para reducir esa carga negativa hacia el cerebro? Sorprendentemente, ponernos
                                    <a href="https://www.youtube.com/watch?v=s5mwBJRFAA4" class="enlace" target="_blank">
                                        "Contagio"</a>. La doctora <span>Pamela Rutledge</span>, directora del Media Psychology
                                    Research Center, ha explicado a Insider que las películas sobre pandemias en realidad pueden
                                    hacer
                                    bastante bien a nuestra salud mental, sobre todo porque ofrecen una cosa muy importante que la
                                    realidad de momento no nos puede dar: un cierre. "Nos hace sentir que no estamos solos, y que
                                    hay
                                    una resolución para estas historias así que podemos expresar nuestra ansiedad de esa manera. Ya
                                    sea
                                    con películas zombies o con "Contagio", cualquier thriller aumenta mucho la ansiedad y el miedo
                                    que
                                    luego son resueltos al final", explica la psicóloga.</p>
                            </article>
                            <article>
                                <h2 class="titulo">¿Cuándo se estrenará Mulán en Argentina?</h2>
                                <img src="images/mulan.jpeg" alt="mulan_con_una_espada">
                                <p>La versión live-action de Mulán fue uno de los tantos estrenos afectados por la pandemia de
                                    coronavirus. La película originalmente iba a estrenarse el 26 de marzo en Argentina. Disney
                                    esta
                                    semana informo que la nueva fecha de estreno será para el 23 de julio, dentro del período de
                                    vacaciones de invierno de este año. De ser asi, Mulán compartirá la cartelera junto a
                                    <span>Tenet de
                                        Christopher Nolan</span> que también se estrenaría ese dia.</p>
                            </article>
                            <article>
                                <h2 class="titulo"> "Doctor Strange 2", "Thor: Love and Thunder" y las secuelas de "Spider-Man" ya
                                    tienen nuevas
                                    fechas
                                    de estreno</h2>
                                <img src="images/superheroes.jpg" alt="personajes_protagonistas">
                                <p>Debido al coronavirus, muchos estrenos, tanto cinéfilos como seriéfilos, se han visto afectados
                                    ya
                                    sea por tener que paralizar su rodaje o por tener que empezarlo mucho más tarde de lo planeado.
                                    Sin
                                    embargo, Sony y Marvel han anunciado las nuevas fechas de estreno de varias de sus
                                    películas. La
                                    secuela de <a href="https://www.youtube.com/watch?v=OaBHtiBI42U" target="_blank">Spider-Man:
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
                                    finalmente el 8 de octubre de 2021 en vez de hacerlo el 16 del mismo año. </p>
                            </article>
                        </section>
                    </main>
                    <aside class="asideIndex">
                        <h2>Top 10: Lo más visto en Argentina</h2>
                        <ol>
                            <li><a href="https://www.youtube.com/watch?v=2S5QZck_lyE" target="_blank"> El Silencio del Pantano</a></li>
                            <li><a href="https://www.youtube.com/watch?v=UqWH487bpmc" target="_blank"> Elite</a></li>
                            <li><a href="https://www.youtube.com/watch?v=Oyuomep8Ac4" target="_blank"> El Hoyo</a></li>
                            <li><a href="https://www.youtube.com/watch?v=-DNFVYcrY5M" target="_blank"> Freud</a></li>
                            <li><a href="https://www.youtube.com/watch?v=Nh-mJ_5jqLA" target="_blank"> Madame C.J Walker: Una mujer que se hizo asi misma</a></li>
                            <li><a href="https://www.youtube.com/watch?v=NvwNCuLt7u8" target="_blank"> Al Final del Paraiso</a></li>
                            <li><a href="https://www.youtube.com/watch?v=wPqcNPDc0z0" target="_blank"> Los Asesinatos del Valhalla</a></li>
                            <li><a href="https://www.youtube.com/watch?v=LvTfjCsQZQ0" target="_blank"> Virus</a></li>
                            <li><a href="https://www.youtube.com/watch?v=DjmbrDogI0o" target="_blank"> Pandemia</a></li>
                            <li><a href="https://www.youtube.com/watch?v=To_kVMMu-Ls" target="_blank"> La Casa de Papel</a></li>
                        </ol>

                        <h2> Cartelera de Cine</h2>
                        <p> Busque por género o por sala y encuentre la película que desea ver </p>
                        <h3 class="asideTitle">Buscar pelicula por genero</h3>
                        <ol>
                            <li><a href="Genero?genre=Accion">Acción</a></li>
                            <li><a href="Genero?genre=Suspenso">Suspenso</a></li>
                            <li><a href="Genero?genre=Aventura">Aventura</a></li>
                            <li><a href="Genero?genre=Drama">Drama</a></li>
                            <li><a href="Genero?genre=Terror">Terror</a></li>
                        </ol>
                        <h3 class="asideTitle">Buscar pelicula por sala</h3>
                        <ol>
                            <li><a href="Salas?room=1">Sala 1</a></li>
                            <li><a href="Salas?id_sala=2">Sala 2</a></li>
                            <li><a href="Salas?id_sala=3">Sala 3</a></li>
                            <li><a href="VerSalas">Ver todas las salas</a></li>                            
                        </ol>
                       
                    </aside>
                    <footer>
                        <div class="social">
                            <i class="fab fa-instagram fa-2x"></i>
                            <i class="fab fa-facebook fa-2x"></i>
                            <i class="fab fa-twitter fa-2x"></i>
                        </div>
                    </footer>
                </div>
            </body>
            
            </html>';
            echo $html;
        }

        function renderContacto(){
            $html = '<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Contacto</title>
                <link rel="stylesheet" href="./css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                <script src="js/captcha.js"></script>
                <script src="js/menu.js?1.0"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>MODOCINE</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home">INICIO</a></li>
                                    <li><a href="estrenos">ESTRENOS</a></li>
                                    <li><a href="contacto">CONTACTO</a></li>
                                </ul>
                        </nav>
                    </header>
            
                    <main class="main-contacto">
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
        
        function renderEstrenos(){
            $html='<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Estrenos y Cartelera</title>
                <link rel="stylesheet" href="css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                <script src="js/tabla.js"></script>
                <script src="js/menu.js?1.0"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>MODOCINE</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                            <ul class="menu" id="menu">
                                <li><a href="home" id="inicio">INICIO</a></li>
                                <li><a href="estrenos" id="estrenos">ESTRENOS</a></li>
                                <li><a href="contacto" id="contacto">CONTACTO</a></li>
                            </ul>
                        </nav>
                    </header>
            
                    <main class="mainEstrenos">
                        <h1>PROXIMOS ESTRENOS</h1>
                        <section class="peliculas">
                            <h2>Peliculas</h2>
                            <article>
                                <h3>La Maldicion Renace</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/sMzc0my_tlk">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/sMzc0my_tlk" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Bad Boys 3</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/HaojPx6HuyI">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/HaojPx6HuyI" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>A Quiet Place 2</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/8UJN0xbh-oM">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/8UJN0xbh-oM" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Black Widow</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/8UJN0xbh-oM">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/giJYLfWIzTk" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Mujer Maravilla 1984</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/t_3A2KAbK8g">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/t_3A2KAbK8g" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                        </section>
                        <section class="series">
                            <h2>Series</h2>
                            <article>
                                <h3>Los 100 (Temporada 6)</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/XjBEdmynbTE">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/XjBEdmynbTE" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Altered Carbon (Temporada 2)</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/1Yli_WNf1DQ">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/1Yli_WNf1DQ" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Locke & Key</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/r_I2NqjMM3g">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/r_I2NqjMM3g" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>White Lines</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/gNaNrVjnGVw">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/gNaNrVjnGVw" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                            <article>
                                <h3>Tiger King</h3>
                                <p>Ver trailer haciendo click <span><a
                                            href="https://www.youtube.com/embed/BlOBpumIu8A">AQUI</a></span></p>
                                <iframe src="https://www.youtube.com/embed/BlOBpumIu8A" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </article>
                        </section>
                    </main>
                    <aside class="asideEstrenos">
                        <h2>Cartelera</h2>
                        <p>Las siguientes películas corresponden al mes de Marzo de 2020. Se hace saber que, en virtud de la
                            normativa vigente dispuesta por el Gobierno Nacional todas las salas del país permanecerán cerradas
                            hasta nuevo aviso.</p>
                        <section>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pelicula</th>
                                        <th>Duración</th>
                                        <th>Clasificación</th>
                                        <th>Calificación (IMDB)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Grandes Espías</td>
                                        <td>99 Min</td>
                                        <td>Apta Todo Público</td>
                                        <td>5.2</td>
                                    </tr>
                                    <tr>
                                        <td>Bloodshot</td>
                                        <td>109 Min</td>
                                        <td>Mayores de 16 años</td>
                                        <td>5.6</td>
                                    </tr>
                                    <tr>
                                        <td>El Precio de la Verdad</td>
                                        <td>127 Min</td>
                                        <td>Mayores de 13 años</td>
                                        <td>7.6</td>
                                    </tr>
                                    <tr>
                                        <td>Ni Heroe, ni Traidor</td>
                                        <td>74 Min</td>
                                        <td>Mayores de 13 años</td>
                                        <td>5.4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
            
                        <section class="tablaDinamica">
                            <h2>Boleteria Online</h2>
                            <p>Adquirí tus entradas</p>
                            <p><span>Con la compra de 3 o más entradas obtenes un 20% de descuento</span></p>
            
                            <label for="filtro">Filtrar por salas</label>
                            <input type="text" name="filtro" id="filtro">
                            <p id="mensaje" class="filtro-oculto">No se encontraron coincidencias</p>
                            <button id="buscar">Filtrar</button>
                            <button id="reset">Restablecer</button>
                            <table id="boleteria">
                                <thead>
                                    <tr>
                                        <th>Pelicula</th>
                                        <th>Cantidad</th>
                                        <th>Complejo</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                        <th>Editar/Borrar</th>
                                    </tr>
                                </thead>
                            </table>
                            <table id="tabla_total">
                                <thead>
                                    <tr>
                                        <th>Total</th>
                                        <th id="total">0</th>
                                    </tr>
                                </thead>
                            </table>
                            <div id="use-ajax"></div>
                            <form action="">
                                <label for="pelicula">Pelicula</label>
                                <input type="text" id="pelicula">
                                <label for="asientos">Asientos</label>
                                <input type="number" min="1" max="10" id="asientos">
                                <label for="complejo">Complejo</label>
                                <input type="text" id="complejo">
                                <label for="complejo">Valor</label>
                                <input type="text" id="valor">
                                <input type="text" hidden id="id">
                                <input type="text" hidden id="operacion">
            
                            </form>
                            <div class="submit">
                                <button id="btn-agregar">Agregar</button>
                                <button id="btn-random">Agregar Varios</button>
                            </div>
            
                        </section>
                    </aside>
                    <footer>
                        <div class="social">
                            <i class="fab fa-instagram fa-2x"></i>
                            <i class="fab fa-facebook fa-2x"></i>
                            <i class="fab fa-twitter fa-2x"></i>
                        </div>
                    </footer>
                </div>
            </body>
            
            </html>';
            echo $html;
        }

        function renderMoviesByGenre($movies){
            foreach ($movies as $movie) {
                echo "<li>$movie->nombre</li>";
            }
        }

        function renderMoviesByRoom($movies){
            foreach ($movies as $movie) {
                echo "<li>$movie->nombre</li>";
            }
        }

        function renderRooms($rooms){
            foreach ($rooms as $room) {
                echo "<li>$room->numero</li>";
            }
        }
    }

?>