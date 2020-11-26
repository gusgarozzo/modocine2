
<main class="main-admin">
    <div class="peliculas">
        <h1>Administra la Base de Datos</h1>
        <h3>Base de Datos: Pelicula</h3>
        <table class="admin-table admin-sala">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Sala</th>
                        <th>Pelicula</th>
                        <th>Genero</th>
                        <th>Sinopsis</th>
                        <th>Puntaje IMDB</th>
                        <th>Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$movies item=movie}
                    <tr id="tabla">
                        <td>{$movie->id}</td>
                        <td>{$movie->id_sala}</td>
                        <td>{$movie->nombre}</td>
                        <td>{$movie->genero}</td>
                        <td>{$movie->sinopsis}</td>
                        <td>{$movie->puntaje_imdb}</td>
                        <td>Aca iria la img</td>
                        <td>
                           <div>
                                <a class="edit" href='editMovie/{$movie->id}'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteMovie/{$movie->id}'> Delete</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            <p> 
                {foreach from=$img item=image}
                    {$image->imagen}
                {/foreach}
            </p>
    </div>
    <div class="sala">
        <h3>Base de Datos: Sala</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sala</th>
                    <th>Capacidad</th>
                    <th>Formato de Proyección</th>
                    <th>Tipo de Sala</th>
                    <th>Características</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$rooms item=room}
                    <tr>
                        <td>{$room->id}</td>
                        <td>{$room->letra}</td>
                        <td>{$room->capacidad} personas</td>
                        <td>{$room->formato}</td>
                        <td>{$room->butaca}</td>
                        <td>{$room->info_butaca}</td>
                        <td>
                            <div>
                                <a class="edit" href='editRoom/{$room->id}'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteRoom/{$room->id}'> Delete</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}  
            </tbody>
        </table>
    </div>
    <div class="users">
        <h3>Base de Datos: Usuarios</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Admin (1 = SI / 0 = NO)</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                    <tr>
                        <td>{$user->email}</td>
                        <td>{$user->admin}</td>
                        <td>
                            <div>
                                <a class="edit" href='editUser/{$user->id}'>Edit</a>
                            </div>
                            <div>
                                <a class="delete" href='deleteUser/{$user->id}'>Delete</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}  
            </tbody>
        </table>
    </div>
    <div class="links">
        <a href="adminInsert">Agregar registro a la base de datos</a>
    </div>
</main>
{include file="footer.tpl"}