{include file="header.tpl"}
<main class="main-contacto login">
                        <h1>Bienvenido</h1>
                        <p>Por favor ingrese su usuario y contraseña</p>
                        <form action="verifyUser" method="POST" class="formulario" name="adminlogin">
                            <p>Email:</p>
                            <input type="email" name="user" placeholder="hola@hola.com.ar">
                            <p>Contraseña:</p>
                            <input type="password" name="password">
                            <input type="submit" class="boton" value="Ingresar">
                            <div class="error" role="alert">
                                {$mensaje}
                            </div>
                        </form>
                        
                    </main>
                </div>
{include file="footer.tpl"}