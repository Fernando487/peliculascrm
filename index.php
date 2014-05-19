<!DOCTYPE html>
<html>
<head>
	<title>Peliculas</title>
	<meta charset="utf-8"/>
</head>
<body>
<h2>Alta de Peliculas</h2>
<form method="post" action="index.php">
	<label>Ingresa Nombre</label><br/>
	<input type="text" name="nombre" /><br/>
	<label>Ingresa Descripcion</label><br/>
	<textarea name="descripcion"></textarea><br/>
	<label>Selecciona Genero</label><br/>
	<select name="codigogenero">
		<option value="1">Comedia</option>
		<option value="2">Romancé</option>
		<option value="3">Acción</option>
	</select>
	<br/>
	<input type="submit" value="Registrar" name="registrar">
</form>
<?php  
if (isset($_POST['registrar'])) {
$conexion=mysql_connect("localhost","root","") or die ("Problemas en la conexion");
mysql_select_db("peliculas",$conexion) or die ("Problemas en la seleccion de la base de datos");
mysql_query("insert into nombre (nombre,descripcion,codigogenero) values ('$_POST[nombre]','$_POST[descripcion]', $_POST[codigogenero])", $conexion) or die ("Problemas en el select".mysql_error());
	mysql_close($conexion);
	echo "<br/><br/>La Pelicula fue dada de alta <br/>";
	echo "<button onclick='location.href=\"../pagina3.php\";'/>Mostrar Peliculas</button>";
}
?>
</body>
</html>