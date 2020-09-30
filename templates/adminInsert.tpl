{include file="header.tpl"}           
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Agregar peliculas</h3>
        <form action="insertMovie" method="POST" class="formulario">
            <label for="input_nombre">Titulo</label>
            <input type="text" placeholder="Ej: Spider-Man" name="input_nombre">
            <label for="input_nombre">Genero</label>
            <input type="text" placeholder="Ej: Terror" name="input_genero">
            <label for="input_nombre">Puntaje:</label>
            <input type="number" placeholder="Ej: 5.8" name="input_puntaje">
            <label for="input_nombre">Sala:</label>
            <input type="number" placeholder="Ej: 4" name="input_id_sala">
            <h3>Ingrese la sinopsis de la película</h3>
            <textarea name="input_sinopsis" cols="50" rows="5"></textarea>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
     <div class="alta-baja-update">
        <h3>Agregar salas</h3>
        <form action="insertRoom" method="POST" class="formulario">
            <label for="input_nombre">Sala:</label>
            <input type="text" placeholder="Ej: C" name="input_letra">
            <label for="input_nombre">Capacidad:</label>
            <input type="text" placeholder="Ej: 100 personas" name="input_capacidad">
            <label for="input_nombre">Formato:</label>
            <input type="text" placeholder="Ej: 3D" name="input_formato">
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>

    <div class="links">
    <a href="login">Volver</a>
    </div>
</main>
{include file="footer.tpl"}