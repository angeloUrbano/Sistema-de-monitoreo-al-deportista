<?php
require("conn.php");

$sql = "SELECT * FROM dataprimaryathletes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table class='table table-responsive'>
        <thead class='thead-dark'>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
            <tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['dateofbirth'] . "</td>";
                    echo "<td> <button  onclick='eliminarAtleta(" . $row['idatletas'] . ")' class='btn btn-danger btn-sm'>ELIMINAR</button> <button  onclick='editarAtleta(" . $row['idatletas'] . ")' class='btn btn-success btn-sm'>EDITAR</button></td> ";
                    
                    echo "</tr>";
                }

               
                echo "
            </tbody>
    </table>";
} else {
    echo "<p>Aún no hay registros en la base de datos</p>";
}
$conn->close();
