<?php
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
                    <h1 class="mt-4">Atletas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Atletas Navegación</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="signup-form-container">
                                <div id="container">
                                    <div id="inscribir">
                                        <form name="empleado" class="needs-validation" onsubmit="return false" action="return false">

                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="firstName" class="form-label">Cedula de Identidad</label>
                                                    <input type="text" id="cedula" name="cedula" placeholder="Nº CEDULA" class="form-control" autocomplete="off" tabindex="1" required>
                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="firstName" class="form-label">Nombre Completo</label>
                                                    <input type="text" id="nombre" name="nombre" placeholder="NOMBRE" class="form-control" autocomplete="off" tabindex="2" required>
                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="lastName" class="form-label">Apellido Completo</label>
                                                    <input type="text" id="apellido" name="apellido" placeholder="APELLIDO" class="form-control" autocomplete="off" tabindex="2" required>
                                                    <div class="invalid-feedback">
                                                        Valid last name is required.
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="lastName" class="form-label">Edad</label>
                                                    <input type="number" id="cargo" class="form-control" name="cargo" placeholder="EDAD" tabindex="4" required>
                                                    <div class="invalid-feedback">
                                                        Valid last name is required.
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="lastName" class="form-label">Fecha de Nacimiento</label>

                                                    <input type="date" id="fecha" class="form-control" name="fecha_nacimiento" placeholder="FECHA DE NACIMIENTO" tabindex="4" required>
                                                    <div class="invalid-feedback">
                                                        Valid last name is required.
                                                    </div>
                                                </div>
                                                
                                            </div>


                                            <hr class="my-4">


                                            <button onclick="Registrar();" class="w-100 btn btn-primary btn-lg" tabindex="7">Guardar</button>
                                            <br style="clear:both;">
                                        </form>
                                        <div class="alert" id="respuesta"></div>

                                    </div>
                                    <div class="container">
                                        <div id="consultar">
                                            <section class="widget">
                                                <h4 class="widgettitulo">Listado de Atletas</h4>
                                                <div class="datagrid" id="datagrid">

                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>