<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-03 19:13:14
  from 'C:\xampp\htdocs\web2\tpeweb2\templates\adminMovieEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f78b12ad1a894_64027103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c94a3ea98406829f617ca105af908cdf7647ac66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\tpeweb2\\templates\\adminMovieEdit.tpl',
      1 => 1601738860,
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
function content_5f78b12ad1a894_64027103 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Pelicula"</h3>
                        <form action="editarPelicula?id=1" method="POST" class="formulario">
                <label for="id">ID:</label>
                <input type="text" name="id" value='1'>
                <label for="input_nombre">Nombre:</label>
                <input type="text" name="input_nombre" value='La Monja'>
                <label for="input_nombre">Genero:</label>
                <input type="text" name="input_genero" value='Terror'>
                <label for="input_nombre">Puntaje:</label>
                <input step="any" type="number" name="input_puntaje" value='5.3'>
                <label for="input_nombre">Sala:</label>
                <input type="number" name="input_id_sala" value='1'>
                <h3>Ingrese la sinopsis de la película</h3>
                <textarea name="input_sinopsis" cols="50" rows="5">'Una monja se suicida en una abadía rumana y el Vaticano envía a un sacerdote y una novicia a investigar lo sucedido. Lo que ambos encuentran allá es un secreto perverso que los enfrentará cara a cara con el mal en su esencia más pura.'</textarea>
                <button name="editarPelicula" type="submit">Actualizar</button>
            </form>
            </div>
    <div class="links">
        <a href="login">Volver</a>
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
