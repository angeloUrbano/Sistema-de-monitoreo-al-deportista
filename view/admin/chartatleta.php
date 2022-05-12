<!DOCTYPE html>
<html>
    <head>
        <title>Dynamic Chart</title>
        <style type="text/css">
            BODY {
                    width:70%;
                    padding-left: 12%;
                }
                
                #chart-container {
                    width: 100%;
                    height: auto;
                }
        </style>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
    </head>
    <body>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica en Barras.</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas"></canvas>
        </div>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica Lineas.</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas1"></canvas>
        </div>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica Radiar.</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas2"></canvas>
        </div>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica Pastel</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas3"></canvas>
        </div>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica Áreas Polares</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas4"></canvas>
        </div>
        <center>
        ____________________________________________________________________________________________
        <h1>Graficas de Condición Fisica Anillo</h1>
        _____________________________________________________________________________________________
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas5"></canvas>
        </div>
    <script>
        $(document).ready(function () {
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
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];
                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }
                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
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
        function lineChart()
        {
            {
                $.post("datas.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];

                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        function radarChart()
        {
            {
                $.post("datas.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];

                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'radar',
                        data: chartdata
                    });
                    



                });
            }
        }
        function bieChart()
        {
            {
                $.post("datas.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];

                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas3");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
            }
        }
        function polarAreaChart()
        {
            {
                $.post("datas.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];

                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas4");

                    var barGraph = new Chart(graphTarget, {
                        type: 'polarArea',
                        data: chartdata
                    });
                });
            }
        }
        function doughnutCharts()
        {
            {
                $.post("datas.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var velocidad = [];

                    for (var i in data) {
                        name.push(data[i].cod);
                        velocidad.push(data[i].velocidad);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
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
                            }
                        ]
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
</body>
</html>