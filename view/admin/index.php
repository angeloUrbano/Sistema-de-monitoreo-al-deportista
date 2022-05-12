<?php
include('library/conn.php');
// Se prendio esta mrd :v
session_start();

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
    <title>Score Sport | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .container {
            padding: 10px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 mb-4">
                                <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for athlete name...">
                            </div>
                        </div>
                        <div class="row" id="myProducts">
                            <?php
                            $sql = "SELECT * FROM dataprimaryathletes";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">' . $row['name'] . ' - ' . $row['lastname'] . '</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                        <a class="small text-white stretched-link" href="entrena.php?cod='.$row['code'].'&atleta='.$row['name'].'">Entrenar</a>

                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>';
                                }
                            } else {
                                echo "<p>Aún no hay registros en la base de datos</p>";
                            }

                            ?>
                        </div>
                    </div>

                </div>

                <script>
                    function myFunction() {
                        var input, filter, cards, cardContainer, title, i;
                        input = document.getElementById("myFilter");
                        filter = input.value.toUpperCase();
                        cardContainer = document.getElementById("myProducts");
                        cards = cardContainer.getElementsByClassName("card");
                        for (i = 0; i < cards.length; i++) {
                            title = cards[i].querySelector(".card-body");
                            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                                cards[i].style.display = "";
                            } else {
                                cards[i].style.display = "none";
                            }
                        }
                    }

                </script>
            </main>
            <?php
            include('library/footer.php');
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>