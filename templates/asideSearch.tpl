{include file="header.tpl"}
{include file="estrenos.tpl"}
<aside class="asideEstrenos">
    <h2>Resultados de la búsqueda</h2>            
    <section class="tablaDinamica">
        {foreach from=$results item=result}
                <ul class='lista-detalles'>
                        <li>
                            <h3>{$result->nombre}</h3>
                        </li>
                            <ul class='datos-detalles'>
                                <li>{$result->sinopsis}</li>
                                <li>Genero: {$result->genero}</li>
                                <li>Puntaje IMDB: {$result->puntaje_imdb}/10</li>
                                <li>Sinopsis: {$result->sinopsis}</li>

                                <h3> Donde se proyecta? </h3>
                                <li>Sala: {$result->letra}</li>
                                <li>Capacidad: {$result->capacidad}</li>
                                <li>Tipo de sala: {$result->butaca}</li>
                                <li>Detalle: {$result->info_butaca}</li>
                                <li>Formato: {$result->formato}</li>
                            </ul>
                    </ul>
        {/foreach}
        {include file="buscador.tpl"}
        {include file="filtro.tpl"}
    </section>
</aside>  

{include file="footer.tpl"}