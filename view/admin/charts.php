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
    <title>Score Sport | Atletas</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/modal-bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="memberModalLabel">Edit Member Detail</h4>
                        </div>
                        <div class="dash">

                        </div>

                    </div>
                </div>
            </div>
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Visualizar Atletas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Visualizar</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="signup-form-container">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nombre y Apellido</th>
                                            <th>Edad</th>
                                            <th>Office</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Start date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Start date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $result = $conn->query("SELECT * FROM `dataprimaryathletes`");
                                        while ($mem = mysqli_fetch_assoc($result)) :
                                            
                                            echo '<tr>';
                                            echo '<td>' . $mem['name'] . ' ' . $mem['lastname'] . '</td>';
                                            echo '<td>' . $mem['age'] . '</td>';
                                            echo '<td>' . $mem['ci'] . '</td>';
                                            echo '<td>' . $mem['dateofbirth'] . '</td>';
                                            echo '<td>
                                        <a class="btn btn-small btn-primary" href="verperfil.php?cod='.$mem['ci'].'&name='.$mem['name'].'">Ver</a>
                                     </td>';
                                            echo '</tr>';
                                        endwhile;
                                        /* free result set */
                                        $result->close();
                                        ?>

                                    </tbody>
                                </table>

                                <!-- Modal -->

                            </div>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "library/getuser.php",
                data: dataString,
                cache: false,
                success: function(data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        })
    </script>
</body>

</html>