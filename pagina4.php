<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Resultados Busqueda</h2>
<button onclick='location.href="pagina3.php"'>Mostrar Peliculas</button><br/>
<hr>
<?php
	$conexion=mysql_connect("localhost","root","") or die("Error en la conexion");
	mysql_select_db("peliculas",$conexion) or die("Error al seleccionar la bd");
	$registros=mysql_query("select nombre,busqueda,id,descripcion,codigogenero, match(nombre) against ('$_REQUEST[nombre]') as coincidencia from nombre where match(nombre) against ('$_REQUEST[nombre]') order by coincidencia desc",$conexion) or die("Problema en el select:".mysql_error());
	while ($reg=mysql_fetch_array($registros)) {
		echo "Nombre: ".$reg['nombre']."<br/>";
		echo "Descripcion: ".$reg['descripcion']."<br/>";
		echo "Genero: ";
		switch ($reg['codigogenero']) {
			case 1:
				echo "Comedia";
				break;
			case 2:
				echo "Romance";
				break;
			case 3:
				echo "Accion";
				break;
			default:
				echo "No existe ningun genero";
				break;
		}
		echo "<br/>";
		echo "<hr>";
	}
?>
</body>
</html>