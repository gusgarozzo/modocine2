{include file="header-admin.tpl"}          
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Agregar peliculas</h3>
        <form action="insertMovie" method="POST" class="formulario">
            <label for="input_nombre">Titulo</label>
            <input type="text" placeholder="Ej: Spider-Man" name="input_nombre" required>
            <label for="input_genero">Genero</label>
            <input type="text" placeholder="Ej: Terror" name="input_genero" required>
            <label for="input_puntaje">Puntaje:</label>
            <input step="any" type="number" placeholder="Ej: 5.8" name="input_puntaje" required>
            <label for="input_id_sala">Sala:</label>
            <select name="input_id_sala" id="">
            {foreach from=$rooms item=allRooms}
                <option class="option" value="{$allRooms->id}">{$allRooms->letra}</option>
            {/foreach}
            </select>
            <h3>Ingrese la sinopsis de la película</h3>
            <textarea name="input_sinopsis" cols="50" rows="5" required></textarea>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
     <div class="alta-baja-update">
        <h3>Agregar salas</h3>
        <form action="insertRoom" method="POST" class="formulario">
            <label for="input_nombre">Sala:</label>
            <input type="text" placeholder="Ej: C" name="input_letra" required>
            <label for="input_capacidad">Capacidad:</label>
            <input type="text" placeholder="Ej: 100 personas" name="input_capacidad" required>
            <label for="input_formato">Formato:</label>
            <input type="text" placeholder="Ej: 3D" name="input_formato" required>
            <label for="input_tipo">Tipo de Sala:</label>
            <input type="text" placeholder="Ej: D-Box, Comfort, etc..." name="input_tipo" required>
            <label for="input_info">Características:</label>
            <input type="text" name="input_info" required>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}