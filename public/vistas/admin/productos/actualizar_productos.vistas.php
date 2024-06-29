<?php
// rutaadmin del controlador
require_once './app/controlador/productos/productos.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Actualizar Producto</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                       

                    <?php
                        /* Consultar el registro por medio del id pasado por la url */
                        $showproducto = ProductoControlador::show();


                        echo '
                                         

                        <div class="col-8 align-middle">
                            <div class="form-group green-box">
                                <label for="productName">Nombre del producto:</label>
                                <input type="text" class="form-control" id="productName" name="Nombre" value="' . $showproducto["Nombre"] . '">
                            </div>

                          


                            <div class="form-group green-box">
                                <label for="productName">Cantidad:</label>
                                <input type="text" class="form-control" id="productName" name="Cant_disp" value="' . $showproducto["Cant_disp"] . '">
                            </div>
                            <div class="form-group green-box">
                                <label for="productName">Precio Unitario:</label>
                                <input type="text" class="form-control" id="Precio_uni" name="Precio_uni" value="' . $showproducto["Precio_uni"] . '">
                            </div>
                            <div class="form-group green-box">
                                <label for="Descripcion">Descripcion:</label>
                                <input class="form-control" id="Descripcion" name="Descripcion" value="' . $showproducto["Descripcion"] . '">
                               
                            </div>



                        </div>
                    </div>

                </div>

                <div class="col-4 form-group green-box">
                    <label for="">Linea</label>


                    <select class="custom-select" name="Lineas_idLineas" id="">
                    ';
                    ?>
                        <?php 

                        require_once './app/controlador/lineas/lineas.controlador.php';


                        /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                        $Lineas = LineasControlador::index();
                        

                        foreach ($Lineas as $key => $Linea) {

                            if ($Linea["idLineas"] == $showproducto["Lineas_idLineas"] ){
                                echo '<option selected value="' . htmlspecialchars($Linea["idLineas"]) . '">' . htmlspecialchars($Linea["Nombre_linea"]) . '</option>';

                            }else{

                            echo '<option value="' . htmlspecialchars($Linea["idLineas"]) . '">' . htmlspecialchars($Linea["Nombre_linea"]) . '</option>';
                            }
                        }
                        
                        echo '


                    </select>
                </div>
                <div class="col-4 form-group green-box">
                    <label for="">Estado</label>


                    <select class="custom-select" name="Estado" id="">';
                    if ($showproducto["Estado"] == 1 ){
                                echo '<option selected value="1">Activo</option>
                               <option  value="0">Inactivo</option>';

                            }else{

                                echo '<option  value="1">Activo</option>
                               <option  selected value="0">Inactivo</option>';
                            }
                             echo '
                    </select>
                </div>


                <div class="col-4 form-group green-box" id="pVar" style="display: block;">
                    <label class="control-label">Codigo de producto</label>
                    <input class="form-control form-group-margin" type="number" id="Codigo_producto"
                        name="Codigo_producto" min="3" value="' . $showproducto["Codigo_producto"] . '" readonly>
                </div>'
                ?>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>



    </div>






</div>
<?php

/**
 * Llamar a la función del controlador: Crear 
 */
$updateProducto = ProductoControlador::updatepromociones();

?>