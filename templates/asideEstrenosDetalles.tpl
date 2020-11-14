{include file="header.tpl"}
{include file="estrenos.tpl"}
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
    <form class="formulario" action="api/comentar" method="post">
        <h2>Danos tu opinión sobre {$pelicula}</h2>
        <label for="puntaje">Puntaje:</label>
        <input type="text" name="puntaje">
        <p>Comentario</p>
        <textarea name="comentario" id="coment" cols="60" rows="10"></textarea>
        <input type="submit" value="Publicar">
    </form>
    </section>
    
</aside>  

{include file="footer.tpl"}