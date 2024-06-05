

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Activos </h3>

                </div>
                <div class="content-header-right col-md-4 col-12 taR taL_oS">
                    <div class="btn-group" role="group" aria-label="Basic example"><a
                            href="indexadmin.php?rutaadmin=crear_productos" class="btn btn-blue btn-sm"><i
                                class="fas fa-plus-square t14"></i> Crear producto</a></div>
                </div>
            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de Activos </h4>
                        </div>


                        
                       
                        <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                                    <thead class="table-header">
                                      <tr>
                                        <th width="5%">CODIGO</th>                                  
                                        <th width="10%">NOMBRE</th>
                                        <th width="50%">CANTIDAD DISPONIBLE </th>										
                                        <th width="5%">PRECIO UNITARIO</th>
                                        <th width="30%">ACCIONES</th>
                                      </tr>
                                    </thead>
                                    <tbody>


                                      <?php
                                      
                                      require_once './app/controlador/productos/productos.controlador.php';
                                      
                                    

                                        /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                        $Productos = ProductoControlador::index();
                                        foreach($Productos as $key => $Producto){
                                          if ($Producto["Estado"] >0) {

                                         echo ' <tr>
                                          <td>'. $Producto["Codigo_producto"] .'</td>
                                          <td>'. $Producto["Nombre"] .'</td>
                                          <td>'. $Producto["Cant_disp"] .'</td>
                                          <td>'. $Producto["Precio_uni"] .'</td>
                                          <td>
                                            <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-eye nav-icon"></i> <span>Consultar</a>
                                            <a href="indexadmin.php?rutaadmin=actualizar_productos&id='.$Producto["Codigo_producto"].'" class="btn btn-success btn-sm"><i class="far fa-edit nav-icon"></i> <span></i> <span>Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm" Id =""><i class="fa fa-trash nav-icon"></i> <span>Eliminar</span></a>
                                          </td>
                                        </tr>';


                                        }}



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