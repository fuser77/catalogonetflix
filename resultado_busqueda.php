<?php
$conexion = new mysqli("localhost", "root", "", "tecno");

if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->query("SET NAMES utf8");
$conexion->query("SET CHARACTER SET utf8");

// Captura el término de búsqueda
$termino = isset($_GET["termino"]) ? $_GET["termino"] : "";

// Construye la consulta SQL para buscar por "pelicula" y "resumen"
if (!empty($termino)) {
    $sql = "SELECT * FROM netflix WHERE pelicula LIKE '%$termino%' OR resumen LIKE '%$termino%'";
} else {
    $sql = "SELECT * FROM netflix";
}

$query = mysqli_query($conexion, $sql);

echo '<style>
    body {
        background-color: black;
        color: white;
    }
    table {
        width: 100%;
        border: 1px solid white;
        text-align:center;
    }
    table tr {
        background-color: black;
    }
    table td {
        padding: 5px;
    }
    * {
        margin: 0;
        padding: 0;
    
    }
    body {
        background-color: black;
    }
    header {
        display: flex; 
    }
    .menu {
        color: white;
        display: flex;
        flex-direction: row;
    
    }
     ul  {
        list-style: none;
        padding-left: 50px;
        text-align: center;
        align-items: center;
    }
    li {
        padding: 15px;
    }
    .menu a {
        text-decoration: none;
        color: white;
        font-size: 18px;
    }
    .buscador  {
        display: flex;
        align-items: center;
    }
    .buscador input {
        width: 350px;
        text-align: center;
        padding: 5px;
        margin-left: 330px;
    }
    .buscador button  {
        margin: 10px;
        padding: 5px;
    }
    h1 {
    margin:30px;
    }
</style>';
echo '<header>
<a href="index.php"><img src="./imagenes/netflix.png" alt="" srcset=""></a>
 <ul class="menu">
     <a href="index.php"><li>Inicio</li></a>
     <a href=""><li>Peliculas</li></a>
     <a href=""><li>Series</li></a>
     <a href="formulario.php"><li>Ingresar</li></a>
     <a href="mostrar_resultados.php"><li>Editar</li></a>

 </ul>
 <div class="buscador">
     <form action="resultado_busqueda.php" method="GET">
         <input type="text" name="termino" id="termino" placeholder="Busca tu película o serie favorta">
         <button type="submit">Buscar</button>
     </form>
 </div>

</header>';

echo '<h1>CATÁLOGO DE NETFLIX</h1>';
echo '<hr>';
echo '<hr>';

echo '
<table border="1">
    <tr bgcolor="black">
        <td>Pelicula</td>
        <td>Resumen</td>
        <td>Tipo</td>
        <td>Clasificación</td>
        <td>Portada</td>
    </tr>';

while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>';
    echo '<td>' . $row["pelicula"] . '</td>';
    echo '<td>' . $row["resumen"] . '</td>';
    echo '<td>' . $row["tipo"] . '</td>';
    echo '<td>' . $row["clasificación"] . '</td>';
    echo '<td>';
    if ($row["portada"]) echo '<img src="' . $row["portada"] . '" width="100">';
    echo '</td>';
    echo '</tr>';
}

$conexion->close();

echo '</table>';
?>
