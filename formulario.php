<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_formulario.css">
    <title>Document</title>
</head>
<body>
    <header>
    <a href="index.php"><img src="./imagenes/netflix.png" alt="" srcset=""></a>
        <ul class="menu">
            <a href="index.php"><li>Inicio</li></a>
            <a href=""><li>Peliculas</li></a>
            <a href=""><li>Series</li></a>
            <a href="formulario.php"><li>Ingresar</li></a>
        </ul>
        <div class="buscador">
            <form action="/buscar" method="GET">
                <input type="text" name="query" placeholder="Busca tu película o serie favorita">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>
    <main>
    INGRESA TU PELICULA O SERIE
        <form action="ingresar.php" method="POST" enctype="multipart/form-data">
        Pelicula <input type="text" name="pelicula"><br>
        Resumen <br><textarea name="resumen" id="" cols="30" rows="10" placeholder="ingresa el resumen"></textarea><br>
        Portada <input type="file" name="portada" accept="image/*"><br>

        Tipo <select name="tipo">

        <option value="accion">Película</option>

        <option value="serie">Serie</option>

        </select> <br>

        Clasificación <select name="clasificación">

        <option value="accion">Accion</option>

        <option value="romantica">Romántica</option>

        <option value="drama">Drama</option>

        </select> <br>
        Codigo de alumno <input type="text" name="codigo"><br>

        <input type="submit" value="Ingresar datos">
        </form>

    </main>
    
</body>
</html>

