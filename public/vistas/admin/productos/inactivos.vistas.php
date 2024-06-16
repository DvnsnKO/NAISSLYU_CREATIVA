<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Inactivos </h3>

                </div>

            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de Inactivos </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-header">
                                    <tr class="auto-col text-center">
                                        <th>ESTADO</th>
                                        <th>CODIGO</th>
                                        <th>NOMBRE</th>
                                        <th>CANTIDAD DISPONIBLE </th>
                                        <th>PRECIO UNITARIO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    require_once './app/controlador/productos/productos.controlador.php';



                                    /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                    $Productos = ProductoControlador::index();
                                    foreach ($Productos as $key => $Producto) {
                                        if ($Producto["Estado"] < 1) {

                                            echo ' <tr class="text-center">
                                             <td>Inactivo</td>
                                          <td>' . $Producto["Codigo_producto"] . '</td>
                                          <td>' . $Producto["Nombre"] . '</td>
                                          <td>' . $Producto["Cant_disp"] . '</td>
                                          <td>' . $Producto["Precio_uni"] . '</td>
                                          <td>
                                           <a href="indexadmin.php?rutaadmin=detalles_productos&id='.$Producto["Codigo_producto"].'" class="btn btn-warning btn-sm"><i class="fa fa-eye nav-icon"title="Consultar"></i> <span></a>
                                            <a href="indexadmin.php?rutaadmin=actualizar_productos&id='.$Producto["Codigo_producto"].'" class="btn btn-success btn-sm" title="Editar"><i class="far fa-edit nav-icon"></i> <span></i> <span></a>
                                          </td>
                                        </tr>';


                                        }
                                    }



                                    ?>

                                </tbody>
                            </table>
                            </td>

                            </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>