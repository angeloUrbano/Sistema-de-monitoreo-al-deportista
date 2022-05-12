<?php
require("conn.php");
		
//evitar inserccion de cualquier caracter que no sea letra o numero

	//variables POST
	$cedu = $_POST['atleta'];
	$estatura = $_POST['estatura'];
	$peso = $_POST['peso'];
    $velocidad = $_POST['velocidad'];
	$ralizado = '26115037';
    $date = DATE('d-m-Y');


	//consulta mysql para insertar los datos del empleados
    $consulta = "INSERT INTO `condicion`(`velocidad`, `peso`, `estatura`, `cod`, `realizadopor`, `fecha`) VALUES ('" .$velocidad. "','" .$peso. "','" .$estatura. "','" .$cedu. "','" .$ralizado. "','" .$date. "')"; 


	mysqli_query($conn, $consulta);
	if($consulta){            
		echo "<span>Guardado Correctamente</span>";

	}
	else
	{
		echo "<span>No se pudieron guardar los datos</span>";
	}
