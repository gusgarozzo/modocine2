{include file="nav-admin.tpl"}   
<main class="main-admin"> 
<h3>Editar Imagen de Película</h3> 
<div class="imagebox">
<div class="dbImage">
{foreach from=$image item=img}
<p>Imagen Actual</p>  
<img class="dbimage" src='data:{$img->tipo};base64, {base64_encode({$img->imagen})}'>
</div>
    <div class="editPhoto">
        <form action="updatePhoto" method="POST" class="editPhotoForm" enctype="multipart/form-data">
            <div>
            <label for="imagen">Seleccionar nueva imagen</label>
            <input type="file" name="imagen" required>
            </div>
            <input type="hidden" name='id_pelicula' value='{$img->id_pelicula}' required>
            <button name="guardar" type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>
{/foreach}

    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
