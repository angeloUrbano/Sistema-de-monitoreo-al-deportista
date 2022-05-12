<?php
session_start();

if (isset($_SESSION['id'])) {
    header('location: controller/redirec.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Score Sport | DEZAIN</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="css/style-login.css">
</head>

<body>
    <div class="container">
        <div class="overlay">
            <div class="login">
                <h1>Welcome</h1>
                <fieldset class="login-form">
                    <input type="text" class="form-control" id="user" placeholder="Ingresa tu usuario">

                    <input type="password" autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu usuario">

                    <div class="row" id="load" hidden="hidden">
                        <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                            <img src="img/load.gif" width="100%" alt="">
                        </div>
                        <div class="col-xs-12 center text-accent">
                            <span>Validando información...</span>
                        </div>
                    </div>

                    <button type="button" class="button" name="button" id="login">Iniciar sesion</button>

                    <section class="text-accent center">
                        <div class="spacing-2"></div>

                        <p>
                            No tienes una cuenta? <a href="registro.php"> Registrate!</a>
                        </p>
                    </section>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="js/operaciones.js"></script>
</body>

</html>