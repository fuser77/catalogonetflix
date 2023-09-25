<?php
$conexion = new mysqli("127.0.0.1", "root", "", "tecno");

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
    $targetDirectory = "uploads/"; // Directorio donde se guardarán las imágenes
    $nombreArchivo = basename($_FILES["portada"]["name"]); // Nombre del archivo de imagen

    // Ruta completa donde se guardará la imagen (incluye el nombre del archivo)
    $rutaImagen = $targetDirectory . $nombreArchivo;

    // Verificar si el archivo es una imagen válido (puedes agregar más validaciones)
    $tipoArchivo = strtolower(pathinfo($rutaImagen, PATHINFO_EXTENSION));
    $permitidos = array("jpg", "jpeg", "png", "gif");

    if (in_array($tipoArchivo, $permitidos)) {
        // Intentar mover la imagen al directorio de destino
        if (move_uploaded_file($_FILES["portada"]["tmp_name"], $rutaImagen)) {
            // Si la imagen se subió correctamente, continúa con la inserción en la base de datos
            if (isset($_REQUEST["pelicula"])) $pelicula = $_REQUEST["pelicula"];
            if (isset($_REQUEST["resumen"])) $resumen = $_REQUEST["resumen"];
            if (isset($_REQUEST["tipo"])) $tipo = $_REQUEST["tipo"];
            if (isset($_REQUEST["clasificación"])) $clasificación = $_REQUEST["clasificación"];
            if (isset($_REQUEST["codigo"])) $codigo = $_REQUEST["codigo"];

            
            // Insertar en la base de datos con la ruta de la imagen
            $sql = "INSERT INTO netflix (pelicula, resumen, tipo, clasificación, codigo, portada) VALUES ('$pelicula', '$resumen', '$tipo', '$clasificación', '$codigo', '$rutaImagen')";

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
}

$conexion->close();


 header("Location:index.php");


?>
