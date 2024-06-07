<?php
// rutaadmin del controlador
require_once './app/controlador/lineas/lineas.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header ">
        <h3>Agregar Linea</h3>
        <form action="" method="post">
            <div class="row ">
                <div class="col-8">


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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (!empty($_POST["Nombre_linea"])) {
        
        $addlineaModel = LineasControlador::create();
    } else {
        // Manejar el caso en que "Nombre_linea" está vacío
        echo "El campo Nombre_linea no puede estar vacío.";
    }
}
?>