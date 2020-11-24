<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{$titulo|upper}</title>
                <!--<link rel="stylesheet" href="css/styles.css?1.0">-->
                <base href="{BASE_URL}">
                <link rel="stylesheet" href="./css/styles.css?1.0">
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
                    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">   
                <script src="js/comentarios.js"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                    <div></div>
                        <nav>
                            <i class="fas fa-bars" id="btn-abrir"></i>
                            <ul class="menu" id="menu">
                                <li><a href="home">HOME</a></li>
                                <li><a href="cartelera">CARTELERA</a></li>
                                <li><a href="contacto">CONTACTO</a></li>
                                <!--{if $user == null}   no funca-->
                                <li><a href="login">INICIAR SESIÓN</a></li>
                                  <!--{/if}-->
                                {if $user = admin}
                                    <li><a href="admin">ADMINISTRAR</a></li>
                                {/if}
                            </ul>
                        </nav>
                          <!--{if $user != null}-->
                            <div class="saludo">
                                <a href="logout">LOGOUT</a>
                            </div> 
                        <!--{/if}-->
                    </header>
