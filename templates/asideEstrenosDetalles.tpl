{include file="header.tpl"}

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
                                <li>Puntaje IMDB: {$mov->puntaje_imdb}/10</li>
                            </ul>
                    </ul>
            {/if}
        {/foreach}
        {include file="filtro.tpl"}
        <form class="formulario" action='api/comentar/{$pelicula}' method="POST">
            <h2>Danos tu opinión sobre {$mov->nombre}</h2>
            <label for="select">Puntaje</label>
            <select name="select" required>
                <option value="1">1</option> 
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comentario">Comentario</label>
            <textarea name="comentario" id="coment" cols="60" rows="10"></textarea>
            <input type="submit" value="Publicar">
        </form>
    </section>
</aside>  

{include file="footer.tpl"}