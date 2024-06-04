<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Ventas Exitosas </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">

                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-4 col-12 taR taL_oS">
                    <div class="btn-group" role="group" aria-label="Basic example"><a href=""
                            class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt t14"></i> Exportar</a>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <h4 class="card-title">Filtrar registros por rango de fechas</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Desde</label>
                                        <input type="date" class="form-control" id="desde" name="desde" value=""
                                            required="">
                                    </div>
                                    <div class="col-md-5">
                                        <label>Hasta</label>
                                        <input type="date" class="form-control" id="hasta" name="hasta" value=""
                                            required="">
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label" style="color:white">Buscar / Filtrar</label>
                                        <input type="submit" value="Buscar / Filtrar" class="btn btn-block btn-blue">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-body">
                <!-- Statistic -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-success" onclick="window.location=''">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-white text-left">
                                            <h3 class="text-white">$0</h3>
                                            <span>Total ventas</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-pointer text-white font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-warning">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-white text-left">
                                            <h3 class="text-white">$0</h3>
                                            <span>Transporte y envío</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-cup text-white font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-info" onclick="window.location=''">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-white text-left">
                                            <h3 class="text-white">0</h3>
                                            <span>Cantidad de ventas</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-plane text-white font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de Ventas Exitosas</h4>
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
                                        if ($Factura["Estado_envio"] == "Enviado") {

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