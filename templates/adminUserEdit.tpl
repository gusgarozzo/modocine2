{include file="nav-admin.tpl"}   
<main class="main-admin">  
    <div class="alta-baja-update">
        <h3>Editar permisos - Tabla "Usuario"</h3>
        {foreach from=$user item=u}
            <form action="editarUsuario/{$u->id}" method="POST" class="formulario"> 
                <label for="input_isAdmin">{$u->email} es admin:</label>
                <input type="text" name="input_isAdmin" value='{$u->admin}'>
                <p>0: No<p>
                <p>1: Si<p>
                <button name="editarUsuario" type="submit">Actualizar</button>
            </form>
        {/foreach}
    </div>
    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
