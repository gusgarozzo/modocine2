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
                <script src="js/menu.js"></script>
            </head>
            
            <body>
                <div class="contenedor">
                    <header>
                        <p>{$titulo|upper}</p>
                        <nav class="adminMenu">
                            <i class="fas fa-bars" id="btn-abrir"></i>
                            <p class="saludo">Bienvenido Administrador!</p>
                                <ul class="menu" id="menu">
                                    <li><a href="logout">LOGOUT</a></li>
                                </ul>
                        </nav>
                    
                    
                    </header>   
<main class="main-admin">   
    <div class="alta-baja-update">
        <h3>Editar registro - Tabla "Sala"</h3>
        {foreach from=$room item=sala}
            <form action='editarSala/{$sala->id}' method="POST" class="formulario">
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
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}