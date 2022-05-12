<?php
require("conn.php");
		
//evitar inserccion de cualquier caracter que no sea letra o numero

	//variables POST
	$cedu = $_POST['cedula'];
	$nom = $_POST['nombre'];
	$fech = $_POST['fecha'];
	$cargo = $_POST['cargo']; 
	$lastName = $_POST['apellido'];
	//consulta mysql para insertar los datos del empleados
	$consulta = "INSERT INTO `dataprimaryathletes`(`name`, `lastname`, `age`, `dateofbirth`, `code`, `ci`) VALUES ('" .$nom. "','" .$lastName. "','" .$cargo. "','" .$fech. "','" .$cedu. "','" .$cedu. "')";
	mysqli_query($conn, $consulta);
	if($consulta){            
		echo "<span>Guardado Correctamente</span>";
	}
	else
	{
		echo "<span>No se pudieron guardar los datos</span>";
	}

?>
