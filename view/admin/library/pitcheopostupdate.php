<?php
require("conn.php");

$cedu = $_POST['atleta'];
$nom = $_POST['numero2'].'|'.$_POST['numero'];
$control = $_POST['ball'].'|'.$_POST['control'];

$date = DATE('d-m-Y');

$ralizado = '26115037';


$sql = "UPDATE pitcheo SET velocidad='$nom', status='$control', fecha='$date' WHERE cod='$cedu'";

if ($conn->query($sql) === TRUE) {
	echo "Record updated successfully";

} else {
	echo "Error updating record: " . $conn->error;
}

$conn->close();
