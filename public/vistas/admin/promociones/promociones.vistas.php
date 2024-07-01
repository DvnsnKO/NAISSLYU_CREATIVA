<?php
require_once './app/controlador/productos/productos.controlador.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h2>&nbsp;&nbsp;Ingresar promociones</h2>
    <form action="" method="post">
        <div class="row m-3">
            <div class="col-7 form-group green-box">
                <label  for="lineas" >Ingrese la linea que desea que se le aplique el
                    descuento:</label>
                <select class="form-control"  id="lineas"  name="idlineas">
                <?php 

require_once './app/controlador/lineas/lineas.controlador.php';


/**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
$Lineas = LineasControlador::index();


foreach ($Lineas as  $Linea) {

    if ($Linea["estado"]!=0){
    
   
        echo '<option  value="' . htmlspecialchars($Linea["idLineas"]) . '">' . htmlspecialchars($Linea["Nombre_linea"]) . '</option>';

    }
}
?>
                </select>
            </div>
            <div class="col-7 form-group green-box">
                <label for="porcentaje" >Ingrese el porcentaje de descuento:</label><br>
                <input class="form-control" type="number" id="valorporcentaje" name="valorporcentaje" min="1" max="50">
            </div>
        </div>

        <button class="btn btn-success" type="submit" id="enviar" name="enviar"> Generar descuento </button>
        
    </form>
    <?php
   $updateProducto = ProductoControlador::updatepromociones();


    ?>