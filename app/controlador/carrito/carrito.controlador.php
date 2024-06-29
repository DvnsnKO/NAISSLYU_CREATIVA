<?php
require_once "./app/modelo/carrito/productos.modelo.php";

class ProductoControlador
{

    public static function show()
    {
        if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
            $data = []; // Inicializar el array para almacenar los datos de los productos

            // Recorrer los productos en el carrito y obtener información del modelo
            foreach ($_SESSION["carrito"] as $codigoProducto) {
                $producto = ProductoModel::show($codigoProducto);
                if ($producto !== null) {
                    $data[] = $producto; // Añadir los datos del producto al array $data
                }
            }
            return $data;

            // Aquí podrías hacer algo con $data, como pasarlo a la vista o procesarlo más

            // Por ejemplo, aquí simplemente lo vamos a imprimir
        } else {
            return "El carrito está vacío."; // Mensaje si el carrito está vacío
        }
    }

}
?>