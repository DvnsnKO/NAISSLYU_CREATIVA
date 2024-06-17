<!-- 
  Sirve unicamente para ver el inicio de sesion del ADMIN y enrutar al indexadmin
  

 -->
<?php


session_start();
if ((isset($_SESSION["usuario"])) || (isset($_SESSION["4dm1n"]))) {
  session_unset();
  session_destroy();
}

require_once "../../app/controlador/Personas/sesionadmin.controlador.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pagina de inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.css">

  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="../../public/dist/js/sweetalert2/sweetalert2.min.css">

  <!-- js para los cuadros de mensajes -->
  <script src="../../public/dist/js/sweetalert2/sweetalert2.all.min.js"></script>



</head>

<body>


  <div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-lg-4 text-center">
        <div class="card card-header "><!-- contenido-->
          <div class="container-fluid col-sm-10 ">
            <img class="img-fluid rounded" src="../images/logo.jpg" alt="Photo">
          </div>

          <p>- Admin -</p>

          <div class="card-body login-card-body">


            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Correo Electronico" name="Correo" value="naisslatatiana92@outlook.com">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="contraseña" name="Contrasenia" value="123456789">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">

                <!-- /.col -->
                <div class="col-12">
                  <button type="submit" name="" id="" class="btn btn-success btn-block">Acceder</button>

                </div>



              </div>



            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  


  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llamar a la función del controlador para procesar el formulario
    $login = SesionControlador::Sesionadmin();
  }
  ?>




</body>

</html>