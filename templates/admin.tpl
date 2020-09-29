{include file="header.tpl"}           
<main class="main-admin">
    <div class="peliculas">
        <h1>Administra la Base de Datos</h1>
        <h3>Base de Datos: Pelicula</h3>
        <table class="admin-table admin-sala">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelicula</th>
                        <th>Genero</th>
                        <th>Sinopsis</th>
                        <th>Puntaje IMDB</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$movies item=movie}
                    <tr id="tabla">
                        <td>{$movie->id}</td>
                        <td>{$movie->nombre}</td>
                        <td>{$movie->genero}</td>
                        <td>{$movie->sinopsis}</td>
                        <td>{$movie->puntaje_imdb}</td>
                        <td>
                            <a class="edit" href='editarPelicula?editMovie={$movie->id}'>Edit |</a>
                            <a class="delete" href='borrarPelicula?delete={$movie->id}'> Delete</a>
                        </td>
                    </tr>
                {/foreach}
                  </tbody>
            </table>
    </div>
    <div class="sala">
        <h3>Base de Datos: Sala</h3>
        <table class="admin-table">
                <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Capacidad</th>
                        <th>Formato de Proyección</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$rooms item=room}
                    <tr>
                        <td>{$room->letra}</td>
                        <td>{$room->capacidad} personas</td>
                        <td>{$room->formato}</td>
                        <td>
                            <a class="edit" href='editarSala?edit={$room->id}'>Edit |</a>
                            <a class="delete" href='borrarSala?delete={$room->id}'> Delete</a>
                        </td>

                    </tr>
                {/foreach}  
                </tbody>
            </table>
        </div>
    <div class="alta-baja-update">
        <h3>Agregar peliculas</h3>
        <form action="insert" method="POST" class="formulario">
            <label for="input_nombre">Titulo</label>
            <input type="text" placeholder="Titulo" name="input_nombre">
            <label for="input_nombre">Genero</label>
            <input type="text" placeholder="Genero" name="input_genero">
            <label for="input_nombre">Puntaje:</label>
            <input type="number" placeholder="Puntaje" name="input_puntaje">
            <label for="input_nombre">Sala:</label>
            <input type="number" placeholder="Sala" name="input_id_sala">
            <h3>Ingrese la sinopsis de la película</h3>
            <textarea name="input_sinopsis" cols="50" rows="5"></textarea>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
 
</main>
{include file="footer.tpl"};