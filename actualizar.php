<?php
$conexion = new mysqli("localhost", "root", "", "tecno");

/*
  Declaraciones para asegurar que los datos enviados / recibidos entre PHP y MySQL sean en UTF8. 
*/
$conexion->query("SET NAMES utf8");
$conexion->query("SET CHARACTER SET utf8");

/* 
  Utilizar utf8mb4 si así están definidas las tablas / columnas. 

  $conexion->query("SET NAMES utf8mb4");
  $conexion->query("SET CHARACTER SET utf8mb4");
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) $id = $_POST["id"];
    if (isset($_POST["pelicula"])) $pelicula = $_POST["pelicula"];
    if (isset($_POST["resumen"])) $resumen = $_POST["resumen"];
    if (isset($_POST["tipo"])) $tipo = $_POST["tipo"];
    if (isset($_POST["clasificación"])) $clasificación = $_POST["clasificación"];
    if (isset($_POST["codigo"])) $codigo = $_POST["codigo"];

    // Verificar si se cargó una nueva imagen de portada
    if ($_FILES["portada"]["size"] > 0) {
        $targetDirectory = "uploads/"; // Directorio donde se guardarán las imágenes
        $nombreArchivo = basename($_FILES["portada"]["name"]); // Nombre del archivo de imagen

        // Ruta completa donde se guardará la imagen (incluye el nombre del archivo)
        $rutaImagen = $targetDirectory . $nombreArchivo;

        // Verificar si el archivo es una imagen válida (puedes agregar más validaciones)
        $tipoArchivo = strtolower(pathinfo($rutaImagen, PATHINFO_EXTENSION));
        $permitidos = array("jpg", "jpeg", "png", "gif");

        if (in_array($tipoArchivo, $permitidos)) {
            // Intentar mover la imagen al directorio de destino
            if (move_uploaded_file($_FILES["portada"]["tmp_name"], $rutaImagen)) {
                // Actualizar en la base de datos con la nueva ruta de la imagen
                $sql = "UPDATE netflix SET pelicula='$pelicula', resumen='$resumen', tipo='$tipo', clasificación='$clasificación', codigo='$codigo', portada='$rutaImagen' WHERE id='$id'";

                if ($conexion->query($sql) === TRUE) {
                    echo "Registro Actualizado";
                } else {
                    echo "Error: " . $sql . "<br>" . $conexion->error;
                }
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }
    } else {
        // Si no se cargó una nueva imagen, solo actualizar los datos sin tocar la portada
        $sql = "UPDATE netflix SET pelicula='$pelicula', resumen='$resumen', tipo='$tipo', clasificación='$clasificación', codigo='$codigo' WHERE id='$id'";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro Actualizado";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
}

$conexion->close();

header("Location: index.php");
?>
