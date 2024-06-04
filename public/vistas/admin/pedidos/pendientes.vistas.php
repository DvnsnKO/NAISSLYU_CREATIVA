<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">


            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Pendientes </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">

                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-4 col-12 taR taL_oS">
                    <div class="btn-group" role="group" aria-label="Basic example"></div>
                </div>
            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de Pendientes</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>

                                        <th width="150">Factura No:</th>
                                        <th>Datos contacto</th>
                                        <th>Ciudad</th>
                                        <th>Direccion</th>
                                        <th>Total</th>
                                        <th>Metodo Pago</th>
                                        <th>Estado del envio</th>

                                        <th width="150">Opciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    require_once './app/controlador/facturas/facturas.controlador.php';



                                    /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                    $Facturas = FacturasControlador::index();
                                    foreach ($Facturas as $key => $Factura) {
                                        if ($Factura["Estado_envio"] == "Pendiente") {

                                            echo ' <tr>
                                        <td>' . $Factura["Id_Facturas"] . '</td>
                                        <td>' . $Factura["personas_Id_persona"] . '</td>
                                        <td>' . $Factura["Ciudad"] . '</td>
                                        <td>' . $Factura["Direccion"] . '</td>
                                        <td>' . $Factura["Total_factura"] . '</td>
                                        <td>' . $Factura["Metodo_pago"] . '</td>
                                        <td>' . $Factura["Estado_envio"] . '</td>
         
          <td>
            <a href="indexadmin.php?rutaadmin=detalles" class="btn btn-warning btn-sm"><i class="fa fa-eye nav-icon"></i> <span>Detalles</a>
           
          </td>
        </tr>';


                                        }
                                    }



                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>