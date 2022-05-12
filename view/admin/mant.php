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
                    <h1 class="mt-4">Mantenimiento</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mantenimiento</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="signup-form-container">


                                <!-- Formulario Login -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                                            <!-- Margen superior (css personalizado )-->
                                            <div class="spacing-1"></div>

                                            <form id="formulario_registro">
                                                <!-- Estructura del formulario -->
                                                <fieldset>

                                                    <legend class="center">Registro</legend>

                                                    <!-- Caja de texto para usuario -->
                                                    <label class="sr-only" for="user">Nombre</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                        <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
                                                    </div>

                                                    <!-- Div espaciador -->
                                                    <div class="spacing-2"></div>

                                                    <!-- Caja de texto para usuario -->
                                                    <label class="sr-only" for="user">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                        <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
                                                    </div>

                                                    <!-- Div espaciador -->
                                                    <div class="spacing-2"></div>

                                                    <!-- Caja de texto para la clave-->
                                                    <label class="sr-only" for="clave">Contraseña</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                                        <input type="password" autocomplete="off" class="form-control" name="clave" placeholder="Ingresa tu clave">
                                                    </div>

                                                    <!-- Div espaciador -->
                                                    <div class="spacing-2"></div>

                                                    <!-- Caja de texto para la clave-->
                                                    <label class="sr-only" for="clave">Verificar contraseña</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                                        <input type="password" autocomplete="off" class="form-control" name="clave2" placeholder="Verificar contraseña">
                                                    </div>

                                                    <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
                                                    <div class="row" id="load" hidden="hidden">
                                                        <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                                            <img src="img/load.gif" width="100%" alt="">
                                                        </div>
                                                        <div class="col-xs-12 center text-accent">
                                                            <span>Validando información...</span>
                                                        </div>
                                                    </div>
                                                    <!-- Fin load -->

                                                    <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
                                                    <div class="row">
                                                        <div class="col-xs-8 col-xs-offset-2">
                                                            <div class="spacing-2"></div>
                                                            <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Registrate</button>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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


</body>

</html>