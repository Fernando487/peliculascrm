<!DOCTYPE html>
<html>
<head>
	<title>Peliculas</title>
	<meta charset="utf-8"/>
</head>
<body>
<h2>Alta de Peliculas</h2>
<form method="post" action="pagina2.php">
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
	<input type="submit" value="Registrar">
</form>
</body>
</html>