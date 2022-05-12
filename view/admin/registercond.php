<?php
include('library/conn.php');
// Se prendio esta mrd :v
$cod = $_GET['cod'];
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
            var cedu = $("#atleta").val();
            var estatura = $("#estatura").val();
            var peso = $("#peso").val();
            var velocidad = $("#velocidad").val();

            if (cedu == "" || estatura == "" || peso =="" || velocidad =="") {
                $("#respuesta").html("<span>Por favor completa todos los campos</span>");
            } else {
                $("#respuesta").html("<img src='loader.gif'><span> Por favor espera un momento</span>");
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    url: "library/condicionpost.php",
                    data: "atleta=" + cedu + "&estatura=" + estatura + "&peso=" + peso + "&velocidad=" + velocidad,
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
            $('#datagrid').load('siguienteregistro.php');
        }

        function Limpiar() {
            $("#atleta").val("");
            $("#estatura").val("");
            $("#peso").val("");
            $("#velocidad").val("");



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
                    <h1 class="mt-4">Reg. Condi. Física</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reg. Condi. Física</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="signup-form-container">
                                <div id="container">
                                    <div id="inscribir">
                                        <form name="empleado" class="needs-validation" onsubmit="return false" action="return false">

                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="firstName" class="form-label">Atleta Seleccionado</label>
                                                    <input type="text" name="atleta" id="atleta" class="form-control" autocomplete="off" tabindex="1" required value="<?= $cod; ?>" disabled="disabled">

                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="firstName" class="form-label">Estatura (Mts)</label>
                                                    <input type="number" id="estatura" name="estatura" placeholder="Nro (Mts)" class="form-control" autocomplete="off" tabindex="2" required min="0.20" max="2.20">
                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="firstName" class="form-label">Peso (Kg)</label>
                                                    <input type="number" id="peso" name="peso" placeholder="Nro (Kg)" class="form-control" autocomplete="off" tabindex="2" required min="20" max="150">
                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <label for="firstName" class="form-label">Velocidad (Seg)</label>
                                                    <input type="number" id="velocidad" name="velocidad" placeholder="Nro (Seg)" class="form-control" autocomplete="off" tabindex="2" required min="4" max="20">

                                                    <small id="emailHelp" class="form-text text-muted">La velocidad sera espresado en segundos al recorrer la distancia de 90 Ft</small>
                                                </div>




                                            </div>


                                            <hr class="my-4">


                                            <button onclick="Registrar();" class="w-100 btn btn-primary btn-lg" tabindex="7">Siguiente</button>
                                            <br style="clear:both;">
                                        </form>
                                        <div class="alert" id="respuesta"></div>

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