<aside class="asideEstrenos">
    <h2>Cartelera</h2>            
    <section class="tablaDinamica">
        <table class="tabla-peliculas">
            <thead>
                <tr>
                    <th>Pelicula</th>
                    <th>Genero</th>
                    <th>Sala</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$movies item=movie}
                <tr>
                    <td><a class="movie" href='Detalle?id={$movie->id}'>{$movie->nombre}</a></td>
                    <td>{$movie->genero}</td>
                    <td>{$movie->letra}</td>
                    <!--<td><a href='Borrar?nombre={$movie->nombre}'>Borrar</a></td> AGREGAR CUANDO ESTE
                    LO DE ADMINISTRADOR--> 
                </tr>
            {/foreach}  
            </tbody>
        </table>
        <h2>Cartelera de Cine</h2>
    <h2 class="asideTitle">Filtrar peliculas por genero</h2>
    <ol>
        <li><a href="Genero?genre=Accion">Acción</a></li>
        <li><a href="Genero?genre=Suspenso">Suspenso</a></li>
        <li><a href="Genero?genre=Aventura">Aventura</a></li>
        <li><a href="Genero?genre=Drama">Drama</a></li>
        <li><a href="Genero?genre=Terror">Terror</a></li>
        <li><a href="cartelera">Todas</a></li>
    </ol>
    <h2 class="asideTitle">Filtrar peliculas por sala</h2>
    <ol>
        <li><a href="Salas?room=1">Sala A</a></li>
        <li><a href="Salas?room=2">Sala B</a></li>
        <li><a href="Salas?room=3">Sala C</a></li>
        <li><a href="VerSalas">Ver todas las salas</a></li>                            
    </ol>   
    </section>   
</aside>