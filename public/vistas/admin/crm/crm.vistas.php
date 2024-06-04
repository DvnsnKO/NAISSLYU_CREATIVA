<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 ">
                        CRM - Clientes </h3>
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
                            <div id="rtn_list" class="fR taR"></div>
                            <h4 class="card-title">Listado de CRM - Clientes</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="50">OK</th>
                                        <th width="50">TIPO</th>

                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Fecha</th>
                                        <th width="100">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    require_once './app/controlador/Personas/crm.controlador.php';



                                    /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                    $Personas = PersonasControlador::index();
                                    foreach ($Personas as $key => $Persona) {
                                        if ($Persona["Rol"] == "Cliente") {

                                            echo ' 
                                         

                                    <tr id="tr-Comprador-7583">
                                        <td class="vM taC">' . $Persona["Id_persona"] . '</td>
                                        <td class="vM taC">
                                            <i class="fas fa-check success t24"></i>
                                        </td>
                                        <td class="vM">' . $Persona["Rol"] . '</td>
                                        
                                        <td class="vM">' . $Persona["Nombres"] . '</td>
                                        <td class="vM">' . $Persona["Correo"] . '</td>
                                        <td class="vM">' . $Persona["Celular"] . '</td>
                                        <td class="vM">' . $Persona["Fecha_inscrito"] . '</td>
                                        <td class="vM" style="padding:10px !important;">
                                            <div class="taC">

                                                <div class="btn-group" role="group" aria-label="Basic example"><a
                                                        href=""
                                                        class="btn btn-outline-blue btn-sm"
                                                        title="Compras de visitantes"><i class="fas fa-eye t16"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    ';


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