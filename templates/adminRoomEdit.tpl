{include file="header.tpl"} 
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Sala"</h3>
        {foreach from=$room item=sala}
            <form action="editarSala?id={$sala->id}" method="POST" class="formulario">
                <label for="input_sala">Sala:</label>
                <input type="text" name="input_sala" value='{$sala->letra}'>
                <label for="input_capacidad">Capacidad:</label>
                <input type="text" name="input_capacidad" value='{$sala->capacidad}'>
                <label for="input_formato">Formato de Proyección:</label>
                <input type="text" name="input_formato" value='{$sala->formato}'>
                <button name="editarSala" type="submit">Actualizar</button>
            </form>
        {/foreach}
    </div>

    <div class="links">
        <a href="login">Volver</a>
    </div>
</main>
{include file="footer.tpl"}