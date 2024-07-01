<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">


            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Detalles</h3>
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
                            <h4 class="card-title">Detalles productos</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>

                                    <tr>


                                        <th>Nombre producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Valor pagado</th>
                                        <th>Guia de envio</th>
                                        <th>Empresa</th>

                                        <th width="150">Opciones</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    
                                        <?php
                                        require_once './app/controlador/facturas/detalles.controlador.php';
                                        require_once './app/controlador/facturas/facturas.controlador.php';

                                        /** Llamar al controlador para recuperar los registros de la tabla de base de datos */
                                        $Facturas = FacturasControlador::index();
                                        $Detalles_factura = DetallesFacturaControlador::show();

                                        foreach ($Detalles_factura as $Detalle_factura) {

                                            echo '
                                            <tr>
                                            <td>' . $Detalle_factura["Nombre_producto"] . '</td>
    <td>' . $Detalle_factura["Cantidad"] . '</td>
   <td>' . $Detalle_factura["Precio_unit"] . '</td>
    <td>' . $Detalle_factura["Valor_pagado"] . '</td>';



                                            $encontrado = false;

                                            foreach ($Facturas as $Factura) {
                                                if ($Detalle_factura["Facturas_Id_Facturas"] == $Factura["Id_Facturas"] && $Factura["Estado_envio"] == 1) {
                                                    echo '<td>' . $Detalle_factura["No_guia"] . ' </td>
            <td>' . $Detalle_factura["Empresa"] . ' </td>
            <td> <a href="javascript:history.back()" class="btn btn-success btn-sm"> Volver </a> </td>';
                                                    $encontrado = true;
                                                    break; // No necesitamos seguir buscando
                                                }
                                            }

                                            if (!$encontrado) {
                                                echo '<td> <input type="text" name="guia" placeholder="Digite numero de guia"> </td>
        <td> <input type="text" name="empresa_guia" placeholder="Empresa de envio"> </td>
        <td> <a href="#" class="btn btn-success btn-sm">Marcar como enviado</a> </td> 
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