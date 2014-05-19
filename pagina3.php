<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
</head>
<body>
<h3>Buscar Peliculas</h3>
<form method="post" action="pagina4.php">
	<label></label><br/>
	<input type="text" name="nombre" placeholder="busqueda por nombre"/><br/>
	<input type="submit" value="Buscar Pelicula">
</form>
<h2>Mostrar Listado de Peliculas</h2>
<a href='index.php'>Añadir más</a>
<hr>
<br/>
	<?php 
	if (isset($_REQUEST['pos'])){
	  $inicio=$_REQUEST['pos'];
	}
	else{
	$inicio=0;
	}
	$conexion=mysql_connect("localhost","root","") or die("Error en la conexion");
	mysql_select_db("peliculas",$conexion) or die("Error al seleccionar la bd");
	$registros=mysql_query("select sql_calc_found_rows id,nombre,descripcion,codigogenero from nombre limit $inicio,2", $conexion) or die("Problemas en el select" .mysql_error());
	$impresos=0;
	while ($reg=mysql_fetch_array($registros)) {
		 $impresos++;
		echo "ID: ".$reg['id']."<br/>";
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
		echo "<form method='post' action='pagina3.php'>";
		echo "<input type='hidden' name='id' value='$reg[id]'<br/> <input type='submit' value='borrar' name='borrar'/>";
		echo "<input type='submit' value='editar' name='editar'/>";
		echo "</form>";
		echo"<br/>";
		echo "<hr>";
	}
	if (isset($_POST['borrar'])){

		$conexion=mysql_connect("localhost","root","") or die("Problemas en la conexion");
		mysql_select_db("peliculas",$conexion) or die("Problemas en la selección de la base de datos");
		$consulta  = "select id from nombre where id ='". $_POST['id']. "'"; 
		$resultado = mysql_query($consulta) or die(' La consulta fall&oacute;: ' . mysql_error()." ". $consulta); 
		if ($fila=mysql_fetch_array($resultado))
		{
		  mysql_query("delete from nombre where id='$fila[id]'",$conexion) or die("Problemas en el select:".mysql_error());
		  echo "Se efectuó el borrado de la pelicula.";
		  header("Location: http://peliculascrm.dev/pagina3.php");
		}
		else
		{
		  echo "No existe la pelicula. <br/>";
		}
	}

	if(isset($_POST['editar'])){
		header("Location: http://peliculascrm.dev/editar.php");
	}

	mysql_close($conexion);
	if ($inicio==0)
	  	echo " ";
		else
		{
		  $anterior=$inicio-1;
		  echo "<a href=\"pagina3.php?pos=$anterior\">Anteriores </a>";
		}
		if ($impresos==2)
		{
		  $proximo=$inicio+1;
		  echo "<a href=\"pagina3.php?pos=$proximo\">Siguientes</a>";
		}
		else
		  echo "";
	?>
</body>
</html>