<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
</head>
<body>
<?php
	$conexion=mysql_connect("localhost","root","") or die("Error de conexion");
	mysql_select_db("peliculas",$conexion) or die("Problemas en la selección de la base de datos");
	$registros=mysql_query("select * from nombre where nombre='$_REQUEST[nombre]'") or die ("Problemas en el select:".mysql_error());
	if ($reg=mysql_fetch_array($registros)) 
	{
?>
<form method="post" action="pagina3.php">
	<label>Ingresa Nombre</label><br/>
	<input type="text" name="nombre" value="<?php echo $reg['nombre']?>" /><br/>
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
}
else
	echo "No existe dicho registro";
?>
</body>
</html>