<?php
// rutaadmin del controlador
require_once './app/controlador/productos/productos.controlador.php';
$showproducto = ProductoControlador::show();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Detalles de  <?php echo $showproducto["Nombre"] ?> </h2>
        <?php
          

            /** Llamar al controlador para recuperar los registros de la tabla de base de datos */
           
                        /* Consultar el registro por medio del id pasado por la url */
                        


                        ?>
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-4 ">
                            <div class="form-group green-box zoom-img">
                            <?php echo '<img src="./public/images/' . $showproducto["Nombre"] . '/' . $showproducto["Imagen"] . '" alt="sin imagen" class="w-100" id="productImagePreview">'; ?>
                                
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
                                <input type="text" class="form-control" id="productName" name="Nombre" value="<?php echo $showproducto["Nombre"] ?> " readonly>
                            </div>

                            <!-- <label class="control-label">Estado</label>

                            <select class="form-control form-group-margin" id="inact" name="inact">
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                                <option value="2">Oculto</option>
                            </select> -->


                            <div class="form-group green-box">
                                <label for="productName">Cantidad:</label>
                                <input type="text" class="form-control" id="productName" name="Cant_disp" value="<?php echo $showproducto["Cant_disp"] ?> " readonly>
                            </div>
                            <div class="form-group green-box">
                                <label for="productName">Precio Unitario:</label>
                                <input type="text" class="form-control" id="Precio_uni" name="Precio_uni" value="<?php echo $showproducto["Precio_uni"] ?> " readonly>
                            </div>
                            <div class="form-group green-box">
                                <label for="productDescription">Descripcion:</label>
                                <input class="form-control" id="productDescription" name="Descripcion" value="<?php echo $showproducto["Descripcion"] ?> " readonly>
                               
                            </div>



                        </div>
                    </div>

                </div>

                <div class="col-6 form-group green-box">
                    <label for="">Linea</label>


                    <select class="custom-select" name="Nombre_linea" id="">
                        



                        <option value=" " ><?php echo $showproducto["Nombre_linea"] ?> </option>';

                       


                    </select>
                </div>


                <div class="col-6 form-group green-box" id="pVar" style="display: block;">
                    <label class="control-label">Codigo de producto</label>
                    <input class="form-control form-group-margin" type="text" id="Codigo_producto"
                        name="Codigo_producto" value="<?php echo $showproducto["Codigo_producto"] ?> " readonly>
                </div>

            </div>
            <a href="javascript:history.back()"  class="btn btn-success">Volver</a>
        </form>



    </div>






</div>
<?php
/**
 * Llamar a la función del controlador: Crear 
 */
$addProductoModel = ProductoControlador::create();

?>