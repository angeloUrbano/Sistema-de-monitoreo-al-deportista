<?php
require("conn.php");
		
//evitar inserccion de cualquier caracter que no sea letra o numero

	//variables POST
	$cedu = $_POST['atleta'];
	$nom = $_POST['numero'];
	$fech = $_POST['lanza'];
	$ralizado = '26115037';

	//consulta mysql para insertar los datos del empleados
	$consulta = "INSERT INTO `pitcheo`(`tipolanza`, `nrolanza`, `cod`, `velocidad`, `status`, `realizadopor`) VALUES ('" .$fech. "','" .$nom. "','" .$cedu. "', '','', '".$ralizado."')";
	mysqli_query($conn, $consulta);
	if($consulta){            

		echo "siguienteregistro.php?cod=$cedu&lanza=$nom";
	}
	else
	{
		echo "<span>No se pudieron guardar los datos</span>";
	}
