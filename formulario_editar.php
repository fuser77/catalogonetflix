<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style_form_editar.css">
</head>
<body>

<?php 
$conexion = new mysqli("localhost", "root", "", "tecno");
$conexion->query("SET NAMES utf8");
$conexion->query("SET CHARACTER SET utf8");

if (isset($_REQUEST["id"])) $id = $_REQUEST["id"];

$sql = "SELECT * FROM netflix WHERE id = '".$id."'";

$query = mysqli_query($conexion, $sql); 
while($row = mysqli_fetch_assoc($query))
{
?>
<header>
    <a href="../index.php"><img src="../imagenes/netflix.png" alt="" srcset=""></a>
    <ul class="menu">
        <a href="../index.php"><li>Inicio</li></a>
        <a href=""><li>Peliculas</li></a>
        <a href=""><li>Series</li></a>
        <a href="../formulario.php"><li>Ingresar</li></a>
        <a href="../mostrar_resultados.php"><li>Editar</li></a>
    </ul>
    <div class="buscador">
        <form action="../resultado_busqueda.php" method="GET">
            <label for="termino">Búsqueda:</label>
            <input type="text" name="termino" id="termino" placeholder="Busca tu película o serie favorita">
            <button type="submit">Buscar</button>
        </form>
    </div>
</header>

<h1>ACTUALIZAR DATOS DE PELÍCULA O SERIE</h1>
<form action="actualizar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    <label for="pelicula">Película:</label>
    <input type="text" name="pelicula" value="<?php echo $row["pelicula"]; ?>"><br>
    <label for="resumen">Resumen:</label>
    <input type="text" name="resumen" value="<?php echo $row["resumen"]; ?>"><br>
    <label for="tipo">Tipo:</label>
    Tipo <select name="tipo">

        <option value="accion">Película</option>

        <option value="serie">Serie</option>

        </select> <br>

        Clasificación <select name="clasificación">

        <option value="accion">Accion</option>

        <option value="romantica">Romántica</option>

        <option value="drama">Drama</option>

        </select> <br>
    <label for="codigo">Código de Alumno:</label>
    <input type="text" name="codigo" value="<?php echo $row["codigo"]; ?>"><br>

    <!-- Agregar input para cargar la nueva imagen de portada -->
    portada<input type="file" name="portada" accept="image/*"><br>


    <input type="submit" value="Actualizar Datos">
</form>

<?php 
echo '<hr>';
}

$conexion->close();
?>

</body>
</html>
