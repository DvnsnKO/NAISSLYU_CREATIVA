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
                <div class="col-12">



                    <div class="form-group green-box">
                        <label for="lineatName">Nombre de la linea:</label>
                        <input type="text" class="form-control" id="lineaName" name="Nombre_linea" required>
                    </div>
            
                </div>

            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <?php
    /**
     * Llamar a la función del controlador: Crear 
     */
    $addlineaModel = LineasControlador::create();

    ?>