<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{$titulo|upper}</title>
                <!--<link rel="stylesheet" href="css/styles.css?1.0">-->
                <base href="{BASE_URL}">
                <link rel="stylesheet" href="./css/styles.css">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/menu.js"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>{$titulo|upper}</p>
                        <nav class="adminMenu">
                            <i class="fas fa-bars" id="btn-abrir"></i>
                            <p class="saludo">Bienvenido Administrador!</p>
                                <ul class="menu" id="menu">
                                    <li><a href="logout">LOGOUT</a></li>
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
                {foreach from=$movies item=movie}
                    <tr id="tabla">
                        <td>{$movie->id}</td>
                         <td>{$movie->id_sala}</td>
                        <td>{$movie->nombre}</td>
                        <td>{$movie->genero}</td>
                        <td>{$movie->sinopsis}</td>
                        <td>{$movie->puntaje_imdb}</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/{$movie->id}'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/{$movie->id}'> Delete</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}
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
                {foreach from=$rooms item=room}
                    <tr>
                        <td>{$room->id}</td>
                        <td>{$room->letra}</td>
                        <td>{$room->capacidad} personas</td>
                        <td>{$room->formato}</td>
                        <td>
                            <div>
                                <a class="edit" href='editRoom/{$room->id}'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteRoom/{$room->id}'> Delete</a>
                            </div>
                        </td>

                    </tr>
                {/foreach}  
                </tbody>
            </table>
        </div>
    <div class="links">
    <a href="adminInsert">Agregar registro a la base de datos</a>
    </div>
</main>
{include file="footer.tpl"}