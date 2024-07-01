<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="card direct-chat direct-chat-success">
                <div class="card-header">
                    <h3 class="card-title">Nombre de la categoría</h3>
                </div>
                <div class="card-body" style="height: 500px;">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            require_once './app/controlador/productos/mostrando.controlador.php';

                            /** Llamar al controlador para recuperar los registros de la tabla de base de datos */
                            $Productos = ProductoControlador::show();
                            $totalProductos = count($Productos);

                            for ($i = 0; $i < $totalProductos; $i++) {
                                if ($i % 4 == 0) {
                                    if ($i > 0) {
                                        echo '</div>'; // Cierra la fila anterior
                                    }
                                    echo '<div class="row">'; // Comienza una nueva fila
                                }

                                $Producto = $Productos[$i];
                                echo '
                                    <div class="col-3 mb-1">
                                        <div class="card h-100">
                                            <img src="./public/images/' . $Producto["Nombre"] . '/' . $Producto["Imagen"] . '" class="card-img-top" style="width: 100%; height: 50%;">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $Producto["Nombre"] . '</h5><br>
                                                <small class="card-text"> Precio: ' . $Producto["Precio_uni"] . ' </small><br>
                                                <form method="post">
                                                    <input type="hidden" name="Codigo_producto" value="' . $Producto["Codigo_producto"] . '">
                                                    <button type="submit"  class="btn btn-success btn-agregar-carrito">Agregar al carrito</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>';
                            }

                            // Cierra la última fila si no está cerrada
                            if ($totalProductos > 0) {
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
// Iniciar sesión si no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verificar si se ha enviado el formulario y el valor no está vacío
if (!isset($_SESSION["carrito"]) || !is_array($_SESSION["carrito"])) {
    $_SESSION["carrito"] = []; // Inicializar el carrito como un array vacío si no está configurado o no es un array
}

// Verificar si se ha enviado el formulario y el valor no está vacío
if (isset($_POST["Codigo_producto"]) && $_POST["Codigo_producto"] != "") {
    $codigoProducto = $_POST["Codigo_producto"];

    // Recuperar el array del carrito de la sesión
    $valores = $_SESSION["carrito"];

    // Verificar si el producto no está ya en el carrito
    if (!in_array($codigoProducto, $valores)) {
        $valores[] = $codigoProducto; // Añadir el producto al array
        $_SESSION["carrito"] = $valores; // Guardar el array en la sesión

        // Mostrar el mensaje de éxito
        echo '<script>alert("Se ha añadido el producto al carrito.");</script>';
    } else {
        // Mostrar un mensaje si el producto ya está en el carrito
        echo '<script>alert("El producto ya existe en el carrito.");</script>';
    }
}
?>



