<<<<<<< HEAD
{include file="header.tpl"}

=======
{include file="nav.tpl"}
>>>>>>> c177ac685a3e6de7f42e6bcda262548d3d05d7a2
    <main class="main-contacto login signup">
    <div class="saludo">
    <a href="logout">LOGOUT</a>
    </div>
        <h1>Bienvenido</h1>
        <p>Por favor ingrese su usuario y contraseña</p>
        <form action="verifyUser" method="POST" class="formulario" name="adminlogin">
            <label for="user">Email:</label>
            <input type="email" name="user" placeholder="hola@hola.com.ar">
            <label for="password">Contraseña:</label>
            <input type="password" name="password">
            <input type="submit" class="boton" value="Ingresar">
            <span class="span-registro">No tenés cuenta? <a class="link-registro" href="registrar"> Registrate</a></span>
            <div class="error" role="alert">
                {$mensaje}
            </div>
        </form>      
    </main>
{include file="footer.tpl"}