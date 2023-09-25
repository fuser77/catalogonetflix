<?php 

/* 
Para crear una conexión necesitamos el servidor donde está alojada la base de datos, y las credenciales - usuario / contraseña - que se utilizan para tener acceso a la base de datos. 

  $conexion = new mysqli("servidor", "usuario", "contraseña", "base-de-datos");
*/

$conexion = new mysqli("localhost", "root", "", "tecno");

/*
  Declaraciones para asegurar que los datos enviados / recibidos entre PHP y MySQL sean en UTF8. 
*/
  
    $conexion->query("SET NAMES utf8");
    $conexion->query("SET CHARACTER SET utf8");

// CAPTURO LA VARIABLE TERMINO

if (isset($_REQUEST["termino"])) $termino = $_REQUEST["termino"];

if (isset($_REQUEST["termino"]))
{
$sql = "select * from netflix where pelicula Like '%".$termino."%' OR resumen Like '%".$termino."%'";
}
else
{
$sql = "select * from netflix";
}

$query =  mysqli_query($conexion, $sql); 

echo '<h1>ZONA ADMINISTRATIVA DE CATALOGO DE NETFLIX</H1>';

echo '<hr>';
echo '<a href="index.php">Inicio</a>&nbsp;&nbsp;&nbsp;';
echo '<a href="formulario.php">ingreso de datos</a>';
echo '<hr>';


ECHO '
<form action="mostrar_resultados.php" method="GET">
<input type="text" name="termino">

<input type="submit" value="Buscar">
</form>
';


echo '
<table style="width: 100%" border="1">
	<tr bgcolor="silver">
		<td>ID</td>
		<td>Borrar</td>
		<td>Actualizar</td>
		<td>Pelicula</td>
		<td>Resumen</td>
		<td>Tipo</td>
		<td>Clasificación</td>
		<td>Portada</td>
	</tr>';
	
	




while($row = mysqli_fetch_assoc($query))
{

// PRIMERA COLUMNA
echo '<tr>';
echo '<td>';
echo $row["id"];
echo '</td>';

echo '<td>';
echo '<a href="borrar.php?id=';
echo $row["id"];
echo '">';
echo 'Borrar';
echo '</a>';
echo '</td>';

echo '<td>';
echo '<a href="formulario_editar.php?id=';
echo $row["id"];
echo '">';
echo 'Actualizar';
echo '</a>';
echo '</td>';



echo '<td>';
echo $row["pelicula"];
echo '</td>';

// SEGUNDA COLUMNA
echo '<td>';
echo $row["resumen"];
echo '</td>';

// TERCERA COLUMNA
echo '<td>';
echo $row["tipo"];
echo '</td>';

// CUARTA COLUMNA
echo '<td>';
echo $row["clasificación"];
echo '</td>';


// Quinta COLUMNA
echo '<td>';
if($row["portada"]) echo '<img src="'.$row["portada"].'" width="50">';
echo '</td>';


}


$conexion->close();

echo '</table>';

?>
