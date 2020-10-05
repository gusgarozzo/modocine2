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
        <h3>Agregar peliculas</h3>
        <form action="insertMovie" method="POST" class="formulario">
            <label for="input_nombre">Titulo</label>
            <input type="text" placeholder="Ej: Spider-Man" name="input_nombre" required>
            <label for="input_nombre">Genero</label>
            <input type="text" placeholder="Ej: Terror" name="input_genero" required>
            <label for="input_nombre">Puntaje:</label>
            <input step="any" type="number" placeholder="Ej: 5.8" name="input_puntaje" required>
            <label for="input_id_sala">Sala:</label>
            <select name="input_id_sala" id="">
            {foreach from=$rooms item=allRooms}
                <option class="option" value="{$allRooms->id}">{$allRooms->letra}</option>
            {/foreach}
            </select>
            <h3>Ingrese la sinopsis de la película</h3>
            <textarea name="input_sinopsis" cols="50" rows="5" required></textarea>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
     <div class="alta-baja-update">
        <h3>Agregar salas</h3>
        <form action="insertRoom" method="POST" class="formulario">
            <label for="input_nombre">Sala:</label>
            <input type="text" placeholder="Ej: C" name="input_letra" required>
            <label for="input_nombre">Capacidad:</label>
            <input type="text" placeholder="Ej: 100 personas" name="input_capacidad" required>
            <label for="input_nombre">Formato:</label>
            <input type="text" placeholder="Ej: 3D" name="input_formato" required>
            <button name="insert" type="submit">Agregar</button>
        </form>
    </div>
    <div class="links">
        <a href="admin">Volver</a>
    </div>
</main>
{include file="footer.tpl"}