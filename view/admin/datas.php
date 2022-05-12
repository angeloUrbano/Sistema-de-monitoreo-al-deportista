<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","scoresport");

$cod = '27654892';
$sqlQuery = "SELECT idcondi,cod,velocidad FROM condicion WHERE cod = '$cod' ORDER BY idcondi";
$result = mysqli_query($conn,$sqlQuery);
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);
echo json_encode($data);
?>