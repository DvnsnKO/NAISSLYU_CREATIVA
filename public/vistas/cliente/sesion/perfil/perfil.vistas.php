<?php



require_once './app/controlador/Personas/personas.controlador.php';

/* Consultar el registro por medio del id pasado por la url */
$showuser = ClientesControlador::show();

?>


<div class="container">
<h1 class="text-center"> <?php echo $showuser["Nombres"];?></h1>
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
        <div class="card card-header ">

            <div class="card">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-sm-6">

                            <div class="col-sm-12 mb-3  ">

                                <a href="index.php?ruta=actualizacion" class=" btn btn-outline-dark btn-block  "><b>Mi perfil</b></a>

                            </div>
                            
                            <div class="col-sm-12 mb-3">

                                <a href="index.php?ruta=pedidos&id=<?php echo $showuser["Id_persona"];?>" class="btn btn-outline-dark btn-block"><b>Mis pedidos</b></a>

                            </div>
                            <div class="col-sm-12 mb-3">

                                <a href="index.php?ruta=cerrarsesion" class="btn btn-outline-dark btn-block"><b>Cerrar sesion</b></a>

                            </div>
                            
                            

                        </div>

                        <div class="col-sm-6">

                            <img class="img-fluid rounded border border-dark" src="./public/images/logo.jpg" alt="Photo">
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
</div>

</section>
</div>


