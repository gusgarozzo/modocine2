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
    </section>
</aside>  
{include file="footer.tpl"}