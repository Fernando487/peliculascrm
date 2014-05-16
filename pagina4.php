<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Resultados Busqueda</h2>
<?php
	$conexion=mysql_connect("localhost","root","") or die("Error en la conexion");
	mysql_select_db("peliculas",$conexion) or die("Error al seleccionar la bd");
	$filtro=mysql_query("select id,nombre,descripcion,codigogenero from nombre where nombre='$_REQUEST[nombre]'",$conexion) or die("Problema en el select:".mysql_error());
	if ($reg=mysql_fetch_array($filtro)){
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
				echo "No existe ninguna clase";
				break;
		}
	}
	else{
		echo "no existe ninguna pelicula con ese nombre";
	}
?>
</body>
</html>