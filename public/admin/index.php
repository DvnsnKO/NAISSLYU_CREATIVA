<!-- 
  Sirve unicamente para ver el inicio de sesion del ADMIN y enrutar al indexadmin
  

 -->

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





<br>
<br>
<br>





  <div class="container-fluid col-lg-4 text-center "><!-- contenido-->
    <div class="card card-header "><!-- contenido-->
      <div class="container-fluid col-sm-10 ">
        <img class="img-fluid rounded" src="../images/logo.jpg" alt="Photo">
      </div>

      <p>- Admin -</p>

      <div class="card-body login-card-body">


        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Correo Electronico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
            <a name="" id="" class="btn btn-success btn-block" href="../../indexadmin.php" role="button">Acceder</a>
              
            </div>



          </div>



        </form>

      </div>
    </div>
  </div>



 



  </body>

</html>