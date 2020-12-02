
<aside class="asideEstrenos">
    <h2>Detalles de la película</h2>            
    <section class="tablaDinamica">
        {foreach from=$movies item=mov}
            {if $mov->puntaje_imdb!=null}
                <ul class='lista-detalles'>
                    <li>
                        <h3>{$mov->nombre}</h3>
                    </li>
                    <div class="box-detalles">
                        {foreach from=$image item=img}
                            {if $mov->id == $img->id_pelicula}
                                <div class="imgbox">
                                    <img class="dbimage" src='data:{$img->tipo};base64, {base64_encode({$img->imagen})}'>
                                </div>
                            {/if}
                        {/foreach}
                                <ul class='datos-detalles'>
                                    <li>{$mov->sinopsis}</li>
                                    <li>Genero: {$mov->genero}</li>
                                    <li>Puntaje IMDB: {$mov->puntaje_imdb}/10</li>
                                </ul>
                    </div>
                    </ul>
            {/if}
        {/foreach}
        {include file="filtro.tpl"}
        
        {if isset($smarty.session.usuario)}
            {include file="commentForm.tpl"}
        {/if}
        
    </section>
</aside>  
{include file="footer.tpl"}