<?php
// rutaadmin del controlador
require_once './app/controlador/productos/productos.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Agregar Producto</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-4 ">
                            <div class="form-group green-box zoom-img">
                                <img src="./public/images/sin-imagen.jpg" alt="sin imagen" class="w-100"
                                    id="productImagePreview">
                                <div class="form-group green-box text-center">
                                    <div class="small lead">Imagen del producto</div>
                                    <div class="small">Peso máximo: 3Mb | Tamaño: 700 x 875 píxeles</div>
                                    <div class="small">Formato: JPG o PNG</div>
                                    <label for="productImage" class="col-12 btn btn-success">Seleccione</label>
                                    <input type="file" class="form-control d-none" id="productImage" name="productImage"
                                        accept=".jpg, .jpeg, .png">
                                </div>
                            </div>

                            <script>
                                
                                document.getElementById('productImage').addEventListener('change', function (event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('productImagePreview').src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                });
                                
                            </script>

                        </div>

                        <div class="col-8 align-middle">
                            <div class="form-group green-box">
                                <label for="productName">Nombre del producto:</label>
                                <input type="text" class="form-control" id="productName" name="Nombre" required>
                            </div>

                            <!-- <label class="control-label">Estado</label>

                            <select class="form-control form-group-margin" id="inact" name="inact">
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                                <option value="2">Oculto</option>
                            </select> -->


                            <div class="form-group green-box">
                                <label for="productName">Cantidad:</label>
                                <input type="text" class="form-control" id="productName" name="Cant_disp" required>
                            </div>
                            <div class="form-group green-box">
                                <label for="productName">Precio Unitario:</label>
                                <input type="text" class="form-control" id="Precio_uni" name="Precio_uni" required>
                            </div>
                            <div class="form-group green-box">
                                <label for="productDescription">Descripcion:</label>
                                <textarea class="form-control" id="productDescription" name="Descripcion" required>
                                </textarea>
                            </div>



                        </div>
                    </div>

                </div>

                <div class="col-6 form-group green-box">
                    <label for="">Linea</label>


                    <select class="custom-select" name="Lineas_idLineas" id="">
                        <?php

                        require_once './app/controlador/lineas/lineas.controlador.php';


                        /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                        $Lineas = LineasControlador::index();

                        foreach ($Lineas as $key => $Linea) {



                            echo '<option value="' . htmlspecialchars($Linea["idLineas"]) . '">' . htmlspecialchars($Linea["Nombre_linea"]) . '</option>';

                        }
                        ?>


                    </select>
                </div>


                <div class="col-6 form-group green-box" id="pVar" style="display: block;">
                    <label class="control-label">Codigo de producto</label>
                    <input class="form-control form-group-margin" type="number" id="Codigo_producto"
                        name="Codigo_producto" min="3" required>
                </div>

            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>



    </div>






</div>
<?php
/**
 * Llamar a la función del controlador: Crear 
 */
$addProductoModel = ProductoControlador::create();

?>