{include file="header.tpl"}
<main class="main-admin">
    <div>
        <h1>Administra la Base de Datos</h1>
        <h2>Base de Datos: Pelicula</h2>
        <table class="tabla-peliculas">
                <thead>
                    <tr>
                        <th>Pelicula</th>
                        <th>Genero</th>
                        <th>Sinopsis</th>
                        <th>Puntaje IMDB</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$movies item=movie}
                    <tr>
                        <td>{$movie->nombre}</td>
                        <td>{$movie->genero}</td>
                        <td>{$movie->sinopsis}</td>
                        <td>{$movie->puntaje_imdb}</td>
                        <td>
                            <a class="edit" href='editar?edit={$movie->id}'>Edit |</a>
                            <a class="delete" href='borrar?delete={$movie->id}'> Delete</a>
                        </td>
                    </tr>
                {/foreach}
                  </tbody>
            </table>
    </div>
    <div>
        <h2>Agregar peliculas</h2>
        <form action="insert" method="POST" class="formulario">
            <input type="text" placeholder="Titulo" name="input_nombre">
            <input type="text" placeholder="Genero" name="input_genero">
            <input type="number" placeholder="Puntaje" name="input_puntaje">
            <input type="number" placeholder="Sala" name="input_id_sala">
            <h3>Ingrese la sinopsis de la película</h3>
            <textarea name="input_sinopsis" cols="50" rows="5"></textarea>
            <button class="agregar-pelicula" type="submit">Agregar</button>
        </form>
    </div>
    <h2>Base de Datos: Sala</h2>
    <table class="tabla-peliculas">
                <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Capacidad</th>
                        <th>Formato de Proyección</th>
                    </tr>
                </thead>
                <tbody>
                {foreach from=$rooms item=room}
                    <tr>
                        <td>{$room->letra}</td>
                        <td>{$room->capacidad}</td>
                        <td>{$room->formato}</td>
                        <!--<td><a href='Borrar?nombre={$room->letra}'>Borrar</a></td> AGREGAR CUANDO ESTE
                        LO DE ADMINISTRADOR--> 
                    </tr>
                {/foreach}  
                </tbody>
            </table>

{include file="footer.tpl"}