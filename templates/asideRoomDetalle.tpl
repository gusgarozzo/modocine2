
{include file="estrenos.tpl"}
<aside class="asideEstrenos">
    <h2>Cartelera</h2>            
    <section class="tablaDinamica">
        <table class="tabla-peliculas">
            <thead>
                <tr>
                    <th>Sala</th>
                    <th>Capacidad</th>
                    <th>Formato de proyeccion</th>
                    <th>Butacas</th>
                    <th>Información</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$rooms item=room}
                <tr>
                    <td><a class="room" href='detallesala/{$room->id}'>{$room->letra}</a></td>
                    <td>{$room->capacidad}</td>
                    <td>{$room->formato}</td>
                    <td>{$room->butaca}</td>
                    <td>{$room->info_butaca}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
        {include file="footer.tpl"}
    </section>
    {include file="filtro.tpl"}
</aside>
