<aside class="asideEstrenos">
    <h2>Detalles de la película</h2>            
    <section class="tablaDinamica">
        {foreach from=$movies item=mov}
            {if $mov->puntaje_imdb!=null}
                <ul class='lista-detalles'>
                        <li>
                            <h3>{$mov->nombre}</h3>
                        </li>
                            <ul class='datos-detalles'>
                                <li>{$mov->sinopsis}</li>
                                <li>Genero: {$mov->genero}</li>
                                <li>Puntaje: {$mov->puntaje_imdb}</li>
                            </ul>
                    </ul>
            {/if}
        {/foreach}
    <h2 class="asideTitle">Buscar pelicula por genero</h2>
    <ol>
        <li><a href="Genero?genre=Accion">Acción</a></li>
        <li><a href="Genero?genre=Suspenso">Suspenso</a></li>
        <li><a href="Genero?genre=Aventura">Aventura</a></li>
        <li><a href="Genero?genre=Drama">Drama</a></li>
        <li><a href="Genero?genre=Terror">Terror</a></li>
    </ol>
    <h2 class="asideTitle">Buscar pelicula por sala</h2>
    <ol>
        <li><a href="Salas?room=1">Sala A</a></li>
        <li><a href="Salas?room=2">Sala B</a></li>
        <li><a href="Salas?room=3">Sala C</a></li>
        <li><a href="VerSalas">Ver todas las salas</a></li>                            
    </ol>
    </section>   
     
     <a href="estrenos" class="volver">Volver</a>
</aside>