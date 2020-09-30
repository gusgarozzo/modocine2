<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{$titulo|upper}</title>
                <!--<link rel="stylesheet" href="css/styles.css?1.0">-->
                <link rel="stylesheet" href="css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/menu.js"></script>
                <script src="js/captcha.js"></script>
                <base href="' . BASE_URL . '">
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>{$titulo|upper}</p>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                                <ul class="menu" id="menu">
                                    <li><a href="home">HOME</a></li>
                                    <li><a href="cartelera">CARTELERA</a></li>
                                    <li><a href="contacto">CONTACTO</a></li>
                                    <li><a href="login">LOGIN</a></li>
                                </ul>
                        </nav>
                    </header>
<main class="main-contacto">
                        <h1>Dudas y sugerencias</h1>
                        <p>Completá el formulario con tus datos y dejanos tus dudas y sugerencias.</p>
                        <form action="" class="formulario">
                            <p>Nombre:</p>
                            <input type="text" id="nombre" placeholder="Nombre">
                            <p>Apellido:</p>
                            <input type="text" id="apellido" placeholder="Apellido">
                            <p>Correo Electrónico:</p>
                            <input type="email" id="mail" placeholder="hola@hola.com.ar">
            
                            <p class="titulo-genero">Género</p>
                            <div class="genero">
                                <div class="masculino">
                                    <p>Masculino</p>
                                    <input type="radio" name="genero" value="Masculino">
                                </div>
                                <div class="femenino">
                                    <p>Femenino</p>
                                    <input type="radio" name="genero" value="Femenino">
                                </div>
                                <div class="otro">
                                    <p>Otro</p>
                                    <input type="radio" name="genero" value="Otro">
                                </div>
                            </div>
                            <label for="genero-otro">Cual?</label>
                            <input type="text" id="genero-otro">
            
                            <p class="titulo-textarea">Mensaje</p>
                            <textarea name="Deja aqui tu mensaje" cols="50" rows="5" class="textarea"></textarea>
                            
                            <h2 class="titulo-captcha">CAPTCHA</h2>
                            <div class="captcha">
                                <input type="text" id="captcha" readonly class="captcha">
                                <input type="text" id="validar" class="captcha">
                                <p id="mensaje"></p>
                            </div>
                            <input type="submit" id="boton" class="boton">
                        </form>
                    </main>
                </div>
{include file="footer.tpl"}