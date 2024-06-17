<?php
require_once './app/controlador/configuraciones/usuarios/usuarios.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 ">
                        Usuarios </h3>
                </div>
            </div>
            <div class="content-body">

                <div class="card">
                    <div class="card-content collapse show">         
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th >Id</th>
                                        <th >Estado</th>
                                        <th >Identificacion</th>
                                        <th>Nombres</th>
                                        <th>Celular</th>  
                                        <th>Rol</th>                                     
                                        <th>Departamento</th>                                                                        
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    require_once './app/controlador/Personas/crm.controlador.php';



                                    /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                    $Persona = UsuariosControlador::show();

                                        echo ' 
                                         

                                    <tr id="tr-Comprador-7583">
                                        <td class="vM taC">' . $Persona["Id_persona"] . '</td>
                                        <td class="vM">' . $Persona["Activo"] . '</td>
                                        <td class="vM">' . $Persona["N_Id"] . '</td> 
                                        <td class="vM">' . $Persona["Nombres"] . '</td>
                                        <td class="vM">' . $Persona["Celular"] . '</td>
                                        <td class="vM">' . $Persona["Rol"] . '</td>
                                        <td class="vM">' . $Persona["Departamento"] . '</td>
                                        <td>
                                    </tr>
                                    ';


                                    
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