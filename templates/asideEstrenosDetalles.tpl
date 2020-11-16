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
        
                  
        <form class="formulario" id="commentForm">
            <h2>Danos tu opinión sobre {$mov->nombre}</h2>
            <label for="pelicula_id">ID</label>
            <input type="text" name="pelicula_id" id='pelicula_id' value='{$mov->id}' data='{$mov->id}' readonly>
            {if (isset($smarty.session.usuario))}  
            {foreach from=usuario item=user}
                <label for="usuario_id">Usuario</label>
                <input type="text" name="usuario_id" id='usuario_id' value='{$usuario->email}' data='{$usuario->id}' readonly>
            {/foreach}
            {/if}
            <label for="puntaje">Puntaje</label>
            <input type="number" name="puntaje" min="1" max="5" id="puntaje">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" id="comment" cols="60" rows="10"></textarea>
            <input type="submit" id="btn-send">
        </form>


        
        
    </section>
</aside>  

{include file="footer.tpl"}