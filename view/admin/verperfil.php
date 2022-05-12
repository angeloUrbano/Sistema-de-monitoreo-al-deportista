<?php
include('library/conn.php');
// Se prendio esta mrd :v
session_start();
$cod = $_GET['cod'];
$name = $_GET['name'];
// Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {

    header('location: ../../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Score Sport | Atletas</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript" src="chart/jquery.min.js"></script>
    <script type="text/javascript" src="chart/Chart.min.js"></script>

    <script>
        window.onload = function() {
            Cargar();
        }

        function Registrar() {
            var cedu = $("#cedula").val();
            var nom = $("#nombre").val();
            var fech = $("#fecha").val();
            var carg = $("#cargo").val();
            var apellido = $("#apellido").val();
            if (cedu == "" || nom == "" || fech == "" || carg == "") {
                $("#respuesta").html("<span>Por favor completa todos los campos</span>");
            } else {
                $("#respuesta").html("<img src='loader.gif'><span> Por favor espera un momento</span>");
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    url: "library/post.php",
                    data: "cedula=" + cedu + "&nombre=" + nom + "&fecha=" + fech + "&cargo=" + carg + "&apellido=" + apellido,
                    success: function(resp) {
                        $('#respuesta').html(resp);
                        Limpiar();
                        Cargar();
                    }
                });
            }
        }

        function Cargar() {
            $('#datagrid').html("<img src='loader.gif'><span> Por favor espera un momento</span>");
            $('#datagrid').load('library/consulta.php');
        }

        function Limpiar() {
            $("#cedula").val("");
            $("#nombre").val("");
            $("#fecha").val("");
            $("#cargo").val("");
            $("#apellido").val("");

        }
    </script>
</head>

<body>
    <?php
    include('library/nav.php');

    ?>
    <div id="layoutSidenav">
        <?php
        include('library/navbar.php');
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row g-3">

                        <div>

                            <img src="https://a.espncdn.com/combiner/i?img=/i/headshots/nba/players/full/1966.png" width="250px" style="float: left">
                            <br><br><br>
                            <h1><?= $cod . ' | ' . $name; ?></h1>

                        </div>
                    </div>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Atletas Navegación</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="signup-form-container">
                                <div id="container">
                                    <div id="inscribir">
                                        <?php
                                        $sql = "SELECT * FROM dataprimaryathletes INNER JOIN condicion ON dataprimaryathletes.ci = condicion.cod WHERE dataprimaryathletes.code = '$cod' LIMIT 1 ";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {

                                        ?>
                                                <div class="row g-3">

                                                    <div class="col-sm-2">
                                                        <label for="firstName" class="form-label">Cedula de Identidad</label>
                                                        <input type="text" class="form-control" value="<?= $row['ci']; ?>" required>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="firstName" class="form-label">Nombre Completo</label>
                                                        <input type="text" class="form-control" value="<?= $row['name']; ?>" required>

                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="lastName" class="form-label">Apellido Completo</label>
                                                        <input type="text" class="form-control" value="<?= $row['lastname']; ?>" required>

                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="lastName" class="form-label">Edad</label>
                                                        <input type="text" class="form-control" value="<?= $row['age']; ?>" required>

                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="lastName" class="form-label">Fecha de Nacimiento</label>

                                                        <input type="text" class="form-control" value="<?= $row['dateofbirth']; ?>" required>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="lastName" class="form-label">Peso</label>

                                                        <input type="text" class="form-control" value="<?= $row['peso']; ?> Kg" required>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="lastName" class="form-label">Estatura</label>

                                                        <input type="text" class="form-control" value="<?= $row['estatura']; ?> Mts" required>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="lastName" class="form-label">Velocidad</label>

                                                        <input type="text" class="form-control" value="<?= $row['velocidad']; ?> Seg" required>
                                                    </div>


                                                </div>


                                                <hr class="my-4">


                                                <br style="clear:both;">

                                                <div class="alert" id="respuesta"></div>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $conn->close();
                                        ?>
                                    </div>
                                    <div class="container">
                                        <div id="consultar">
                                            <section class="widget">
                                                <h4 class="widgettitulo">Graficas de Atleta</h4>
                                                <div class="datagrid">
                                                    <h1>
                                                        Graf. Condición Física
                                                    </h1>
                                                    <div id="chart-container">
                                                        <canvas id="graphCanvas"></canvas>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    barChart();
                                    lineChart();
                                    radarChart();
                                    bieChart();
                                    polarAreaChart();
                                    doughnutCharts();
                                });

                                function barChart() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];
                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }
                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };
                                                var graphTarget = $("#graphCanvas");
                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'bar',
                                                    data: chartdata,
                                                    borderWidth: 1
                                                });
                                            });
                                    }
                                }

                                function lineChart() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];

                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }

                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };

                                                var graphTarget = $("#graphCanvas1");

                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'line',
                                                    data: chartdata
                                                });
                                            });
                                    }
                                }

                                function radarChart() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];

                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }

                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };

                                                var graphTarget = $("#graphCanvas2");

                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'radar',
                                                    data: chartdata
                                                });




                                            });
                                    }
                                }

                                function bieChart() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];

                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }

                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };

                                                var graphTarget = $("#graphCanvas3");

                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'pie',
                                                    data: chartdata
                                                });
                                            });
                                    }
                                }

                                function polarAreaChart() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];

                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }

                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };

                                                var graphTarget = $("#graphCanvas4");

                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'polarArea',
                                                    data: chartdata
                                                });
                                            });
                                    }
                                }

                                function doughnutCharts() {
                                    {
                                        $.post("datas.php",
                                            function(data) {
                                                console.log(data);
                                                var name = [];
                                                var velocidad = [];

                                                for (var i in data) {
                                                    name.push(data[i].cod);
                                                    velocidad.push(data[i].velocidad);
                                                }

                                                var chartdata = {
                                                    labels: name,
                                                    datasets: [{
                                                        label: 'Seg. velocidad',
                                                        backgroundColor: '#49e2ff',
                                                        borderColor: '#46d5f1',
                                                        hoverBackgroundColor: '#CCCCCC',
                                                        hoverBorderColor: '#666666',
                                                        data: velocidad,
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                };

                                                var graphTarget = $("#graphCanvas5");

                                                var barGraph = new Chart(graphTarget, {
                                                    type: 'doughnut',
                                                    data: chartdata
                                                });
                                            });
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <div style="height: 100vh"></div>
                </div>
            </main>
            <?php
            include('library/footer.php');
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>