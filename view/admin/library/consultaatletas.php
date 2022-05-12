<?php
require("conn.php");

$sql = "SELECT * FROM dataprimaryathletes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['dateofbirth'] . "</td>";
        echo "<td><button class='btn btn-danger btn-sm'>ELIMINAR</button></td>";
        echo "</tr>";
    }
} else {
    echo "<p>Aún no hay registros en la base de datos</p>";
}
$conn->close();
