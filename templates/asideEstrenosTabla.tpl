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
                        <td><a class="movie" href='detalle/{$movie->id}'>{$movie->nombre}</a></td>
                        <td>{$movie->genero}</td>
                        <td>{$movie->letra}</td>
                    </tr>
                {/foreach}  
            </tbody>
        </table>
    </section>
    {include file="buscador.tpl"}
    {include file="filtro.tpl"}
</aside>