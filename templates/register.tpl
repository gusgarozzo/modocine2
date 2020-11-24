{include file="nav.tpl"}
    <main class="main-contacto login">
        <h1>Registro de usuario</h1>
        <p>Los campos con (*) son obligatorios</p>
        <form action="registerUser" method="POST" class="formulario">
            <label for="nick">Nick (*)</label>
            <input type="text" name="nick" placeholder="cinefilo123">
            <label for="input_user">Email (*)</label>
            <input type="email" name="input_user" placeholder="mail@mail.com.ar">
            <label for="user">Repetir Email (*)</label>
            <input type="email" name="input_ruser" placeholder="mail@mail.com.ar">
            <label for="password">Contraseña (*)</label>
            <input type="password" name="input_password">
            <label for="password">Repetir Contraseña (*)</label>
            <input type="password" name="input_rpassword">
            <div> 
                {$mensaje}
            </div>
            <input type="submit" class="boton" value="Registrarme">
        </form>      
    </main>
{include file="footer.tpl"}