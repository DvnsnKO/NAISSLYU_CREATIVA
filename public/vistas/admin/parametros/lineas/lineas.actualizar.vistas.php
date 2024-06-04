<?php
// rutaadmin del controlador
require_once './app/controlador/lineas/lineas.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Agregar Linea</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col 12">
                    <div class="row">







                        <?php
                        /* Consultar el registro por medio del id pasado por la url */
                        $showlinea = LineasControlador::show();


                        echo '
                    <div class="col-2">
                        <label for="idLineas">Nombre de la linea:</label>
                        <input type="text" class="form-control" id="idLineas" name="idLineas"
                            value="' . $showlinea["idLineas"] . '" readonly>
                    </div>
                    <div class="col-6">
                        <label for="Nombre_linea">Nombre de la linea:</label>
                        <input type="text" class="form-control" id="Nombre_linea" name="Nombre_linea"
                            value="' . $showlinea["Nombre_linea"] . '">
                    </div>
                    <div class="form-group col-2">
                        <label for="estado">ACTIVO</label>
                        <select id="estado" class="form-control custom-select" name="estado">
                        ';
                        if (($showlinea["estado"] == "1")) {

                            echo '<option value="1" selected >SI</option>
                            <option value="0"  >NO</option> '
                            ;

                        } else {
                            echo '<option value="1"  >SI</option>
                            <option value="0" selected >NO</option>';

                        }
                        ;
                        ?>


                        </select>
                    </div>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
</div>
<?php
/**
 * Llamar a la función del controlador: aCTUALIZAR
 */

$lineaUpdate = LineasControlador::update();

?>