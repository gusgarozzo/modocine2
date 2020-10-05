<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{$titulo|upper}</title>
                <!--<link rel="stylesheet" href="css/styles.css?1.0">-->
                <base href="{BASE_URL}">
                <link rel="stylesheet" href="./css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/menu.js"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>{$titulo|upper}</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home">HOME</a></li>
                                    <li><a href="cartelera">CARTELERA</a></li>
                                    <li><a href="contacto">CONTACTO</a></li>
                                    <li><a href="logout">LOGOUT</a></li>
                                </ul>
                        </nav>
                    
                    
                    </header>  
<main class="main-admin">  
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Pelicula"</h3>
        {foreach from=$movie item=singleMovie}
                <form action="editarPelicula/{$singleMovie->id}" method="POST" class="formulario">
                <label for="id">ID:</label>
                <input type="text" name="id" value='{$singleMovie->id}'>
                <label for="input_nombre">Nombre:</label>
                <input type="text" name="input_nombre" value='{$singleMovie->nombre}'>
                <label for="input_nombre">Genero:</label>
                <input type="text" name="input_genero" value='{$singleMovie->genero}'>
                <label for="input_nombre">Puntaje:</label>
                <input step="any" type="number" name="input_puntaje" value='{$singleMovie->puntaje_imdb}'>
                <label for="input_nombre">Sala:</label>
                <input type="number" name="input_id_sala" value='{$singleMovie->id_sala}'>
                <h3>Ingrese la sinopsis de la película</h3>
                <textarea name="input_sinopsis" cols="50" rows="5">'{$singleMovie->sinopsis}'</textarea>
                <button name="editarPelicula" type="submit">Actualizar</button>
            </form>
        {/foreach}
    </div>
    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}