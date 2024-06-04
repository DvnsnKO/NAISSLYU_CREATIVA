<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 ">
                        Usuarios </h3>
                </div>

                <div class="content-header-right col-md-4 col-12 taR taL_oS">
                    <div class="btn-group" role="group" aria-label="Basic example"><a
                            href="indexadmin.php?rutaadmin=crear_usuario" class="btn btn-blue btn-sm"><i
                                class="fas fa-plus-square t14"></i> Crear Usuario</a></div>
                </div>
            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-header">
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de usuarios</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >OK</th>
                                        <th >TIPO</th>

                                        <th>Detalles</th>
                                        
                                        <th>Fecha registro</th>
                                        <th >Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    require_once './app/controlador/Personas/crm.controlador.php';



                                    /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                    $Personas = PersonasControlador::index();
                                    foreach ($Personas as $key => $Persona) {

                                        echo ' 
                                         

                                    <tr id="tr-Comprador-7583">
                                        <td class="vM taC">' . $Persona["Id_persona"] . '</td>
                                        <td class="vM taC">
                                            <i class="fas fa-check success t24"></i>
                                        </td>
                                        <td class="vM">' . $Persona["Rol"] . '</td>
                                        
                                        <td class="vM">
                                       ' . $Persona["Nombres"] .
                                        ' <br><small> ' .  $Persona["Correo"] .
                                        '</small><br><small>' .  $Persona["Celular"] . ' </small> </td>
                                        <td class="vM">' . $Persona["Fecha_inscrito"] . '</td>
                                        <td>
                                        <a href="#" class="btn btn-warning btn-sm" title="cambiar contraseña"><i class="fas fa-unlock"></i> </a>
                                        <a href="#" class="btn btn-success btn-sm" title="editar"><i class="far fa-edit nav-icon"></i> <span></i> </a>
                                        <a href="#" class="btn btn-danger btn-sm"  title="eliminar"><i class="fa fa-trash nav-icon"></i> </a>
                                      </td>
                                    </tr>
                                    ';


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