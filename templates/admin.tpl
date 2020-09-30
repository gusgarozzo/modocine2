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
                            <a class="edit" href='adminMovie?editMovie={$movie->id}'>Edit |</a>
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
                            <a class="edit" href='adminSala?editRoom={$room->id}'>Edit |</a>
                            <a class="delete" href='borrarSala?delete={$room->id}'> Delete</a>
                        </td>

                    </tr>
                {/foreach}  
                </tbody>
            </table>
        </div>
    <div class="links">
    <a href="adminInsertMovie">Agregar registro a la base de datos</a>
    </div>
</main>
{include file="footer.tpl"}