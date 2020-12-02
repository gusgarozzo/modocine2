     <div id="commentBox">
     <input type="hidden" name="pelicula" id="peli_id" value='{$mov->id}'>
            <form class="formulario" id="commentForm" method="POST" action="comentarios">
                <h2>Danos tu opinión sobre {$mov->nombre}</h2>
                <input type="hidden" name="pelicula_id" id='pelicula_id' value='{$mov->id}' data='{$mov->id}' readonly>
                {if (isset($smarty.session.usuario))}  
                {foreach from=usuario item=user}
                    <label for="nickname">Usuario</label>
                    <input type="text" name="nickname" id='nickname' value='{$usuario->nickname}' readonly>
                    <input type="hidden" name="usuario_id" id='usuario_id' value='{$usuario->id}'>
                    <input type="hidden" id="admin" value='{$usuario->admin}'>
                    <input type="hidden" id="sesion" value={$smarty.session.usuario}>
                {/foreach}
                {/if}
                {if (!isset($smarty.session.usuario))}
                    <input type="hidden" id="admin" value='3'>
                {/if}
                <p>Puntaje</p>
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5">
                    <label class="puntaje" for="radio1">★</label>
                    <input id="radio2" type="radio" name="estrellas" value="4">
                    <label class="puntaje" for="radio2">★</label>
                    <input id="radio3" type="radio" name="estrellas" value="3">
                    <label class="puntaje" for="radio3">★</label>
                    <input id="radio4" type="radio" name="estrellas" value="2">
                    <label class="puntaje" for="radio4">★</label>
                    <input id="radio5" type="radio" name="estrellas" value="1">
                    <label class="puntaje" for="radio5">★</label>
                </p>
                <!--<input type="number" name="puntaje" min="1" max="5" id="puntaje">-->
                <label for="comentario">Comentario</label>
                <textarea name="comentario" id="comment" cols="60" rows="10"></textarea>
                <input type="submit" id="btn-send">
            </form>
        </div>