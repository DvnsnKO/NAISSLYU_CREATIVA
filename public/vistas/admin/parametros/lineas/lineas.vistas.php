

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Lineas </h3>

                </div>
                <div class="content-header-right col-md-4 col-12 taR taL_oS">
                    <div class="btn-group" role="group" aria-label="Basic example"><a
                            href="indexadmin.php?rutaadmin=crear_lineas" class="btn btn-blue btn-sm"><i
                                class="fas fa-plus-square t14"></i> Crear Linea</a></div>
                </div>
            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de Lineas </h4>
                        </div>


                        
                       
                        <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                                    <thead class="table-header">
                                      <tr>
                                        <th width="30%">ID LINEA</th>                                  
                                        <th width="40%">NOMBRE DE LA LINEA</th>
                                        <th width="30%">opciones</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>


                                      <?php
                                      
                                      require_once './app/controlador/lineas/lineas.controlador.php';
                                      
                                    

                                        /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                        $Lineas = lineasControlador::index();
                                        foreach($Lineas as $key => $Linea){
                                          
                                         echo ' <tr>
                                          <td>'. $Linea["idLineas"] .'</td>
                                          <td>'. $Linea["Nombre_linea"] .'</td>
                                          
                                          <td>
                                            
                                            <a href="indexadmin.php?rutaadmin=lineas.actualizar&id='.$Linea["idLineas"].'" class="btn btn-success btn-sm"><i class="far fa-edit nav-icon"></i> <span></i> <span>Editar</a>
                                            
                                          </td>
                                        </tr>';


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