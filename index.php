<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
       <a href="index.php"><img src="./imagenes/netflix.png" alt="" srcset=""></a>
        <ul class="menu">
            <a href=""><li>Inicio</li></a>
            <a href=""><li>Peliculas</li></a>
            <a href=""><li>Series</li></a>
            <a href="formulario.php"><li>Ingresar</li></a>
            <a href="mostrar_resultados.php"><li>Editar</li></a>

        </ul>
        <div class="buscador">
            <form action="resultado_busqueda.php" method="GET">
                <label for="termino">Búsqueda:</label>
                <input type="text" name="termino" id="termino" placeholder="Busca tu película o serie favorta">
                <button type="submit">Buscar</button>
            </form>
        </div>

    </header>
    <main>
        <div class="portada">
            <img src="./imagenes/batman.jpg" alt="">
        </div>
        <div class="titulo">
            <img src="./imagenes/titseries.png" alt="">
        </div>
        <div class="peliculas">
            <img src="./imagenes/vientos.png" alt="">
            <img src="./imagenes/lugar.png" alt="">
            <img src="./imagenes/sense.png" alt="">
            <img src="./imagenes/mesias.png" alt="">
            <img src="./imagenes/inconcebible.png" alt="">
        </div>
    </main>
    <footer>
      <img src="./imagenes/footer.png" alt="">
    </footer>
</body>
</html>