<?php
require("conn.php");
		
//evitar inserccion de cualquier caracter que no sea letra o numero

	//variables POST
	$cedu = $_POST['atleta'];
	$nom = $_POST['numero'];

	$ralizado = '26115037';

	//consulta mysql para insertar los datos del empleados
	$consulta = "INSERT INTO `bateo`(`nrobateo`, `cod`, `realizadopor`) VALUES ('" .$nom. "','" .$cedu. "', '".$ralizado."')";
	mysqli_query($conn, $consulta);
	if($consulta){            
		
		echo "siguientebateo.php?cod=$cedu&lanza=$nom";
	}
	else
	{
		echo "<span>No se pudieron guardar los datos</span>";
	}
