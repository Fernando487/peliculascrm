<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8"/>
</head>
<body>
<?php  
$conexion=mysql_connect("localhost","root","") or die ("Problemas en la conexion");
mysql_select_db("peliculas",$conexion) or die ("Problemas en la seleccion de la base de datos");
mysql_query("insert into nombre (nombre,descripcion,codigogenero) values ('$_POST[nombre]','$_POST[descripcion]', $_POST[codigogenero])", $conexion) or die ("Problemas en el select".mysql_error());
	mysql_close($conexion);
	echo "La Pelicula fue dada de alta";
?>
<button onclick="location.href='pagina3.php'">Mostrar Peliculas</button>
</body>
</html>