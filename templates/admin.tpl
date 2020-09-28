{include file="header.tpl"}
<main class="main-admin">
    <h1>Administra la Base de Datos</h1>
    <h2>Base de Datos: Pelicula</h2>
    <table class="tabla-peliculas">
            <thead>
                <tr>
                    <th>Pelicula</th>
                    <th>Genero</th>
                    <th>Sinopsis</th>
                    <th>Puntaje IMDB</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$movies item=movie}
                <tr>
                    <td>{$movie->nombre}</td>
                    <td>{$movie->genero}</td>
                    <td>{$movie->sinopsis}</td>
                    <td>{$movie->puntaje_imdb}</td>
                    <!--<td><a href='Borrar?nombre={$movie->nombre}'>Borrar</a></td> AGREGAR CUANDO ESTE
                    LO DE ADMINISTRADOR--> 
                </tr>
            {/foreach}  
            </tbody>
        </table>

        <h2>Base de Datos: Sala</h2>
<table class="tabla-peliculas">
            <thead>
                <tr>
                    <th>Sala</th>
                    <th>Capacidad</th>
                    <th>Formato de Proyección</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$rooms item=room}
                <tr>
                    <td>{$room->letra}</td>
                    <td>{$room->capacidad}</td>
                    <td>{$room->formato}</td>
                    <!--<td><a href='Borrar?nombre={$room->letra}'>Borrar</a></td> AGREGAR CUANDO ESTE
                    LO DE ADMINISTRADOR--> 
                </tr>
            {/foreach}  
            </tbody>
        </table>



                        

{include file="footer.tpl"}