{include file="header.tpl"}
    <main class="main-contacto login signup">
        <h1>Bienvenido</h1>
        <p>Por favor ingrese su usuario y contraseña</p>
        <form action="verifyUser" method="POST" class="formulario" name="adminlogin">
            <label for="user">Email:</label>
            <input type="email" name="user" placeholder="hola@hola.com.ar">
            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <span class="span-registro">No tenés cuenta? <a class="link-registro" href="registrar"> Registrate</a></span>
            <input type="submit" class="boton" value="Ingresar">
            <div class="error" role="alert">
                {$mensaje}
            </div>
        </form>      
    </main>
{include file="footer.tpl"}