{include file="header.tpl"} 
<main class="main-admin">  
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Pelicula"</h3>
        {foreach from=$movie item=singleMovie}
                <form action="editarPelicula?id={$singleMovie->id}" method="POST" class="formulario">
                <label for="id">ID:</label>
                <input type="text" name="id" value='{$singleMovie->id}'>
                <label for="input_nombre">Nombre:</label>
                <input type="text" name="input_nombre" value='{$singleMovie->nombre}'>
                <label for="input_nombre">Genero:</label>
                <input type="text" name="input_genero" value='{$singleMovie->genero}'>
                <label for="input_nombre">Puntaje:</label>
                <input step="any" type="number" name="input_puntaje" value='{$singleMovie->puntaje_imdb}'>
                <label for="input_nombre">Sala:</label>
                <input type="number" name="input_id_sala" value='{$singleMovie->id_sala}'>
                <h3>Ingrese la sinopsis de la película</h3>
                <textarea name="input_sinopsis" cols="50" rows="5">'{$singleMovie->sinopsis}'</textarea>
                <button name="editarPelicula" type="submit">Actualizar</button>
            </form>
        {/foreach}
    </div>
    <div class="links">
        <a href="login">Volver</a>
    </div>
</main>
{include file="footer.tpl"}