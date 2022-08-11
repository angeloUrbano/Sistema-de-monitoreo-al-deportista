<?php
require("conn.php");

$union= " ";
foreach ($_POST['ball']  as $key => $value) {

	
	$union .= $value . '|';
	
}



 $cedu = $_POST['cedula'];

 $date = DATE('d-m-Y');
 $ralizado = '26115037';
 $sql = "UPDATE bateo SET promedio='$union', fecha='$date' WHERE cod='$cedu'";
 if ($conn->query($sql) === TRUE) {
 	echo "Proceso realizado con exito";
 } else {
 	echo "Error updating record: ";
 }
 $conn->close();
