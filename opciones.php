<!-- Muestra el menu de inicio de MVCNAISSLYU con el objetivo de enrutar hacia las vistas de ADMIN o cliente -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de inicio</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/dist/css/adminlte.css">
    <link rel="stylesheet" href="./public/dist/css/naisslyu.css">


</head>

<body>

    <div class="row mt-4 ">
        <!-- ENCABEZADO DE PRESENTACION -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">PANTALLA TEMPORAL, SOLO PARA EVIDENCIAS</h3>
                        </div>
                        <!-- FIN ENCABEZADO DE PRESENTACION -->


                        <div class="row mt-4">
                            <!-- ENTRAR A LAS OPCIONES DE CLIENTE -->
                            <div class="col-6">
                                <a href="index.php?ruta=destacados">
                                    <img src="./public/images/usuario.jpg" alt="Photo 1" height="100%" width="100%">
                                    <button class="col-12 btn btn-success">usuario</button>
                                </a>
                            </div>

                            <!-- ENTRAR A LAS OPCIONES DE ADMINISTRADOR -->
                            <div class="col-6 ">
                                <a href="./public/admin">
                                    <img src="./public/images/administrador.jpg" alt="Photo 2" height="100%" width="100%">
                                    <button class="col-12 btn btn-success">administrador</button>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>
</body>

</html>