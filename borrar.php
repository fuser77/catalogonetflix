<?php 

/* 
Para crear una conexión necesitamos el servidor donde está alojada la base de datos, y las credenciales - usuario / contraseña - que se utilizan para tener acceso a la base de datos. 

  $conexion = new mysqli("servidor", "usuario", "contraseña", "base-de-datos");
*/

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


  if (isset($_REQUEST["id"])) $id = $_REQUEST["id"];
 
  $sql = "delete from netflix  Where id ='" . $id . "'";
  if ($conexion->query($sql) === TRUE) {
    echo "Registro Borrado";
    } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
    }
    $conexion->close();
  

 header("Location:../index.php");

?>
