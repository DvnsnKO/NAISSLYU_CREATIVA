<?php
require_once './app/controlador/productos/productos.controlador.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h2>&nbsp;&nbsp;Ingresar promociones</h2>
    <form action="" method="post">
        <div class="row">
            <div>
                <label for="admin_" style="margin: 15px">Ingrese la linea que desea que se le aplique el
                    descuento:</label>
                <select  id="lineas" style="margin: 15px" name="idlineas">
                    <option  >1</option>
                    <option  >2</option>
                    <option  >3</option>
                    <option  >4</option>
                    <option  >5</option>
                </select>
            </div>
            <div class="col-6 form-group green-box">
                <label for="porcentaje" style="margin: 15px">Ingrese el porcentaje de descuento:</label><br>
                <input type="number" id="valorporcentaje" name="valorporcentaje" style="width: 40px; margin: 15px">
            </div>
        </div>
        <input type="submit" id="enviar" name="enviar" style="background-color:#30da77; margin: 10px">
    </form>
    <?php
   $updateProducto = ProductoControlador::updatepromociones();


    ?>