<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-03 19:13:12
  from 'C:\xampp\htdocs\web2\tpeweb2\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f78b1288143f2_60234031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6b2c1e47b56b908a3914a84857ad4e9d943503a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\templates\\admin.tpl',
      1 => 1601744603,
      2 => 'file',
    ),
    'a7c1ff929d31c2f741a03461ddd7961191312409' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\templates\\header.tpl',
      1 => 1601744920,
      2 => 'file',
    ),
    '26fd5b78b5e3ca2b69ae3bede7e77d4ad9803e08' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\templates\\footer.tpl',
      1 => 1601730985,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_5f78b1288143f2_60234031 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>MODOCINE - ADMINISTRADOR</title>
                <!--<link rel="stylesheet" href="css/styles.css?1.0">-->
                <link rel="stylesheet" href="./css/styles.css">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/menu.js"></script>
                <base href="'.BASE_URL.'">

            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>MODOCINE - ADMINISTRADOR</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home">HOME</a></li>
                                    <li><a href="cartelera">CARTELERA</a></li>
                                    <li><a href="contacto">CONTACTO</a></li>
                                    <li><a href="login">LOGIN</a></li>
                                </ul>
                        </nav>
                    </header>           
<main class="main-admin">
    <div class="peliculas">
        <h1>Administra la Base de Datos</h1>
        <h3>Base de Datos: Pelicula</h3>
        <table class="admin-table admin-sala">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Sala</th>
                        <th>Pelicula</th>
                        <th>Genero</th>
                        <th>Sinopsis</th>
                        <th>Puntaje IMDB</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                                    <tr id="tabla">
                        <td>1</td>
                         <td>1</td>
                        <td>La Monja</td>
                        <td>Terror</td>
                        <td>Una monja se suicida en una abadía rumana y el Vaticano envía a un sacerdote y una novicia a investigar lo sucedido. Lo que ambos encuentran allá es un secreto perverso que los enfrentará cara a cara con el mal en su esencia más pura.</td>
                        <td>5.3</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/1'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/1'> Delete</a>
                            </div>
                        </td>
                    </tr>
                                    <tr id="tabla">
                        <td>2</td>
                         <td>2</td>
                        <td>Tenet</td>
                        <td>Suspenso</td>
                        <td>Una acción épica que gira en torno al espionaje internacional, los viajes en el tiempo y la evolución, en la que un agente secreto debe prevenir la Tercera Guerra Mundial.</td>
                        <td>7.8</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/2'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/2'> Delete</a>
                            </div>
                        </td>
                    </tr>
                                    <tr id="tabla">
                        <td>4</td>
                         <td>1</td>
                        <td>Ford vs Ferrari</td>
                        <td>Drama</td>
                        <td>El visionario automovilístico Carroll Shelby y su conductor británico Ken Miles reciben la misión de construir un nuevo automóvil con el fin de derrocar el dominio de Ferrari en el Campeonato del Mundo de Le Mans de 1966.</td>
                        <td>8.1</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/4'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/4'> Delete</a>
                            </div>
                        </td>
                    </tr>
                                    <tr id="tabla">
                        <td>5</td>
                         <td>2</td>
                        <td>John Wick: Chapter 3 – Parabellum</td>
                        <td>Accion</td>
                        <td>John Wick se da a la fuga, pero el trabajo se le dificulta ya que es el objetivo de todos los asesinos a sueldo del mundo luego de que saliera una recompensa de 14 millones de dólares por su cabeza.</td>
                        <td>7.5</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/5'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/5'> Delete</a>
                            </div>
                        </td>
                    </tr>
                                    <tr id="tabla">
                        <td>6</td>
                         <td>3</td>
                        <td>Joker</td>
                        <td>Drama</td>
                        <td>'Arthur Fleck adora hacer reír a la gente, pero su carrera como comediante es un fracaso. El repudio social, la marginación y una serie de trágicos acontecimientos lo conducen por el sendero de la locura y, finalmente, cae en el mundo del crimen.'</td>
                        <td>9</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/6'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/6'> Delete</a>
                            </div>
                        </td>
                    </tr>
                                </tbody>
            </table>
    </div>
    <div class="sala">
        <h3>Base de Datos: Sala</h3>
        <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sala</th>
                        <th>Capacidad</th>
                        <th>Formato de Proyección</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                                    <tr>
                        <td>1</td>
                        <td>A</td>
                        <td>120 personas</td>
                        <td>2D</td>
                        <td>
                            <div>
                                <a class="edit" href='editRoom/1'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteRoom/1'> Delete</a>
                            </div>
                        </td>

                    </tr>
                                    <tr>
                        <td>2</td>
                        <td>B</td>
                        <td>100 personas</td>
                        <td>3D</td>
                        <td>
                            <div>
                                <a class="edit" href='editRoom/2'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteRoom/2'> Delete</a>
                            </div>
                        </td>

                    </tr>
                                    <tr>
                        <td>3</td>
                        <td>C</td>
                        <td>150 personas</td>
                        <td>2D</td>
                        <td>
                            <div>
                                <a class="edit" href='editRoom/3'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteRoom/3'> Delete</a>
                            </div>
                        </td>

                    </tr>
                  
                </tbody>
            </table>
        </div>
    <div class="links">
    <a href="adminInsert">Agregar registro a la base de datos</a>
    </div>
</main>
    <footer>
        <div class="social">
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-facebook fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
        </div>
    </footer>
</div>
</body>

</html><?php }
}
