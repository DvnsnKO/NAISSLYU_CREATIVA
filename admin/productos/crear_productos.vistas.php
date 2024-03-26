
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Agregar Producto</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-4 ">
                            <div class="form-group green-box zoom-img">
                                <img src="../../images/sin-imagen.jpg" alt="sin imagen" class="w-100">
                                <div class="form-group green-box  text-center ">
                                    <div class="small lead">Imagen del producto</div>
                                    <div class="small ">Peso máximo: 3Mb | Tamaño: 700 x 875 píxeles |
                                    </div>
                                    <div class="small ">Formato: JPG o PNG</div>
                                    <label for="productImage" class="col-12 btn btn-primary  ">seleccione</label>
                                    <input type="file" class="form-control d-none " id="productImage"
                                        name="productImage">
                                </div>
                            </div>
                        </div>

                        <div class="col-8 align-middle">
                            <div class="form-group green-box">
                                <label for="productName">Nombre del producto:</label>
                                <input type="text" class="form-control" id="productName" name="productName" required>
                            </div>

                            <label class="control-label">Estado</label>

                            <select class="form-control form-group-margin" id="inact" name="inact">
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                                <option value="2">Oculto</option>
                            </select>

                            <div class="form-group green-box">
                                <label for="productDescription">Descripcion:</label>
                                <textarea class="form-control" id="productDescription" name="productDescription">
                                </textarea>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div class="" id="pVar" style="display: block;">
                <label class="control-label">Precio</label>
                <input class="form-control form-group-margin" type="number" id="precio" name="precio"
                    onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 &amp;&amp; event.charCode <= 57"
                    oninvalid="setCustomValidity('No debe contener comas, puntos o signos')" min="0" value="" required>
            </div>

            <div class="form-group green-box">
                <label for="precio">Categoria:</label>
                <select class="form-control form-group-margin" id="inact" name="inact">
                    <option value="0">Ninguna</option>
                    <option value="1">Pulseras</option>
                    <option value="2">Anillos</option>
                    <option value="3">Aretes</option>
                </select>

            </div>



            <div class="form-group green-box">
                <div class="row">
                    <div class="col-6">
                        <label for="precio">Código:</label>
                        <input class="form-control" id="productcodigo" name="productcodigo" required>
                    </div>
                    <div class="col-6">
                        <label for="precio">SKU:</label>
                        <input class="form-control" id="productcodigo" name="productcodigo" required>
                    </div>

                </div>

            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>